@extends('layouts.default')

@section('content')
<div class="container">
    <ul class="breadcrumbs">
        <li><a href="#" class="icon-home"></a></li>
        <li><a href="#" class="">Contul meu </a></li>
        <li>  Istoria cumpărăturilor</li>
    </ul>
</div>
<section class="history_favorites">
  <div class="container">
    <div class="row">
      <div class="col l3 m5 s12 hide-on-med-and-down">
        <div class="bordered divide-top">
          <div class="person_card styled1">
           <div class="display_flex border_bottom">
              <div class="wrapp_img">
                <img src="assets/images/avatar1.jpg">
              </div>
             <div class="content">
               <h4>Nume Prenume</h4>
                <a href="#" class="btn_ btn_small btn_base waves-effect waves-teal f_small">Adaugă un produs</a>
             </div>
           </div>
           <div class="buttons">
            <ul class="links_to">
              <li><a href="#" class="active">Istoria cumpărăturilor</a></li>
              <li><a href="#">Produse Favorite (10)</a></li>
              <li><a href="#">Produsele mele (10)</a></li>
              <li><a href="#">Vouchere (2)</a></li>
              <li><a href="#">Setările contului</a></li>
            </ul>
           </div>
          </div>
        </div>

         <div class="elements bordered divide-top border_bottom">
          <div class="title">PRODUSE RECENT VIZIONATE</div>
            <div class="item product">
              <div class="display-table">
                  <div class="wrapp_img td">
                    <img src="assets/images/produs.jpg" alt=""/>
                  </div>
              </div>
              <h4 class="title">SONY EXPERIA BN-100</h4>
              <div class="wrapp_info">
                  <ul class="star_rating" data-rating_value="1">
                      <li class="icon-star"></li>
                      <li class="icon-star"></li>
                      <li class="icon-star"></li>
                      <li class="icon-star"></li>
                      <li class="icon-star"></li>
                  </ul>
                  <div class="price">
                      <div class="curent_price">8 987 Lei</div>
                      <div class="old_price">11 987 Lei</div>
                  </div>
                  <div class="stock">
                      22/50
                      <div class="progress">
                        <div class="determinate" style="width: 42%"></div>
                      </div>
                  </div>
              </div>
            </div>
            <div class="item product">
              <div class="display-table">
                  <div class="wrapp_img td">
                    <img src="assets/images/produs.jpg" alt=""/>
                  </div>
              </div>
              <h4 class="title">SONY EXPERIA BN-100</h4>
              <div class="wrapp_info">
                  <ul class="star_rating" data-rating_value="1">
                      <li class="icon-star"></li>
                      <li class="icon-star"></li>
                      <li class="icon-star"></li>
                      <li class="icon-star"></li>
                      <li class="icon-star"></li>
                  </ul>
                  <div class="price">
                      <div class="curent_price">8 987 Lei</div>
                      <div class="old_price">11 987 Lei</div>
                  </div>
                  <div class="stock">
                      22/50
                      <div class="progress">
                        <div class="determinate" style="width: 42%"></div>
                      </div>
                  </div>
              </div>
            </div>

        </div>
      </div>
      <div class="col l9 m12 s12">
        <div class="row elements bordered pd10 styled1 no-row-margin divide-top">
           @foreach($products as $item)
              <div class="col l4 m6 s12">
                <div class="product">
                    @if ($page == 'expired')
                        <span class="info_label">
                            @if ($item->expired < date("m/d/Y"))
                                <img src="/assets/images/badge_stoc_expirat.png">
                            @else
                                <img src="/assets/images/info_corner.png">
                            @endif
                        </span>
                    @endif
                      <div class="display-table">
                          <div class="wrapp_img with_hover td wrapp_countdown">
                              <div class="countdown" data-endtime="{{$item->expired}}">
                                  <span class="days"></span>
                                  <span class="hours"></span>
                                  <span class="minutes"></span>
                                  <span class="seconds">12</span>
                              </div>
                            <a href="{{URL::to('product/'.$item->slug)}}"><img src="{{$item->image}}" class="full_width" alt=""/></a>
                          </div>
                      </div>
                  <h4 class="title"><a href="{{URL::to('product/'.$item->slug)}}">{{$item->name}}</a></h4>
                  <div class="wrapp_info">
                      <ul class="star_rating" data-rating_value="{{$item->rating}}">
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
              </div>
            @endforeach

        </div><!--elements-->
        {!! $products->links() !!}
      </div><!--right block-->
    </div>
  </div>
</section>

@stop