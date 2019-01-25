@extends('main.app')

@section('content')
    <div class="col-md-12">
        <h1 class="h4">Новости</h1>

            @foreach($categories as $category)
                <div class="row border">
                    <div class="col-md-4 py-3">
                    <img src="{{ '/images/'. $category->image }}" alt="" width="100%">
                    </div>
                    <div class="col-md-8 py-3">
                <a class="font-weight-bold text-dark" href="{{ route('news.url', implode("/", $category->category->ancestorsAndSelf($category->category_id)->pluck('slug')->all()).'/'.$category->slug) }}"> {{ $category->title }}</a><br>
                <a href="{{ route('news.url', implode("/", $category->category->ancestorsAndSelf($category->category_id)->pluck('slug')->all())) }}" class="small font-weight-bold">{{$category->category->title}}</a>
                </div>
                </div>

            @endforeach

        {{ $categories->links() }}
    </div>
@endsection

@section('sidebar')
    <div class="col">
        <h5 class="h5">Категории</h5>
        <ul class="list-group list-group-flush">
        @php
            $traverse = function ($categories, $prefix = '') use (&$traverse) {
            foreach ($categories as $category) {
                echo  '<li class="list-group-item p-1"><a href="'. route('news.url', implode("/", $category->ancestorsAndSelf($category->id)->pluck('slug')->all())).'">'.$prefix.' '.$category->title.'</a></li>';

                $traverse($category->children, $prefix.'-');
            }
        };
        $traverse($tree);
        @endphp
        </ul>
    </div>
@endsection