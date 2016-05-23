<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 25.01.16
 * Time: 4:53
 */?>
@extends('layouts.master')
@section('body')
	<h1>RESTABILEȘTE PAROLA</h1>
	<p>Introduce adresa electronică pentru a restabili parola.</p>
    {!! Form::open(array('class' => 'form styled3 row')) !!}
		<div class="col s12">
			<div class="input-field">    
			    @include('widgets.form._formitem_text', ['name' => 'email', 'title' => 'Email', 'placeholder' => '' ])
			</div>
		</div>
		<div class="col s12">
	    	@include('widgets.form._formitem_btn_submit', ['title' => 'Сброс пароля','class'=>'btn btn_base btn_submit full_width'])
	    </div>
    {!! Form::close() !!}
@stop