<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 25.01.16
 * Time: 4:55
 */?>
@extends('layouts.master')
@section('body')
    {!! Form::open(array('class' => 'form styled3 row')) !!}
		<div class="col s12">
			<div class="input-field">    
			    @include('widgets.form._formitem_password', ['name' => 'password', 'title' => 'Пароль', 'placeholder' => 'Пароль' ])
			</div>
		</div>
		<div class="col s12">
			<div class="input-field">    
			    @include('widgets.form._formitem_password', ['name' => 'password_confirm', 'title' => 'Подтверждение пароля', 'placeholder' => 'Пароль' ])
			</div>
		</div>
		<div class="col s12">	
	    	@include('widgets.form._formitem_btn_submit', ['title' => 'Подтвердить', 'class'=>'btn btn_base btn_submit full_width'])
	    </div>
    {!! Form::close() !!}
@stop