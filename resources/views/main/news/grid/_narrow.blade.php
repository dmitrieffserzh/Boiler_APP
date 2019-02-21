{{--
<div class="col-lg-4 narrow">
    <img src="{{ '/images/'. $category->image }}" alt="" width="100%">

    <div class="py-3">
        <a class="font-weight-bold text-dark" href="{{ route('news.url', implode("/", $category->category->ancestorsAndSelf($category->category_id)->pluck('slug')->all()).'/'.$category->slug) }}"> {{ $category->title }}</a><br>
        <a href="{{ route('news.url', implode("/", $category->category->ancestorsAndSelf($category->category_id)->pluck('slug')->all())) }}" class="small font-weight-bold">{{$category->category->title}}</a>
    </div>
</div>
--}}

@include('main.news.grid._wide', ['categorys'=>$categorys,'numb'=>$numb])
@include('main.news.grid._average2', ['categorys'=>$categorys,'numb'=>$numb+1])
@include('main.news.grid._average', ['categorys'=>$categorys,'numb'=>$numb+4])
@include('main.news.grid._average2', ['categorys'=>$categorys,'numb'=>$numb+6])
@include('main.news.grid._average3', ['categorys'=>$categorys,'numb'=>$numb+9])
@include('main.news.grid._average2', ['categorys'=>$categorys,'numb'=>$numb+11])
