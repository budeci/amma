<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 25.01.16
 * Time: 4:38
 */?>
@extends('layouts.master')
@section('body')
	<h1>INTRA ÎN CONTUL TĂU</h1>
	<p>Completează formularul pentru a te loga în cont.</p>
    {!! Form::open(array('class' => 'form styled3 row')) !!}
		<div class="col s12">
			<div class="input-field">
				@include('widgets.form._formitem_text', ['name' => 'email', 'title' => 'Email', 'placeholder' => 'Ваш Email' ])
			</div>
		</div>  
		<div class="col s12">
			<div class="input-field">
				@include('widgets.form._formitem_password', ['name' => 'password', 'title' => 'Пароль', 'placeholder' => 'Пароль' ])
			</div>
		</div> 		  
		<div class="col s12">
			<div class="input-field">
				@include('widgets.form._formitem_checkbox', ['name' => 'remember', 'title' => 'Запомнить меня','id'=>'check1'] )
			</div>
		</div>        
		<div class="col s12">
			@include('widgets.form._formitem_btn_submit', ['title' => 'Вход','class'=>'btn btn_base btn_submit full_width'])
			<p><a href="{{URL::to('/reset')}}" class="c_base">Забыли пароль?</a></p>
			<!-- <a href="#" class="btn btn_facebook full_width"><i class="icon-facebook"></i> Intră cu ajutorul Facebook</a>
			            <a href="#" class="btn btn_gplus full_width"><i class="icon-google-plus"></i> Intră cu ajutorul Google+</a> -->
		</div> 
    {!! Form::close() !!}

@stop