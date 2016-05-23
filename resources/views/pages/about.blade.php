@extends('layouts.default')

@section('content')
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="#" class="icon-home"></a></li>
            <li><a href="#" class="">Îmbracăminte</a></li>
            <li><a href="#" class="">Haine pentru femei</a></li>
            <li><a href="#" class="">Rochii</a></li>
            <li>Denumirea produsului</li>
        </ul>
    </div>
    <section class="suport">
        <div class="container">
          <h1>{{$page->name}}</h1>
        </div>
          <img src="{{$page->image}}" class="wide_img">
          <div class="container">
            <div class="row content">
              <div class="col l12">
                {!!$page->text!!}
              </div>
            </div>
          </div>
    </section>

@stop