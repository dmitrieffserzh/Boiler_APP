@if(isset($categorys[$numb]))
<div class="col-lg-8 average">
    <img src="{{ '/images/'. $categorys[$numb]->image }}" alt="" width="100%">

    <div class="py-3">
        <a class="font-weight-bold text-dark" href="{{ route('news.url', implode("/", $categorys[$numb]->category->ancestorsAndSelf($categorys[$numb]->category_id)->pluck('slug')->all()).'/'.$categorys[$numb]->slug) }}"> {{ $categorys[$numb]->title }}</a><br>
        <a href="{{ route('news.url', implode("/", $categorys[$numb]->category->ancestorsAndSelf($categorys[$numb]->category_id)->pluck('slug')->all())) }}" class="small font-weight-bold">{{$categorys[$numb]->category->title}}</a>
    </div>
</div>
@endif

@if(isset($categorys[$numb+1]))
<div class="col-lg-4 average">
    <img src="{{ '/images/'. $categorys[$numb+1]->image }}" alt="" width="100%">

    <div class="py-3">
        <a class="font-weight-bold text-dark" href="{{ route('news.url', implode("/", $categorys[$numb+1]->category->ancestorsAndSelf($categorys[$numb+1]->category_id)->pluck('slug')->all()).'/'.$categorys[$numb+1]->slug) }}"> {{ $categorys[$numb+1]->title }}</a><br>
        <a href="{{ route('news.url', implode("/", $categorys[$numb+1]->category->ancestorsAndSelf($categorys[$numb+1]->category_id)->pluck('slug')->all())) }}" class="small font-weight-bold">{{$categorys[$numb+1]->category->title}}</a>
    </div>
</div>
@endif

