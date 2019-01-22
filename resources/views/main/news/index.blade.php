@extends('main.app')

@section('content')
    <div class="col-md-12">
        <h1 class="h4">Пользователи</h1>
        <ul style="list-style: none; padding: 0;margin: 0">
            @foreach($news as $item)
                <li style="margin: 0 0 5px; padding: 0 0 5px 0; border-bottom: 1px Solid #f5f5f8;">
                    <a href="{{ route('news', $item->id) }}">{{ $item->title}}</a></li>
            @endforeach
        </ul>
    </div>
@endsection