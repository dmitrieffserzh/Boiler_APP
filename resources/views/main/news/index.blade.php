@extends('main.app')

@section('content')
    <div class="col-md-12">
        <h1 class="h4">Новости</h1>
        <div class="row">

            @for($numb = 0; $numb < count($categories); $numb = $numb + 14)
                @include('main.news.grid.grid', ['categories' => $categories,'numb' => $numb])
            @endfor

        </div>
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