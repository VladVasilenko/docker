@extends('layouts.app')

@section('content')
<h1>Информация о пользователе </h1>
<p>ФИО: {{$info->userName}}</p>
<p>E-mail: {{$info->userEmail}}</p>
<p>Фото:<img src="{{$info->userPhoto}}"></p>
<p>Бонус:{{$info->bonusName}}</p>



<a href="{{ route('logout') }}"
   onclick="event.preventDefault();
   document.getElementById('logout-form').submit();">
    Выйти
</a>
@if(!$info->hasBonus)
    <a href="{{ route('user.setBonus') }}">
        Получить бонус
    </a>
    @endif
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
@endsection
