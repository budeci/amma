@extends('layouts.default')

@section('content')

<div class="container">
    <ul class="breadcrumbs">
        <li><a href="#" class="icon-home"></a></li>
        <li>Blog</li>
    </ul>
</div>
  <h1>BLOG <span class="c_base">AMMA</span></h1>
  <h4 class="f_300">Ai nimerit unde trebuie, aici sunt doar articole utile</h4>
<div class="head_block" style="background-image: url('assets/images/bg1.jpg'); background-size:cover; background-position:center center">
  <div class="form_wrapp styled1">
  <h2 class="title">Abonează-te la newsfeed-ul nostru</h2>
  {{ Form::open(array('route' => 'subscribe','class' => 'form styled3 row subscribe', 'method' => 'POST')) }}
      <div class="col s12">
        <div class="input-field no-mar-bot">
         <input placeholder="@lang('amma.email')" name="email" type="email" required>
        </div>
      </div>
   
      <div class="col s12">
          <button type="submit" class="btn btn_base btn_submit full_width">@lang('amma.subscribe')</button>
      </div>
   
    {{ Form::close() }}
  </div>
</div>
<section class="produs">
    <div class="container">
        <div class="row">
            <div class="col l9 m12 s12">
              <div class="articles">
               @foreach($articles as $item)
                    <div class="article">
                      <h2 class="title"><a href="{{LaravelLocalization::getURLFromRouteNameTranslated(Config::get('app.locale'), 'routes.blog', array('slug' => $item->slug))}}">{{$item->name}}</a></h2>
                      <p>
                      <span><i class="icon-clock"></i> Postat <span class="c_base">{{$item->published_at}}</span></span>
                      <span><i class="icon-watch"></i> Vizualizări  <span class="c_base">{{$item->views}}</span></span>
                      </p>
                      <div class="wrapp_img">
                        <a href="{{LaravelLocalization::getURLFromRouteNameTranslated(Config::get('app.locale'), 'routes.blog', array('slug' => $item->slug))}}"><img src="{{$item->image}}"></a>
                      </div>
                      <div class="text">
                       {!! mb_substr(strip_tags($item->description), 0, 200) !!}...
                      </div>
                      <a href="{{LaravelLocalization::getURLFromRouteNameTranslated(Config::get('app.locale'), 'routes.blog', array('slug' => $item->slug))}}" class="link">Citește articolul întreg <i class="icon-arrow-to-right"></i></a>
                    </div>
                @endforeach
              </div>
              {!! $articles->links() !!}
            </div>
            <!--l9-->
            <div class="col l3 m12 s12">
                <div class="bordered  elements aside">
                  <div class="block_title">ARTICOLE POPULARE</div>

                  <div class="articles">
                   @foreach($top_articles as $item)
                        <div class="article ">
                            <div class="wrapp_img">
                              <a href="{{LaravelLocalization::getURLFromRouteNameTranslated(Config::get('app.locale'), 'routes.blog', array('slug' => $item->slug))}}">
                                <img src="{{$item->image}}">
                              </a>
                            </div>
                            <h6 class="title"><a href="{{LaravelLocalization::getURLFromRouteNameTranslated(Config::get('app.locale'), 'routes.blog', array('slug' => $item->slug))}}">{{$item->name}}</a></h6>
                            <div class="text">
                            {!! mb_substr(strip_tags($item->description), 0, 200) !!}...
                            </div>
                        </div>
                    @endforeach
                  </div>
                </div>
            </div>
        </div>
    </div><!-- / container-->
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