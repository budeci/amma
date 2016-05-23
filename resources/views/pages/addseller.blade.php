@extends('layouts.default')

@section('content')
<div class="container">
        <ul class="breadcrumbs">
            <li>
                <a href="#" class="icon-home"></a>
            </li>
            <li><a href="#" class="">Contul meu </a></li>
            <li>Setarile contului</li>
        </ul>
    </div>
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col l3 m5 s12">
                    <div class="bordered divide-top">
                        <div class="person_card styled1">
                            <div class="display_flex border_bottom">
                                <div class="wrapp_img">
                                    <img src="assets/images/avatar1.jpg">
                                </div>
                                <div class="content">
                                    <h4>Nume Prenume</h4>
                                    <a href="#" class="btn_ btn_small btn_base waves-effect waves-teal f_small">Adaugă un produs</a>
                                </div>
                            </div>
                            <div class="buttons">
                                <ul class="links_to">
                                    <li><a href="#" class="active">Istoria cumpărăturilor</a></li>
                                    <li><a href="#">Produse Favorite (10)</a></li>
                                    <li><a href="#">Produsele mele (10)</a></li>
                                    <li><a href="#">Vouchere (2)</a></li>
                                    <li><a href="#">Setările contului</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col l9 m7 s12">
                {{ Form::open(array('route' => 'addseller.store', 'class' => 'form styled2 row addseller', 'method' => 'POST', 'files'=>true)) }}
                    <div class="col l12 m12 s12">
                      <div class="file-field input-field">
                        <div class="wrapp_img left">
                          <img src="assets/images/no-avatar2.png" height="78" width="78">
                        </div>
                        <div class="left">
                          <div class="btn_ btn_base input_file xsmall">
                            <span>Logo</span>
                            <input type="file" name="image" required class="avatar">
                          </div>
                        </div>
                        <p class="left">* PNG, JPG minim 76x76px, proportie 1:1</p>
                      </div>
                    </div>
                    <div class="col l6 m6 s12">
                      <div class="input-field">
                      <span class="label">NUMELE</span>
                        <input type="text" required name="name" placeholder="Ex: Ion">
                      </div>
                    </div>
                    <div class="col l6 m6 s12">
                      <div class="input-field">
                      <span class="label">Email</span>
                        <input type="email" required name="email" placeholder="Email">
                      </div>
                    </div>
                    <div class="col l6 m6 s12">
                      <div class="input-field">
                      <span class="label">TELEFON</span>
                        <input type="tel" required name="phone" placeholder="Ex: 070 323 677">
                      </div>
                    </div>
                    <div class="col l6 m6 s12">
                      <div class="input-field">
                      <span class="label">DESCRIPTION</span>
                        <textarea name="description" placeholder=""></textarea>
                      </div>
                    </div>
                    <div class="col l12">
                      <button type="submit" class="btn btn_base btn_submit">Save</button>
                    </div>
                  {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>

@stop