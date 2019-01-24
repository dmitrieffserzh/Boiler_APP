@extends('main.app')

@section('content')
    <div class="col-md-12">
        <h1 class="h4">Пользователи</h1>

            @foreach($categories as $category)
                <div class="row border">
                    <div class="col-md-4 py-3">
                    <img src="{{ 'images/'. $category->image }}" alt="" width="100%">
                    </div>
                    <div class="col-md-8 py-3">
                <a class="font-weight-bold" href="{{ route('news.url', implode("/", $category->category->ancestorsAndSelf($category->category_id)->pluck('slug')->all()).'/'.$category->slug) }}"> {{ $category->title }}</a><br>
                <strong class="small font-weight-bold">{{$category->category->title}}</strong>
                </div>
                </div>

            @endforeach


        {{ $categories->links() }}
    </div>
@endsection

@section('sidebar')
    SIDEBAR
@endsection