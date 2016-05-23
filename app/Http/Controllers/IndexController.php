<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Commerce\Productso\Models\PrsoProduct as Product;
use Commerce\Productso\Models\PrsoCategory as Category;
use App\Blog as Article;
use App\Banner as Banner;
use App\Page as Page;
use LaravelLocalization;
use Carbon\Carbon;

class IndexController extends MainController
{

    public function index(Product $product, Category $category, Article $article, Banner $banner)
    {
        $this->data['expired_products']        = $product->expired()->paginate(10);
        $this->data['top_products']            = $product->top()->paginate(10);
        $this->data['recommendation_products'] = $product->recommendation()->paginate(10);
        $this->data['last_products']           = $product->last()->paginate(10);


        $this->data['top_category']            = $category->topCategory()->withTranslation('*')->first();
        $this->data['last_article']            = $article->last()->withTranslation('*')->paginate(10);

        $this->data['top_banners']             = $banner->topBanners()->paginate(3);
        $this->data['middle_banners']          = $banner->middleBanners()->paginate(1);
        $this->data['bottom_banners']          = $banner->bottomBanners()->paginate(2);

        $this->data['home_category']           = $category->homeCategory()->withTranslation('*')->get();
        foreach ($this->data['home_category'] as $key => $item) {
            $this->data['home_category'][$key]['products'] = $category->find($item->id)->products()->orderBy('views','desc')->where('show',1)->where('published_at','<',Carbon::now())->where('expired','>',Carbon::now())->paginate(10);
        }

        /*// Get ids of descendants
        $categories = $category->descendants()->lists('id');

        // Include the id of category itself
        $categories[] = $category->getKey();

        // Get goods
        $goods = $category->whereIn('category_id', $categories)->products()->paginate(10);*/

        return view('pages.index',$this->data);
    }
    public function page(Page $page, $slug='root')
    {
        if ( $this->data['page'] = $page->getPublished()->withTranslation('*')->whereTranslation('slug', $slug)->first()) {
            return view('pages.page',$this->data);
        }
        return redirect()->route('home');
    }
    public function contact()
    {
        return view('pages.contact',$this->data);
    }
    public function support()
    {
        return view('pages.support',$this->data);
    }
    public function about(Page $page)
    {
        $this->data['page'] = $page->getPublished()->where('id', 5)->withTranslation('*')->first();
        //dd($this->data['page']);
        return view('pages.about',$this->data);
    }

    public function blog(Article $article, $slug='root')
    {
        $this->data['top_articles'] = $article->top()->withTranslation('*')->paginate(8);

        if ( $row = $article->getPublished()->withTranslation('*')->whereTranslation('slug', $slug)->first()) {
            $this->data['article'] = $row;
            $article->where('blog_id', $row->blog_id)->increment('views');
            //$post = $article->where('blog_id',$article->blog_id)->first();
            return view('pages.blog_show',$this->data);
        }
        if ($slug == 'root')
        {
            $this->data['articles'] = $article->getPublished()->withTranslation('*')->paginate(10);
            return view('pages.blog',$this->data);
        }
        return redirect()->route('blog');
    }
    public function expired(Product $product)
    {
        $this->data['products'] = $product->expired()->paginate(20);
        $this->data['page'] = 'expired';
        return view('pages.expired',$this->data);
    }
    public function new_products(Product $product)
    {
        $this->data['products'] = $product->last()->paginate(20);
        $this->data['page']     = 'new';
        return view('pages.expired',$this->data);
    }
}

