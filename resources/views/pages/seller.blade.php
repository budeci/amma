@extends('layouts.default')

@section('content')
<div class="container">
    <ul class="breadcrumbs">
        <li><a class="icon-home" href="{{LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'/')}}"></a></li>
        <li>{{$seller->name}}</li>
    </ul>
</div>
<section>
  <div class="container">
    <div class="row">
      <div class="col l4 m5 s12">
        <div class="bordered divide-top">
          <div class="block_title">DESPRE VÂNZĂTOR</div>
          <div class="person_card">
           <div class="display_flex border_bottom">
              <div class="wrapp_img">
                <img src="{{$seller->image}}">
              </div>
             <div class="content">
               <h4>{{$seller->name}}</h4>
               <ul class="star_rating" data-rating_value="{{$seller->rating}}">
                  <li class="icon-star"></li>
                  <li class="icon-star"></li>
                  <li class="icon-star"></li>
                  <li class="icon-star"></li>
                  <li class="icon-star"></li>
              </ul>
              <p class="small">875 păreri / 99,9% positive </p>
             </div>
           </div>
           <div class="buttons row">
             <div class="col s12 padd_l_half">
             <a href="#" class="btn_ btn_white waves-effect waves-teal f_small right full_width">Contactează-ne</a>
           </div>
           </div>
          </div>
        </div>
      </div>
      <div class="col l8 m7 s12">
        <ul class="elements divide-top bordered pd_8">
            @foreach($seller->products as $product)
                <li class="product_card">
                    <div class="wrapp_img wrapp_countdown">
                        <span class="info_label">
                            @if ($product->expired < date("m/d/Y"))
                                <img src="/assets/images/badge_stoc_expirat.png">
                            @else
                                <img src="/assets/images/info_corner.png">
                            @endif
                        </span>
                        <div class="countdown" data-endtime="{{$product->expired}}">
                            <span class="days"></span>
                            <span class="hours"></span>
                            <span class="minutes"></span>
                            <span class="seconds">12</span>
                        </div>
                        <a href="{{URL::to('product/'.$product->slug)}}" class=""><img src="{{$product->image}}"></a>
                    </div>
                        <div class="content">
                            <h4><a href="{{URL::to('product/'.$product->slug)}}" class="">{{$product->name}}</a></h4>
                            <ul class="star_rating" data-rating_value="{{$product->rating}}">
                                <li class="icon-star"></li>
                                <li class="icon-star"></li>
                                <li class="icon-star"></li>
                                <li class="icon-star"></li>
                                <li class="icon-star"></li>
                            </ul>
                            <span class="small">22 păreri </span>
                            <div class="price_wrapp">
                            <span class="price">{{$product->price}} MDL</span>
                            <span class="old_price">{{$product->old_price}} MDL</span>
                        </div>
                        <div class="colors cf">
                            <span class="small">Culoare:</span>
                            <ul>
                                <li> <span class="color_view" style="background-color:#fff; border-color:#e0e0e0;"></span> Alb(1) </li>
                                <li> <span class="color_view" style="background-color:#e96500; border-color:#e96500;"></span> Oranj(4) </li>
                                <li> <span class="color_view" style="background-color:#e96500; border-color:#e96500;"></span> Oranj(4) </li>
                            </ul>
                        </div>
                        <div class="stock">
                            {{$product->stock}}/{{$product->total_stock}}
                            <div class="progress">
                                <div class="determinate" style="width: {{$product->stock*100/$product->total_stock}}%"></div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
      </div><!--right block-->
    </div>
  </div>
</section>
@stop