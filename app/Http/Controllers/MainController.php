<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Page;
use Commerce\Productso\Models\PrsoCategory as Categories;
use Illuminate\Support\Facades\Session;
use LaravelLocalization;
use Sentinel;

class MainController extends Controller
{

    public function __construct(Page $page, Categories $categories){

		$this->data                       = [];
		$this->data['head_menu']          = $page->headMenu()->withTranslation('*')->get();
		$this->data['footer_menu']        = $page->footerMenu()->withTranslation('*')->get();
		$this->data['collaboration_menu'] = $page->collaborationMenu()->listsTranslations('name')->get();
		$this->data['all_categories']     = $categories->getPublished()->listsTranslations('name')->get();
		$this->data['footer_categories']  = $categories->footerCategories()->listsTranslations('name')->get();
		$this->data['search']             = '';
		$this->data['checked_categories'] = [];
		//dd(Sentinel::check());

        //$this->data['categories'] = $categories->listsTranslations('name')->get()->toArray();

    }
}
