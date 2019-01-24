@extends('main.app')

@section('content')
    <div class="col-md-12">
        <h1 class="h4">Пользователи</h1>

            @foreach($categories as $category)
                <div class="row shadow">
                    <img src="{{ 'images/'. $category->image }}" alt="" >

                <a class="font-weight-bold" href="{{ route('news.url', implode("/", $category->category->ancestorsAndSelf($category->category_id)->pluck('slug')->all()).'/'.$category->slug) }}"> {{ $category->title }}</a><br>
                <strong class="small">{{$category->category->title}}</strong>
                <br>
                <br>
                </div>
                <br>
                <br>

            @endforeach


        {{ $categories->links() }}
    </div>
@endsection