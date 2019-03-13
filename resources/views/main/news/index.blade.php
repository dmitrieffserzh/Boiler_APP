@extends('main.app')

@section('content')



            <h1 class="h4 text-uppercase"><span class="font-weight-bold"> Новости</span> <span
                        class="font-weight-light text-muted"> логистики</span></h1>

            <div class="news">
            {{-- @for($numb = 0; $numb < count($categories); $numb = $numb + 14)
                 @include('main.news.grid.grid', ['categories' => $categories,'numb' => $numb])
             @endfor --}}
                @foreach($categories as $item)
                <div class="news__item">

                    <img src="{{ '/images/'. $item->image }}" alt="{{ $item->title }}"
                         class="news__image">
                    <div class="news__content">
                        <div class="news__date">{{ $item->created_at->diffForHumans() }}</div>
                        <a class="news__title"
                           href="{{ route('news.url', implode("/", $item->category->ancestorsAndSelf($item->category_id)->pluck('slug')->all()).'/'.$item->slug) }}">
                            {{ $item->title }}
                        </a>
                        <div class="news__info">
                            @include('main.components.com_count.com_count', ['content'=>$item])
                            @include('main.components.views.view_count', ['content'=>$item])
                            @include('main.components.likes.like', ['content'=>$item])
                        </div>
                    </div>
                </div>
                @endforeach
             </div>
            {{ $categories->links('main.pagination.default') }}
            <br>


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