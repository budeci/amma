@extends('layouts.default')

@section('content')
<div class="container">
    <ul class="breadcrumbs">
        <li><a href="#" class="icon-home"></a></li>
        <li><a href="{{route('categories')}}">Categories</a></li>
    </ul>
</div>
<section class="history_buy">
  <div class="container">
    <div class="row">
      <div class="col l3 m5 s12">
      {{ Form::open(array('route' => 'categories', 'id'=>'filter-form', 'class' => 'panel panel-primary form-no-empty bordered divide-top filtre filtre-form', 'method' => 'get')) }}
          <div class="filtru">
            <h5>Categories</h5>
            <ul>
              @foreach($categories as $item)
                <li>
                  <a href="{{ URL::route('categories', [null, 'category' => $item->id]) }}">
                    <?php $checked = in_array($item->id, $checked_categories) ? 1 : 0; ?>
                    {{ Form::checkbox('category[]', $item->id,$checked,['id'=>'category'.$item->id]) }}
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
                    <?php $checked = in_array($item->id, $checked_seller) ? 1 : 0; ?>
                    {{ Form::checkbox('seller[]', $item->id,$checked,['id'=>'seller'.$item->id]) }}
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
                  <?php $checked = in_array(1, $checked_conditions) ? 1 : 0; ?>
                  {{ Form::checkbox('conditions[]',1,$checked,['id'=>'conditions_new']) }}
                  {{ Form::label('conditions_new', 'New') }}
                </a>
              </li>
              <li>
                <a href="{{ URL::route('categories', [null, 'conditions' => 0]) }}">
                  <?php $checked = in_array(0, $checked_conditions) ? 1 : 0; ?>
                  {{ Form::checkbox('conditions[]',0,$checked,['id'=>'conditions_used']) }}
                  {{ Form::label('conditions_used', 'Used') }}
                </a>
              </li>
            </ul>
          </div>
          <div class="filtru">
            <h5>Pretul</h5>
            <div class="range_select">
              <p id="range1" data-max="{{$price_max}}" data-min="{{$price_min}}"></p>
              <input type="hidden" id="price_max" name="price_max" value="{{$end}}" />
              <input type="hidden" id="price_min" name="price_min" value="{{$start}}" />
            </div>
          </div>
          <input type="hidden" name="sort" value="{{$sort}}" />
          <input type="hidden" name="search" value="{{$search}}" />
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
          <div class="sort">
            <div class="input-field with_caret">
              <?php $checked = in_array(0, $checked_conditions) ? 1 : 0; ?>
              <select name="sort" id="sort-product">
                <option value="" disabled selected>Denumire </option>
                <option value="asc" <?= $sort == 'asc' ? 'selected' : ''; ?>>Asc</option>
                <option value="desc" <?= $sort == 'desc' ? 'selected' : ''; ?>>Desc</option>
                <option value="expire" <?= $sort == 'expire' ? 'selected' : ''; ?>>Expira</option>
                <option value="top" <?= $sort == 'top' ? 'selected' : ''; ?>>Populare</option>
                <option value="new" <?= $sort == 'new' ? 'selected' : ''; ?>>New</option>
              </select>
            </div>
          </div>
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
        @if (!$filter)
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
          @endif
          {!! $products->appends(Request::all())->links() !!}
        </div>

      </div><!--right block-->
    </div>
  </div>
</section>

@stop