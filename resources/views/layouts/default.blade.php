<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>E-commerce</title>
    <!-- IE6-10 -->
    <link rel="shortcut icon" href="favicon.ico">
    <!-- other browsers -->
    <link rel="icon" href="/favicon.ico">
    <!-- CSS  -->
    {!!Html::style('//fonts.googleapis.com/icon?family=Material+Icons')!!}
    {!!Html::style('/assets/plugins/materialize/css/materialize.min.css')!!}
    {!!Html::style('/assets/plugins/owl/owl.carousel.css')!!}
    {!!Html::style('/assets/plugins/flexslider/flexslider.css')!!}
    {!!Html::style('/assets/plugins/jStarbox/css/jstarbox.css')!!}
    {!!Html::style('/assets/plugins/nouislider/nouislider.tooltips.css')!!}
    {!!Html::style('/assets/plugins/nouislider/nouislider.pips.css')!!}
    {!!Html::style('/assets/plugins/nouislider/nouislider.css')!!}
    {!!Html::style('/assets/plugins/fancybox/jquery.fancybox.css')!!}

    {!!Html::style('/assets/fonts/roboto/css.css')!!}
    {!!Html::style('/assets/fonts/flag-icon/css/flag-icon.css')!!}
    {!!Html::style('/assets/fonts/myfont/css/myfont.css')!!}
    {!!Html::style('/assets/styles/css/main.css')!!}
    {!!Html::style('/assets/styles/css/media.css')!!}
    {!!Html::style('/assets/styles/css/custom.css')!!}
    {!!Html::style('/assets/plugins/qtip/jquery.qtip.min.css')!!}
    {!!Html::style('/assets/plugins/toastr/build/toastr.min.css')!!}




</head>

<body>
  @include('components.header')

  @yield('content')

  @include('components.footer')

 </body>
 </html>