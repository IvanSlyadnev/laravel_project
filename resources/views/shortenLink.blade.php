@extends('layouts.app')

@section('content')

    <div class="container">
        @if (count($shortLinks) == 0)
            <h1>У вас еще нет сокращенных ссылок, пора добавить!</h1>
        @else
            <h1>Ваши сокращенные ссылки к вашим услугам</h1>
        @endif

        <div class="card">
            <div class="card-header">
                <form method="POST" action="{{ route('generate.shorten.link.post') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Name">
                        <input type="text" name="url" class="form-control" placeholder="URL">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Сократить ссылку</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body">

                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif

                @if (Session::has('mistake'))
                    <div class="alert alert-danger">
                        <p>{{Session::get('mistake')}}</p>
                    </div>
                @endif

                @if (Session::has('success_delete'))
                    <div class="alert alert-success">
                        <p>{{Session::get('success_delete')}}</p>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <table class="table table-bordered table-sm">
                    <thead>
                    <tr>
                        <th>Номер</th>
                        <th>Имя ссылки</th>
                        <th>Сокращенная ссылка</th>
                        <th>Ссылка</th>
                        <th>Переходов</th>
                        <th>Удалить</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($shortLinks as $index => $link)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$link->name}}</td>
                            <td>
                                <a href="{{ route('shorten.link', $link->short_code) }}"
                                   target="_blank">{{route('shorten.link', $link->short_code)}}</a>
                                <!-- */*/-->
                            </td>
                            <td>{{ $link->url}}</td>
                            <td>{{ $link->counter }}</td>
                            <td><a href="{{route('link.delete', $link->id)}}">
                                    <button class="btn btn-danger">Удалть</button>
                                </a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
