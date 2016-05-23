@extends('layouts.default')

@section('content')
<div class="container">
    <ul class="breadcrumbs">
        <li><a href="#" class="icon-home"></a></li>
        <li>Blog</li>
    </ul>
</div>
<section class="">
    <div class="container">
        <div class="row">
            <div class="col l9 m12 s12">
              <div class="articles">
                <div class="article">
                  <h2 class="title">{{$article->name}}</h2>
                  <p>
                  <span><i class="icon-clock"></i> Postat <span class="c_base">{{$article->published_at}}</span></span>
                  <span><i class="icon-watch"></i> Vizualizări  <span class="c_base">{{$article->views}}</span></span>
                  </p>
                  <div class="wrapp_img">
                    <img src="{{$article->image}}">
                  </div>
                  <div class="text">
                    {!!$article->text!!}
                    <div class="addthis_native_toolbox share_btns"></div>
                  </div>
                </div>
              </div>
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
         <div class="fb-comments" data-href="http://developers.facebook.com/docs/plugins/comments/" data-numposts="1" data-width="100%"></div>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.5";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

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