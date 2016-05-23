<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 25.01.16
 * Time: 4:51
 */?>
@extends('layouts.master')
@section('body')
	<h1>ÎNREGISTRAREA CONTULUI</h1>
    <p>Completează formularul pentru a crea un cont.</p>
    {!! Form::open(array('class' => 'form styled3 row')) !!}
        <div class="col s12">
          <div class="input-field">
            @include('widgets.form._formitem_text', ['name' => 'email', 'title' => 'Email', 'placeholder' => ''])
          </div>
        </div>

		<div class="col s12">
			<div class="input-field">
				@include('widgets.form._formitem_password', ['name' => 'password', 'title' => 'Parola', 'placeholder' => 'Parola'])
			</div>
		</div>

		<div class="col s12">
			<div class="input-field">
				@include('widgets.form._formitem_password', ['name' => 'password_confirm', 'title' => 'Confirma Parola', 'placeholder' => 'Parola'])
			</div>
		</div>		   
    
		<div class="col s12">
			@include('widgets.form._formitem_btn_submit', ['title' => 'Crează un cont', 'class'=>'btn btn_base btn_submit full_width'])
			<p>Ai deja un cont? <a href="{{URL::to('/login')}}" class="c_base">Intră în cont</a></p>
		</div>
    {!! Form::close() !!}
@stop