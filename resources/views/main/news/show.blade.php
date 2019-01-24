@extends('main.app')

@section('content')
    <div class="col-md-12">
        <h1 class="h4">{{ $item->title}}</h1>
      <div>{!! $item->content !!}</div>
    </div>
@endsection

@section('sidebar')
    SIDEBAR
@endsection