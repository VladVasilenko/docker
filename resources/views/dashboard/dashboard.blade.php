{{--<h1>Информация о баре </h1>--}}
{{--<p>Название: {{$bar->name}}</p>--}}
{{--<p>Жанр музыки: {{$bar->music->name}}</p>--}}
{{--<p>Кол-во человек в баре: {{$bar->visitors->count()}}</p>--}}
{{--<h2>Список посетителей:</h2>--}}
{{--<table>--}}
{{--    <thead>--}}
{{--    <tr>--}}
{{--        <th>Имя</th>--}}
{{--        <th>Жанры</th>--}}
{{--        <th>Что делает</th>--}}
{{--    </tr>--}}
{{--    </thead>--}}
{{--    <tbody>--}}
{{--    @foreach($bar->visitors as $visitor)--}}
{{--        <tr>--}}
{{--            <td>{{$visitor->name}}</td>--}}
{{--            <td>{{implode(',',$visitor->musics->pluck('name')->toArray())}}</td>--}}
{{--            <td>{{$visitor->getActionName($bar)}}</td>--}}
{{--        </tr>--}}
{{--    @endforeach--}}
{{--    </tbody>--}}
{{--</table>--}}

{{--<a href="{{ route('logout') }}"--}}
{{--   onclick="event.preventDefault();--}}
{{--   document.getElementById('logout-form').submit();">--}}
{{--    Выйти--}}
{{--</a>--}}
{{--<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--    @csrf--}}
{{--</form>--}}


{{--<?php--}}
