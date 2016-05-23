<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Commerce\Productso\Models\PrsoProduct as Product;
use Commerce\Productso\Models\PrsoCategory as Category;
use Commerce\Productso\Models\PrsoSeller as Seller;
use App\Banner as Banner;
use LaravelLocalization;
use Carbon\Carbon;
use Searchy;

class CategoriesController extends MainController
{
    public function search(Product $product, Category $category,Request $request, Seller $seller, Banner $banner, $slug='root')
    {

        if ($slug == 'root')
        {
            $this->data['categories'] = collect($category->getPublished()->withTranslation('*')->get());
            $this->data['seller']     = $seller->allShop()->get();
            $this->data['price_max']  = $product->getPublished()->max('price');
            $this->data['price_min']  = $product->getPublished()->min('price');
            
            $collectionCategory       = collect($request->input('category'));
            $collectionSeller         = collect($request->input('seller'));
            $collectionConditions     = collect($request->input('conditions'));
            $getPriceMax              = (int)($request->has('price_max')?$request->input('price_max'):$this->data['price_max']);
            $getPriceMin              = (int)($request->has('price_min')?$request->input['price_min']:$this->data['price_min']);

            $getCategory = $collectionCategory->filter(function ($value, $key) {
                return is_numeric($value);
            });
            $getSeller = $collectionSeller->filter(function ($value, $key) {
                return is_numeric($value);
            });
            $getConditions = $collectionConditions->filter(function ($value, $key) {
                return is_numeric($value);
            });

            if (isset($_GET)) {
                $this->data['products'] = $product->filter()->whereBetween('price', [$getPriceMin,$getPriceMax])->whereIn('seller', $getSeller)->whereIn('conditions', $getConditions)->whereHas('categories', function ($query) use ($getCategory) {
                    $query->whereIn('prso_category_id', $getCategory);
                })->paginate(10);
            }else{
                
            }


            $this->data['top_products'] = $product->top()->paginate(10);

            $this->data['middle_banners']   = $banner->middleBanners()->paginate(1);
            return view('pages.search',$this->data);
        }
        if ($row = $category->getPublished()->whereTranslation('slug', $slug)->first()) {
            $this->data['category'] = $row;
            $category->where('id', $row->id)->increment('views');
            $this->data['category']['products'] = $category->find($row->id)->products()->orderBy('views','desc')->where('show',1)->where('published_at','<',Carbon::now())->where('expired','>',Carbon::now())->paginate(10);
            //dd($row->getAncestors());
            return view('pages.categories_show',$this->data);
        }
        abort(404);
    }

    public function categories(Product $product, Category $category,Request $request, Seller $seller, Banner $banner, $slug='root')
    {

        if ($slug == 'root')
        {
            $this->data['categories'] = collect($category->getPublished()->withTranslation('*')->get());
            $this->data['seller']     = $seller->allShop()->get();
            $price_max                = $product->getPublished()->max('price');
            $price_min                = $product->getPublished()->min('price');
            
            $collectionCategory       = collect($request->input('category'));
            $collectionSeller         = collect($request->input('seller'));
            $collectionConditions     = collect($request->input('conditions'));
            $sort                     = strtolower($request->input('sort'));
            $search                   = mb_substr(strip_tags($request->input('search')), 0, 20);
            $getPriceMax              = (int)($request->has('price_max')?$request->input('price_max'):$price_max);
            $getPriceMin              = (int)($request->has('price_min')?$request->input('price_min'):$price_min);
            
            
            
            $this->data['price_max']  = $price_max;
            $this->data['price_min']  = $price_min;
            
            $this->data['start']      = $getPriceMin;
            $this->data['end']        = $getPriceMax;
            $this->data['sort']       = $sort;
            $this->data['search']     = $search;
            $search = explode(' ', $search);






            $getCategory = $collectionCategory->filter(function ($value, $key) {
                return is_numeric($value);
            })->toArray();
            $getSeller = $collectionSeller->filter(function ($value, $key) {
                return is_numeric($value);
            })->toArray();
            $getConditions = $collectionConditions->filter(function ($value, $key) {
                return is_numeric($value);
            })->toArray();

            $this->data['checked_categories'] = $getCategory;
            $this->data['checked_seller']     = $getSeller;
            $this->data['checked_conditions'] = $getConditions;

            if ($_GET) {
               $this->data['products'] = $product->getPublished()->search($search)->whereBetween('price', [$getPriceMin,$getPriceMax])->hasSeller($getSeller)->hasConditions($getConditions)->hasCategories($getCategory)->orderByProduct($sort)->paginate(10);
                $this->data['filter'] = true;
            }else{
                $this->data['filter'] = false;
                $this->data['products'] = $product->allExpired()->paginate(10); 
            }
            

            $this->data['top_products']   = $product->top()->paginate(10);
            
            $this->data['middle_banners'] = $banner->middleBanners()->paginate(1);
            return view('pages.categories',$this->data);
        }
        if ($row = $category->getPublished()->whereTranslation('slug', $slug)->first()) {
            $this->data['category'] = $row;
            $category->where('id', $row->id)->increment('views');
            $this->data['category']['products'] = $category->find($row->id)->products()->orderBy('views','desc')->where('show',1)->where('published_at','<',Carbon::now())->where('expired','>',Carbon::now())->paginate(12);
            //dd($row->getAncestors());
            return view('pages.categories_show',$this->data);
        }
        abort(404);
    }

    public function product(Product $product, Category $category, Seller $seller,  $slug='root')
    {
        if ($slug == 'root')
        {
            $this->data['product'] = collect($category->getPublished()->withTranslation('*')->get());
            return view('pages.product_show',$this->data);
        }
        if ($row = $product->where('slug', $slug)->first()) {
            $product->where('id', $row->id)->increment('views');
            $this->data['product']    = $row;
            $row_category = $category->getPublished()->whereIn('id', $row->categories)->withTranslation('*')->first();
            $this->data['category'] = $row_category;
            $this->data['category']['products'] = $category->find($row_category->id)->products()->orderBy('views','desc')->where('show',1)->where('published_at','<',Carbon::now())->where('expired','>',Carbon::now())->paginate(10);
            $this->data['seller']     = $seller->where('id', $row->seller)->first();
            return view('pages.product_show',$this->data);
        }
        abort(404);
    }
    public function seller(Product $product, Category $category, Seller $seller,  $slug='root')
    {
        if ($slug == 'root')
        {
            //$this->data['product'] = collect($category->getPublished()->withTranslation('*')->get());
            return view('pages.product_show',$this->data);
        }
        if ($row_seller = $seller->where('slug', $slug)->first()) {
            $this->data['seller']             = $row_seller;
            $this->data['seller']['products'] = $product->allExpired()->where('seller',$row_seller->id)->paginate(20);
            return view('pages.seller',$this->data);
        }
        abort(404);
    }
}
