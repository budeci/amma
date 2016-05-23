@extends('layouts.default')

@section('content')
<div class="content">
  <div class="container">
    <div class="row">
        <div class="col l3 m4 s12 hide-on-small-only">
            <ul class='categories_list bordered'>
                @foreach($all_categories as $item)
                  <li><a href="{{LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'categories/'.$item->slug) }}"><i class="icon-grid-cube"></i>{{$item->name}}</a></li>
                @endforeach
            </ul>

        </div>
        <div class="col l9 m8 s12">
            <div class="row top_block">
                <div class="col l8 m12 s12 no_padd_l- no_paddl_m-l">
                    <a href="{{LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'categories/'.$top_category->slug) }}" class="wrapp_img categorie img_hover_over">
                       <div class="text">
                        <h6>{{$top_category->name}}</h6>
                        <h3>@lang('amma.category_populara')</h3>
                       </div>
                       <img src="{{$top_category->image}}">
                    </a>
                </div>
                <div class="col l4 hide-on-med-and-down">
                    <div class="elements">
                        <div class="owl-carousel m-l-single">
                            @foreach($expired_products as $item)
                                <div class="item product">
                                    <span class="info_label">
                                        <img src="assets/images/info_corner.png">
                                    </span>
                                    <div class="display-table">
                                        <div class="display-table">
                                            <div class="wrapp_img with_hover td wrapp_countdown">
                                                <div class="countdown" data-endtime="{{$item->expired}}">
                                                    <span class="days"></span>
                                                    <span class="hours"></span>
                                                    <span class="minutes"></span>
                                                    <span class="seconds"></span>
                                                </div>
                                                <div class="hover">
                                                    <a href="#">
                                                        <i class="icon-favorite"></i>
                                                        @lang('amma.add_favorit')
                                                    </a>
                                                    <a href="#">
                                                        <i class="icon-basket"></i>
                                                        @lang('amma.add_cart')
                                                    </a>
                                                </div>
                                              <img src="{{$item->image}}" alt=""/>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="title"><a href="{{URL::to('product/'.$item->slug)}}">{{$item->name}}</a></h4>
                                    <div class="wrapp_info">
                                        <ul class="star_rating" data-rating_value="3">
                                            <li class="icon-star"></li>
                                            <li class="icon-star"></li>
                                            <li class="icon-star"></li>
                                            <li class="icon-star"></li>
                                            <li class="icon-star"></li>
                                        </ul>
                                        <div class="price">
                                            <div class="curent_price">{{$item->price}} Lei</div>
                                            <div class="old_price">{{$item->old_price}} Lei</div>
                                        </div>
                                        <div class="stock">
                                            {{$item->stock}}/{{$item->total_stock}}
                                            <div class="progress">
                                              <div class="determinate" style="width: {{$item->sold}}%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col l8 m12 s12 no_paddl_m-l hide-on-small-only">
                    <div class="row">
                        <?php $i=1; ?>
                        @foreach($top_banners as $item)
                            @if ($i <= 2)
                                <div class="col l6 m6 s12 no_paddl_l-">
                                    <a href="{{$item->link}}" target="_blank" title="{{$item->name}}" class="img_banner"><img src="{{$item->image}}"></a>
                                </div>
                            @endif
                            <?php $i++; ?>
                        @endforeach
                    </div>
                </div>
                <div class="col l4 m6 s12  padd_l_half_m-l hide-on-med-and-down">
                    @foreach($top_banners as $item)
                        @if ($top_banners->last() == $item)
                            <a href="{{$item->link}}" target="_blank" title="{{$item->name}}" class="img_banner"><img src="{{$item->image}}"></a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col l3 m12 s12 hide-on-small-only">
            <div class="elements divide-top">
                <div class="title">@lang('amma.oferte_recomandate')</div>
                <ul class="collapsible items" data-collapsible="accordion">
                    @foreach($recommendation_products as $item)
                        <li class="product">
                            <div class="collapsible-header active">
                            <span>1</span><p>{{$item->name}}</p>
                            <span class="line_animate"></span>
                            </div>
                              <div class="collapsible-body">
                                <div class="display-table">
                                    <div class="wrapp_img with_hover td">
                                    <div class="hover">
                                        <a href="#">
                                            <i class="icon-favorite"></i>
                                            @lang('amma.add_favorit')
                                        </a>
                                        <a href="#">
                                            <i class="icon-basket"></i>
                                            @lang('amma.add_cart')
                                        </a>
                                    </div>
                                    <img src="{{$item->image}}" alt=""/>
                                    </div>
                                </div>
                                <h4 class="title"><a href="{{URL::to('product/'.$item->slug)}}">{{$item->name}}</a></h4>
                                <div class="wrapp_info">
                                    <ul class="star_rating" data-rating_value="3">
                                        <li class="icon-star"></li>
                                        <li class="icon-star"></li>
                                        <li class="icon-star"></li>
                                        <li class="icon-star"></li>
                                        <li class="icon-star"></li>
                                    </ul>
                                    <div class="price">
                                        <div class="curent_price">{{$item->price}} Lei</div>
                                        <div class="old_price">{{$item->old_price}} Lei</div>
                                    </div>
                                    <div class="stock">
                                        {{$item->stock}}/{{$item->total_stock}}
                                        <div class="progress">
                                          <div class="determinate" style="width: {{$item->sold}}%"></div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="elements bordered mt-15  hide-on-small-only">
                <div class="title">@lang('amma.article_blog')</div>
                <div class="owl-carousel l-single">
                    @foreach($last_article as $item)
                        <div class="item article">
                            <img src="{{$item->image}}">
                            <h4 class="title"><a href="{{URL::to('news/'.$item->slug)}}">{{$item->name}}</a></h4>
                            {!!$item->description!!}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        <div class="col l9 m12 s12">
            <div class="cf row">
                <div class="col l12 m12 s12 no_paddl_l- divide-top">
                    <div class="elements bordered">
                        <div class="title">@lang('amma.expired_product')</div>
                            <div class="owl-carousel l-3">
                                @foreach($expired_products as $item)
                                    <div class="item product">
                                        <span class="info_label">
                                            <img src="/assets/images/info_corner.png">
                                        </span>
                                        <div class="display-table">
                                            <div class="wrapp_img with_hover td wrapp_countdown">
                                             <div class="countdown" data-endtime="{{$item->expired}}">
                                                <span class="days"></span>
                                                <span class="hours"></span>
                                                <span class="minutes"></span>
                                                <span class="seconds">12</span>
                                            </div>
                                            <div class="hover">
                                                <a href="#">
                                                    <i class="icon-favorite"></i>
                                                    @lang('amma.add_favorit')
                                                </a>
                                                <a href="#">
                                                    <i class="icon-basket"></i>
                                                    @lang('amma.add_cart')
                                                </a>
                                            </div>
                                              <img src="{{$item->image}}" alt=""/>
                                            </div>
                                        </div>
                                        <h4 class="title"><a href="{{URL::to('product/'.$item->slug)}}">{{$item->name}}</a></h4>
                                        <div class="wrapp_info">
                                            <ul class="star_rating" data-rating_value="1">
                                                <li class="icon-star"></li>
                                                <li class="icon-star"></li>
                                                <li class="icon-star"></li>
                                                <li class="icon-star"></li>
                                                <li class="icon-star"></li>
                                            </ul>
                                            <div class="price">
                                                <div class="curent_price">{{$item->price}} Lei</div>
                                                <div class="old_price">{{$item->old_price}} Lei</div>
                                            </div>
                                            <div class="stock">
                                                {{$item->stock}}/{{$item->total_stock}}
                                                <div class="progress">
                                                  <div class="determinate" style="width: {{$item->sold}}%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                </div>
            </div>
            <div class="banner_wide">
                @foreach($middle_banners as $item)
                    @if ($middle_banners->first() == $item)
                        <a href="{{$item->link}}" target="_blank" title="{{$item->name}}" class="img_banner"><img src="{{$item->image}}"></a>
                    @endif
                @endforeach
            </div>

            <div class="cf row">
                <div class="col l12 m12 s12 no_paddl_l- divide-top">
                    <div class="elements bordered">
                        <div class="title">@lang('amma.products_popular')</div>
                            <div class="owl-carousel l-3">
                                @foreach($top_products as $item)
                                    <div class="item product">
                                        <div class="display-table">
                                            <div class="wrapp_img with_hover td wrapp_countdown">
                                             <div class="countdown" data-endtime="{{$item->expired}}">
                                                <span class="days"></span>
                                                <span class="hours"></span>
                                                <span class="minutes"></span>
                                                <span class="seconds">12</span>
                                            </div>
                                            <div class="hover">
                                                <a href="#">
                                                    <i class="icon-favorite"></i>
                                                    @lang('amma.add_favorit')
                                                </a>
                                                <a href="#">
                                                    <i class="icon-basket"></i>
                                                    @lang('amma.add_cart')
                                                </a>
                                            </div>
                                              <img src="{{$item->image}}" alt=""/>
                                            </div>
                                        </div>
                                        <h4 class="title"><a href="{{URL::to('product/'.$item->slug)}}">{{$item->name}}</a></h4>
                                        <div class="wrapp_info">
                                            <ul class="star_rating" data-rating_value="1">
                                                <li class="icon-star"></li>
                                                <li class="icon-star"></li>
                                                <li class="icon-star"></li>
                                                <li class="icon-star"></li>
                                                <li class="icon-star"></li>
                                            </ul>
                                            <div class="price">
                                                <div class="curent_price">{{$item->price}} Lei</div>
                                                <div class="old_price">{{$item->old_price}} Lei</div>
                                            </div>
                                            <div class="stock">
                                                {{$item->stock}}/{{$item->total_stock}}
                                                <div class="progress">
                                                  <div class="determinate" style="width: {{$item->sold}}%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <?php $i=1; ?>
        @foreach($bottom_banners as $item)
            @if ($i <= 2)
               <div class="col l6 m6 s12 padd_r_half_m-">
                    <a href="{{$item->link}}" target="_blank" title="{{$item->name}}" class="img_banner"><img src="{{$item->image}}"></a>
                </div>
            @endif
        <?php $i++; ?>
        @endforeach
    </div>

    @foreach($home_category as $item)
        <div class="cf row">
            <div class="col l12 m12 s12 divide-top">
                <div class="elements bordered">
                    <div class="title">{{$item->name}}</div>
                        <div class="owl-carousel l-4">
                            @foreach($item->products as $product)
                                <div class="item product">
                                    <div class="display-table">
                                        <div class="wrapp_img with_hover td wrapp_countdown">
                                         <div class="countdown" data-endtime="{{date("m/d/Y",strtotime($product->expired))}}">
                                            <span class="days"></span>
                                            <span class="hours"></span>
                                            <span class="minutes"></span>
                                            <span class="seconds">12</span>
                                        </div>

                                        <div class="hover">
                                            <a href="#">
                                                <i class="icon-favorite"></i>
                                                @lang('amma.add_favorit')
                                            </a>
                                            <a href="#">
                                                <i class="icon-basket"></i>
                                                @lang('amma.add_cart')
                                            </a>
                                        </div>
                                          <img src="{{$item->image}}" alt=""/>
                                        </div>
                                    </div>
                                    <h4 class="title"><a href="{{URL::to('product/'.$product->slug)}}">{{$product->name}}</a></h4>
                                    <div class="wrapp_info">
                                        <ul class="star_rating" data-rating_value="1">
                                            <li class="icon-star"></li>
                                            <li class="icon-star"></li>
                                            <li class="icon-star"></li>
                                            <li class="icon-star"></li>
                                            <li class="icon-star"></li>
                                        </ul>
                                        <div class="price">
                                            <div class="curent_price">{{$product->price}} Lei</div>
                                            <div class="old_price">{{$product->old_price}} Lei</div>
                                        </div>
                                        <div class="stock">
                                            {{$product->stock}}/{{$product->total_stock}}
                                            <div class="progress">
                                              <div class="determinate" style="width: {{$product->stock*100/$product->total_stock}}%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
            </div>
        </div>
    @endforeach
            <div class="cf row">
                <div class="col l12 m12 s12 divide-top">
                    <div class="elements bordered">
                        <div class="title">@lang('amma.last_produs')</div>
                            <div class="owl-carousel l-4">
                                @foreach($last_products as $item)
                                    <div class="item product">
                                        <div class="display-table">
                                            <div class="wrapp_img with_hover td wrapp_countdown">
                                             <div class="countdown" data-endtime="{{$item->expired}}">
                                                <span class="days"></span>
                                                <span class="hours"></span>
                                                <span class="minutes"></span>
                                                <span class="seconds">12</span>
                                            </div>
                                            <div class="hover">
                                                <a href="#">
                                                    <i class="icon-favorite"></i>
                                                    @lang('amma.add_favorit')
                                                </a>
                                                <a href="#">
                                                    <i class="icon-basket"></i>
                                                    @lang('amma.add_cart')
                                                </a>
                                            </div>
                                              <img src="{{$item->image}}" alt=""/>
                                            </div>
                                        </div>
                                        <h4 class="title"><a href="{{URL::to('product/'.$item->slug)}}">{{$item->name}}</a></h4>
                                        <div class="wrapp_info">
                                            <ul class="star_rating" data-rating_value="1">
                                                <li class="icon-star"></li>
                                                <li class="icon-star"></li>
                                                <li class="icon-star"></li>
                                                <li class="icon-star"></li>
                                                <li class="icon-star"></li>
                                            </ul>
                                            <div class="price">
                                                <div class="curent_price">{{$item->price}} Lei</div>
                                                <div class="old_price">{{$item->old_price}} Lei</div>
                                            </div>
                                            <div class="stock">
                                                {{$item->stock}}/{{$item->total_stock}}
                                                <div class="progress">
                                                  <div class="determinate" style="width: {{$item->sold}}%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                </div>
            </div>

  </div><!--container-->
</div><!--content-->

@stop