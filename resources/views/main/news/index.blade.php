@extends('main.app')

@section('content')
    <div class="col-md-12">
        <h1 class="h4">Пользователи</h1>
        <ul style="list-style: none; padding: 0;margin: 0">
            @foreach($categories as $category)
                {{ $category->title }}<br>
            @endforeach
        </ul>
    </div>
@endsection