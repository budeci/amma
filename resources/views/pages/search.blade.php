@extends('layouts.default')

@section('content')
<div class="container">
    <ul class="breadcrumbs">
        <li><a href="#" class="icon-home"></a></li>
        <li><a href="{{route('search')}}">Categories</a></li>
    </ul>
</div>
<section class="history_buy">
  <div class="container">
    <div class="row">
      <div class="col l3 m5 s12">
      {{ Form::open(array('route' => 'search','class' => 'bordered divide-top filtre filtre-form','method' => 'get')) }}
          <div class="filtru">
            <h5>Categories</h5>
            <ul>
              @foreach($categories as $item)
                <li>
                  <a href="{{ URL::route('categories', [null, 'category' => $item->id]) }}">
                    {{ Form::checkbox('category[]', $item->id,null,['id'=>'category'.$item->id]) }}
                    {{ Form::label('category'.$item->id, $item->name) }}
                  </a>
                </li>
              @endforeach
            </ul>
          </div>
          <div class="filtru">
            <h5>Seller</h5>
            <ul>
              @foreach($seller as $item)
                <li>
                  <a href="{{ URL::route('categories', [null, 'seller' => $item->id]) }}">
                    {{ Form::checkbox('seller[]', $item->id,null,['id'=>'seller'.$item->id]) }}
                    {{ Form::label('seller'.$item->id, $item->name) }}
                  </a>
                </li>
              @endforeach
            </ul>
          </div>
          <div class="filtru">
            <h5>Conditions</h5>
            <ul>
              <li>
                <a href="{{ URL::route('categories', [null, 'conditions' => 1]) }}">
                  {{ Form::checkbox('conditions[]',1,null,['id'=>'conditions_new']) }}
                  {{ Form::label('conditions_new', 'New') }}
                </a>
              </li>
              <li>
                <a href="{{ URL::route('categories', [null, 'conditions' => 0]) }}">
                  {{ Form::checkbox('conditions[]',0,null,['id'=>'conditions_used']) }}
                  {{ Form::label('conditions_used', 'Used') }}
                </a>
              </li>
            </ul>
          </div>
          <div class="filtru">
            <h5>Pretul</h5>
            <div class="range_select">
              <p id="range1" data-max="{{$price_max}}" data-min="{{$price_min}}"></p>
              <input type="hidden" id="price_max" name="price_max" value="0" />
              <input type="hidden" id="price_min" name="price_min" value="1500" />
            </div>
          </div>
      {{ Form::close() }}
      </div>
      <div class="col l9 m7 s12">
      <div class="elements bordered divide-top border_bottom hide-on-med-and-down">
          <ul class="categories">

            @foreach($categories->slice(0, 2) as $item)
                <li>
                  <a href="{{LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'categories/'.$item->slug) }}">
                    <div class="wrapp_img">
                      <img src="{{$item->image}}">
                    </div>
                    <h4>{{$item->name}}</h4>
                  </a>
                </li>
            @endforeach

          </ul>
          <ul class="categories categories-hide" style="display:none;">
            @foreach($categories->slice(2) as $item)
                <li>
                    <a href="{{LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'categories/'.$item->slug) }}">
                        <div class="wrapp_img">
                            <img src="{{$item->image}}">
                        </div>
                        <h4>{{$item->name}}</h4>
                    </a>
                </li>
            @endforeach
          </ul>
          <a href="#" class="link c_base show_categories">Afișează toate categoriile</a>
        </div>
      <div class="block_sort_by">
        <span class="text">SORTEAZĂ DUPĂ:</span>
          <form action="">
            <input name="name" id="name_sort" type="checkbox" value="desc"/>
            <label for="name_sort">AZ</label>
          </form>
      </div>
        <div class="row elements bordered pd10 styled1 no-row-margin divide-top">
          @foreach($products as $item)
            <div class="col l4 m6 s12">
              <div class="product">
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
        </div>

        <div class="banner_wide">
          @foreach($middle_banners as $item)
            @if ($middle_banners->first() == $item)
              <a href="{{$item->link}}" target="_blank" title="{{$item->name}}" class="img_banner"><img src="{{$item->image}}"></a>
            @endif
          @endforeach
        </div>
        <div class="row elements bordered pd10 styled1 no-row-margin divide-top">

          @foreach($top_products as $item)
            <div class="col l4 m6 s12">
              <div class="product">
                <span class="info_label">
                    <img src="assets/images/info_corner.png">
                </span>
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

        </div>
      </div><!--right block-->
    </div>
  </div>
</section>

@stop