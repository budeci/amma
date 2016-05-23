 <footer class="f_300">
 <div class="container">
    <div class="row">
        <div class="col l6 m12 s12">
        <div class="hide-on-small-only">
            <h4>@lang('amma.news_feed')</h4>
            {{ Form::open(array('route' => 'subscribe','class' => 'form subscribe', 'method' => 'POST')) }}
                <div class="input-field submit_in">
                  <input placeholder="@lang('amma.email')" name="email"  type="email" required>
                  <!-- <input type="submit" value="@lang('amma.subscribe')"> -->
                  <button type="submit">@lang('amma.subscribe')</button>
                </div> 
                <p>@lang('amma.subscribe_notifications')</p>
            {{ Form::close() }}
        </div>
            <h6>@lang('amma.follow_networks')</h6>
            <ul class="social">
                @foreach($social as $item)
                  <li><a href="{{$item->link}}" class="icon-{{$item->class}}"></a></li>
                @endforeach
            </ul>
        </div>
        <div class="col l6 m12 s12 hide-on-small-only">
            <div class="display-table links ">
                <div class="td">
                    <h4>@lang('amma.category')</h4>
                    <ul>
                    @foreach($footer_categories as $item)
                      <li><a href="{{LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'categories/'.$item->slug) }}">{{$item->name}}</a></li>
                    @endforeach
                    </ul>
                </div>
                <div class="td">
                    <h4>@lang('amma.page')</h4>
                    <ul>
                    @foreach($footer_menu as $item)
                        @if ($item->template == 'page')
                          <li><a href='{{LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'page/'.$item->slug) }}'>{{$item->name}}</a></li>
                        @else
                          <li><a href='{{LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'/'.$item->template) }}'>{{$item->name}}</a></li>
                        @endif
                    @endforeach
                    </ul>
                </div>
                <div class="td">
                    <h4>@lang('amma.collaboration')</h4>
                    <ul>
                        @foreach($collaboration_menu as $item)
                          <li><a href="{{LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'page/'.$item->slug) }}">{{$item->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    </div><!--container-->
    <div class=" partners hide-on-small-only">
        <ul class="container">
            @foreach($parteners as $item)
              <li><img src="{{$item->image}}"></li>
            @endforeach
        </ul>
    </div>
    <div class="foot cf">
        <div class="container">
            <span class="left">&copy; eCommerce <?php echo date('Y');?>. @lang('amma.rights_reserved')</span>
            <a href="#" class="right"><img src="/assets/images/lp_logo.png"></a>
        </div>
    </div>

 </footer>

    {!!Html::script('//code.jquery.com/jquery-2.1.1.min.js')!!}
    <!--  Scripts--> 

    <!-- owl --> 
    {!!Html::script('/assets/plugins/owl/owl.carousel.js')!!}
    {!!Html::script('/assets/plugins/fancybox/jquery.mousewheel-3.0.6.pack.js')!!}
    {!!Html::script('/assets/plugins/fancybox/jquery.fancybox.js')!!}
    {!!Html::script('/assets/plugins/flexslider/shCore.js')!!}
    {!!Html::script('/assets/plugins/flexslider/shBrushXml.js')!!}
    {!!Html::script('/assets/plugins/flexslider/shBrushJScript.js')!!}
    {!!Html::script('/assets/plugins/flexslider/jquery.flexslider.js')!!}
    {!!Html::script('/assets/plugins/nouislider/nouislider.js')!!}
    {!!Html::script('/assets/plugins/nouislider/wNumb.js')!!}
    <!-- {!!Html::script('/assets/plugins/paulzi/paulzi-form.min.js')!!} -->

    {!!Html::script('/assets/plugins/jquery-validation/dist/jquery.validate.min.js')!!}
    {!!Html::script('/assets/plugins/jquery-validation/dist/additional-methods.min.js')!!}
    {!!Html::script('/assets/plugins/jquery-validation/src/localization/messages_'.Lang::getLocale().'.js')!!}
    {!!Html::script('/assets/plugins/qtip/jquery.qtip.min.js')!!}
    {!!Html::script('/assets/plugins/toastr/build/toastr.min.js')!!}






    {!!Html::script('/assets/plugins/imagezoom/imagezoom.js')!!}
    {!!Html::script('/assets/plugins/jStarbox/jstarbox.js')!!}
    {!!Html::script('/assets/plugins/materialize/js/materialize.min.js')!!}
    {!!Html::script('//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-568a6dd8eb9974bc')!!}
    <!-- google map -->
    {!!Html::script('//maps.googleapis.com/maps/api/js')!!}
    {!!Html::script('/assets/js/init.js')!!}