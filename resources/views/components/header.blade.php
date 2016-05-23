<header>
    <div class="top_bar">
      <div class="container cf">
          <div class="left"><i class="icon-phone"></i>Telefon: {{ $contactPhone }}</div>
          <div class="left"><i class="icon-pin"></i>Address: {{ $contactAddress }}</div>
          <div class="right top-bar-langs">
          <a href="#" data-activates='dropdown_top-bar-langs' class="dropdown_top_bar">
            <i class="icon-{{LaravelLocalization::getCurrentLocale()}}"></i> {{ LaravelLocalization::getCurrentLocaleNative() }} <i class="icon-la-down"></i>
          </a>
          <ul id='dropdown_top-bar-langs' class='dropdown-content'>
              @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                @if ($localeCode != LaravelLocalization::getCurrentLocale())
                  <li>
                    <a rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                      <i class="icon-{{$localeCode}}"></i>{{$properties['native']}}
                    </a>
                  </li>
                @endif
              @endforeach
          </ul>


          </div>
          <div class="right top-bar-profile">
          @if (Sentinel::check())
            <a href='#' data-activates='dropdown_top-bar-profile' class="dropdown_top_bar"><i class="icon-user"></i> Contul meu <i class="icon-la-down"></i></a>
             <ul id='dropdown_top-bar-profile' class='dropdown-content'>
                <li><a href="#!">Istoria cumpărăturilor</a></li>
                <li><a href="#!">Vouchere</a></li>
                <li><a href="#!">Produse favorite</a></li>
                <li><a href="{{URL::to('/logout')}}">Logout</a></li>
             </ul>
          @else
            <a href="{{URL::to('/login')}}" class="dropdown_top_bar inline">LogIn</a>
            <a href="{{URL::to('/register')}}" class="dropdown_top_bar inline">Register</a>
          @endif
          </div>

      </div>
    </div>

    <div class="top_content cf">
      <div class="container">
          <div class="navbar_area cf">
              <nav class="navbar">
                  <div class="nav-wrapper">
                      <a href="{{LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'/') }}" class="brand-logo valign-wrapper left ">
                          <img src="{{$logo->image}}" class="valign" alt="{{$logo->name}}">
                      </a>

                      <ul class="left nav_wide hide-on-med-and-down">
                        @foreach($head_menu as $item)
                          @if ($item->show_badge == 1)
                            @if ($item->template == 'page')
                              <li> <a href='{{URL::route('page',$item->slug)}}'><span class="wrapp_badge">{{$item->name}}<span class="badge_top">New</span></span> </a></li>
                            @else
                              <li> <a href='{{URL::route($item->template)}}'><span class="wrapp_badge">{{$item->name}}<span class="badge_top">New</span></span> </a></li>
                            @endif
                          @else
                            @if ($item->template == 'page')
                              <li><a data-href="{{LaravelLocalization::getURLFromRouteNameTranslated(Config::get('app.locale'), 'routes.page', array('slug' => $item->slug))}}" href='{{URL::route('page',$item->slug)}}'>{{$item->name}}</a></li>
                            @else
                              <li><a href='{{URL::route($item->template)}}'>{{$item->name}}</a></li>
                            @endif
                          @endif
                        @endforeach
                      </ul>
                      <ul class="side-nav" id="mobile-navbar">
                        @foreach($head_menu as $item)
                          @if ($item->show_badge == 1)
                            @if ($item->template == 'page')
                              <li> <a href='{{URL::route('page',$item->slug)}}'><span class="wrapp_badge">{{$item->name}}<span class="badge_top">New</span></span> </a></li>
                            @else
                              <li> <a href='{{URL::route($item->template)}}'><span class="wrapp_badge">{{$item->name}}<span class="badge_top">New</span></span> </a></li>
                            @endif
                          @else
                            @if ($item->template == 'page')
                              <li><a href='{{URL::route('page',$item->slug)}}'>{{$item->name}}</a></li>
                            @else
                              <li><a href='{{URL::route($item->template)}}'>{{$item->name}}</a></li>
                            @endif
                          @endif
                        @endforeach
                      </ul>
                      <a href="#" data-activates="mobile-navbar" class="button-collapse">
                          <i class="material-icons">menu</i>
                      </a>
                  </div>
              </nav> 
              <a href="#" class="cart btn_"><span><i class="icon-basket"></i>În coș (2) </span></a>
          </div>
          <div class="top_categories row cf">
              <div class="col l3 m3 s12 wrapp_categories">
                  <a href='{{URL::route('categories')}}' data-activates='dropdown_all_categories' class="navbar_dropdown"><i class="icon-grid-line"></i>@lang('amma.category')</a>
                  <ul id='dropdown_all_categories' class='dropdown-content'>
                    @foreach($all_categories as $item)
                      <li><a href="{{URL::route('categories',$item->slug)}}"><i class="icon-grid-cube"></i>{{$item->name}}</a></li>
                    @endforeach
                </ul>
              </div>
              <div class="col l9 m9 s12">
              <form class="top_search cf" action="{{URL::route('categories')}}" method="GET">
                  <div class="form_white_area cf">
                    <div class="input-field select_categories">

                        <select name="category[]" multiple>
                          <option value="all" disabled selected>@lang('amma.all_category')</option>
                          @foreach($all_categories as $item)
                            <?php $checked = in_array($item->id, $checked_categories) ? 'selected' : ''; ?>
                            <option value="{{$item->id}}" {{$checked}}>{{$item->name}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="input-field search_field">
                      <input type="text" name="search" value="{{$search}}" placeholder="@lang('amma.search_to_site')">
                    </div>
                  </div>
                 <div class="wrapp_submit">
                   <button type="submit"><i class="icon-search"></i><span class="hide_767_down">@lang('amma.search')</span></button>
                 </div>
              </form>
              </div>
          </div>
      </div>
  </div>
    <!-- /end new header -->

</header>