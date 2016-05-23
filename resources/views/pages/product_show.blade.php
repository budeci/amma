@extends('layouts.default')

@section('content')
<div class="container">
    <ul class="breadcrumbs">
        <li><a class="icon-home" href="{{LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'/')}}"></a></li>
        <li><a href="{{URL::to('seller/'.$seller->slug)}}">{{$seller->name}}</a></li>
        @foreach($category->getAncestors() as $descend)
            <li><a href="{{URL::to('categories/'.$descend->slug)}}">{{$descend->name}}</a></li>
        @endforeach

        <li><a href="{{URL::to('/categories/'.$category->slug)}}">{{$category->name}}</a></li>

        <li>{{$product->name}}</li>
    </ul>
</div>
<section class="produs">
    <div class="container">
        <div class="row">
            <div class="col l4 m6 s12">
                <div class="">
                    <div id="slider" class="flexslider">
                        <ul class="slides simpleLens">
                            @if($product->attaches)
                                @foreach($product->attaches as $attach)
                                    <li><img src="{{URL::to($attach->filename.'/370/325')}}" alt="{{$attach->alt}}" title="{{$attach->title}}" data-imagezoom="true" data-magnification="3"></li>
                                @endforeach
                            @endif
                        </ul>
                    </div><!-- / slider images-->
                    <div id="carousel" class="flexslider carousel">
                        <ul class="slides">
                            @if($product->attaches)
                                @foreach($product->attaches as $attach)
                                    <li><img src="{{URL::to($attach->filename.'/370/325')}}" alt="{{$attach->alt}}" title="{{$attach->title}}"></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div><!--slider-->
                <div class="bordered divide-top hide-on-small-only">
                  <div class="block_title">DESPRE VÂNZĂTOR</div>
                  <div class="person_card">
                   <div class="display_flex border_bottom">
                      <div class="wrapp_img">
                        <a href="{{URL::to('seller/'.$seller->slug)}}"><img src="{{$seller->image}}"></a>
                      </div>
                     <div class="content">
                       <h4><a href="{{URL::to('seller/'.$seller->slug)}}">{{$seller->name}}</a></h4>
                       <ul class="star_rating" data-rating_value="{{$seller->rating}}">
                          <li class="icon-star"></li>
                          <li class="icon-star"></li>
                          <li class="icon-star"></li>
                          <li class="icon-star"></li>
                          <li class="icon-star"></li>
                      </ul>
                      <p class="small">875 păreri / 99,9% positive</p>
                     </div>
                   </div>
                   <div class="buttons row">
                     <div class="col s6 padd_r_half">
                       <a href="{{URL::to('seller/'.$seller->slug)}}" class="btn_ btn_base waves-effect waves-light f_small left full_width">Vezi magazinul</a>
                     </div>
                     <div class="col s6 padd_l_half">
                     <a href="#" class="btn_ btn_white waves-effect waves-teal f_small right full_width">Contactează-ne</a>
                   </div>
                   </div>
                  </div>
                </div>
            </div>
            <div class="col l5 m6 s12 product_info">
              <h1>{{$product->name}}</h1>
              <ul class="star_rating" data-rating_value="{{$product->rating}}">
                <li class="icon-star"></li>
                <li class="icon-star"></li>
                <li class="icon-star"></li>
                <li class="icon-star"></li>
                <li class="icon-star"></li>
              </ul>
              <span class="star_rating_info">875 păreri</span>

              <div class="display-table td_bordered_right display-list_bloks-m-down">
                <div class="td">
                  <p class="price">{{$product->price}} MDL</p>
                  <p class="old_price">{{$product->old_price}} MDL</p>
                </div>
                <div class="td sell_amount">
                <div class="pie" data-procent="10" style="animation-delay: -{{$product->sold}}s"></div>
                  {{$product->sold}}% este vândut
                </div>
              </div>

              <div class="count_down">
              <h5>PÂNĂ LA FINELE OFERTEI</h5>
                 <div class="countdown big" data-endtime="{{$product->expired}}">
                    <span class="wrapp_span">
                      <span class="days"></span>
                      ZILE
                    </span>
                    <span class="wrapp_span">
                      <span class="hours"></span>
                      ORE
                    </span>
                    <span class="wrapp_span">
                      <span class="minutes"></span>
                      MINUTE
                    </span>
                    <span class="wrapp_span">
                      <span class="seconds"></span>
                      SECUNDE
                    </span>
                </div>
              </div>

              <div class="sell_info display-table td_bordered_right">
                <div class="td">
                  <h5>VÂNZĂRI</h5>
                  <p>{{$product->stock}}/{{$product->total_stock}}</p>
                </div>
                <div class="td">
                  <h5>REDUCERE</h5>
                  <p>{{$product->discount}} %</p>
                </div>
                <div class="td">
                  <h5>ECONOMISEȘTI</h5>
                  <p>{{$product->save_many}} MDL</p>
                </div>
              </div>

              <form class="row childs_margin_top">
                <div class="counting col l6 m6 s12">
                  <div class="wrapp_input">
                    <span class="minus left in"><i class="icon-minus"></i></span>
                    <input type="text" readonly="readonly" value="4">
                    <span class="plus right in"><i class="icon-plus"></i></span>
                  </div>
                </div>
                <div class="col l6 m6 s12">
                <a href="#" class="btn_ full_width btn_base  put_in_basket"><i class="icon-basket"></i><span class="hide-on-med-only">Adaugă în coș</span></a>
                </div>
              </form>

              <div class="row">
                <div class="col s12">
                  <ul class="tabs">
                    <li class="tab"><a  class="active"  href="#about_product">DESPRE PRODUS</a></li>
                    <li class="tab"><a href="#feedback">FEEDBACK</a></li>
                  </ul>
                </div>
                <div id="about_product" class="col s12 tab_content">
                  <ul class="">
                    <li>
                      <span class="">Sex:</span>
                      <span class="">{{$product->gender}}</span>
                    </li>
                    <li>
                      <span class="">Producător:</span>
                      <span class="">{{$product->brand}}</span>
                    </li>
                    <li>
                      <span class="">Tipul materialului:</span>
                      <span class="">{{$product->type_material}}</span>
                    </li>
                    <li>
                      <span class="">Anotimp:</span>
                      <span class="">{{$product->season}}</span>
                    </li>
                  </ul>
                </div>
                <div id="feedback" class="feedback_rating col s12 tab_content">
                <h6>Lasati un feedbak</h6>
                  <div class="starbox"></div>

                </div>
              </div>

            </div><!--product_info-->
            <div class="col l3 m12 s12">
                <div class="bordered  elements">
                  <div class="block_title">EI AU PROCURAT DEJA</div>

                  <div class="person_card ">
                      <div class="display_flex">
                        <div class="wrapp_img">
                          <img src="/assets/images/avatar1.jpg">
                        </div>
                        <div class="content">
                          <h4>Nume Prenume</h4>
                          <p class="">3 unitati</p>
                        </div>
                      </div>
                  </div>
                  <div class="person_card ">
                      <div class="display_flex">
                        <div class="wrapp_img">
                          <img src="/assets/images/avatar1.jpg">
                        </div>
                        <div class="content">
                          <h4>Nume Prenume</h4>
                          <p class="">3 unitati</p>
                        </div>
                      </div>
                  </div>
                  <div class="person_card ">
                      <div class="display_flex">
                        <div class="wrapp_img">
                          <img src="/assets/images/avatar1.jpg">
                        </div>
                        <div class="content">
                          <h4>Nume Prenume</h4>
                          <p class="">3 unitati</p>
                        </div>
                      </div>
                  </div>
                  <div class="person_card ">
                      <div class="display_flex">
                        <div class="wrapp_img">
                          <img src="/assets/images/avatar1.jpg">
                        </div>
                        <div class="content">
                          <h4>Nume Prenume</h4>
                          <p class="">3 unitati</p>
                        </div>
                      </div>
                  </div>
                  <div class="person_card ">
                      <div class="display_flex">
                        <div class="wrapp_img">
                          <img src="/assets/images/avatar1.jpg">
                        </div>
                        <div class="content">
                          <h4>Nume Prenume</h4>
                          <p class="">3 unitati</p>
                        </div>
                      </div>
                  </div>
                  <div class="person_card ">
                      <div class="display_flex">
                        <div class="wrapp_img">
                          <img src="/assets/images/avatar1.jpg">
                        </div>
                        <div class="content">
                          <h4>Nume Prenume</h4>
                          <p class="">3 unitati</p>
                        </div>
                      </div>
                  </div>
                  <div class="person_card ">
                      <div class="display_flex">
                        <div class="wrapp_img">
                          <img src="/assets/images/avatar1.jpg">
                        </div>
                        <div class="content">
                          <h4>Nume Prenume</h4>
                          <p class="">3 unitati</p>
                        </div>
                      </div>
                  </div>
                  <div class="person_card ">
                      <div class="display_flex">
                        <div class="wrapp_img">
                          <img src="/assets/images/no-avatar.png">
                        </div>
                        <div class="content">
                          <h4>Nume Prenume</h4>
                          <p class="">3 unitati</p>
                        </div>
                      </div>
                  </div>
                  <div class="person_card ">
                      <div class="display_flex">
                        <div class="wrapp_img">
                          <img src="/assets/images/no-avatar.png">
                        </div>
                        <div class="content">
                          <h4>Nume Prenume</h4>
                          <p class="">3 unitati</p>
                        </div>
                      </div>
                  </div>
                  <div class="person_card ">
                      <div class="display_flex">
                        <div class="wrapp_img">
                          <img src="/assets/images/no-avatar.png">
                        </div>
                        <div class="content">
                          <h4>Nume Prenume</h4>
                          <p class="">3 unitati</p>
                        </div>
                      </div>
                  </div>

                </div>
            </div>
        </div>
    </div><!-- / container-->
</section>
<section>
  <div class="container">
  <div class="block_title divide-top">Comentarii</div>
    <div class="fb-comments" data-href="http://developers.facebook.com/docs/plugins/comments/" data-numposts="1" data-width="100%"></div>
  </div>
</section>
<section>
  <div class="container">
    <div class="elements bordered divide-top">
      <div class="title">PRODUSE DIN ACEEAȘI CATEGORIE</div>
          <div class="owl-carousel l-4">

            @foreach($category->products as $product)
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
                          <img src="{{$product->image}}" alt=""/>
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
</section>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


@stop