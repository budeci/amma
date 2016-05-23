@extends('layouts.default')

@section('content')
<div class="content">
    <div class="container">
        <h1>{{$page->name}}</h1>
    </div><!--container-->
    <div class="container">
        <div class="row content">
            <div class="col l12">
                {!!$page->text!!}
            </div>
        </div>
    </div>
</div><!--content-->

@stop