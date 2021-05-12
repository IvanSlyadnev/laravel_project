<?php
use \Illuminate\Support\Facades\Auth;

?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Сокращатель ссылок</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @guest
                            Добропожаловать на нашем сайте, для работы с сокращателем ссылок, пожалуйста зарегиструруйтесь
                            <a href="{{route('login')}}"><button class="btn-info">Авторизация</button></a>
                        @else
                            Вы зарегистрированы как {{Auth::user()->email}}
                            <a class="btn btn-success" href="{{route('urls.index')}}">Сокращатель ссылок</a>
                    @endguest

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
