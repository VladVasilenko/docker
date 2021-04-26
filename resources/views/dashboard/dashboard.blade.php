{{--<h1>Информация о баре </h1>--}}
{{--<p>Название: {{$bar->name}}</p>--}}
{{--<p>Жанр музыки: {{$bar->music->name}}</p>--}}
{{--<p>Кол-во человек в баре: {{$bar->visitors->count()}}</p>--}}

{{--<a href="{{ route('logout') }}"--}}
{{--   onclick="event.preventDefault();--}}
{{--   document.getElementById('logout-form').submit();">--}}
{{--    Выйти--}}
{{--</a>--}}
{{--<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--    @csrf--}}
{{--</form>--}}


{{--<?php--}}
@extends('layouts.app')

@section('content')
    <h1>Информация о пользователях </h1>
    <h2>Список посетителей:</h2>
    <table>
        <thead>
        <tr>
            <th>Ид</th>
            <th>Дата регистрации</th>
            <th>Бонус</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user['id']}}</td>
                <td>{{$user['register_at']}}</td>
                <td>{{$user['bonusName']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault();
   document.getElementById('logout-form').submit();">
        Выйти
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
@endsection

