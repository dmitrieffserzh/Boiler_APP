@extends('main.app')

@section('content')
    <div class="col-md-12">
        <h1 class="h4">{{ $item->title}}</h1>

        <a href="{{ route('news.url', implode("/", $item->category->ancestorsAndSelf($item->category_id)->pluck('slug')->all())) }}" class="small font-weight-bold">{{$item->category->title}}</a>

      <div>{!! $item->content !!}</div>

        <div>Просмотры: {{ $item->count_view }}</div>
        <div>  @include('main.components.likes.like', ['content'=>$item]) </div>
    </div>
@endsection

@section('sidebar')
    SIDEBAR
@endsection