@if(isset($categories[$numb]))
<div class="col-lg-8 my-2 average">
    <img src="{{ '/images/'. $categories[$numb]->image }}" alt="" width="100%">

    <div class="py-3">
        <a class="font-weight-bold text-dark" href="{{ route('news.url', implode("/", $categories[$numb]->category->ancestorsAndSelf($categories[$numb]->category_id)->pluck('slug')->all()).'/'.$categories[$numb]->slug) }}"> {{ $categories[$numb]->title }}</a><br>
        <a href="{{ route('news.url', implode("/", $categories[$numb]->category->ancestorsAndSelf($categories[$numb]->category_id)->pluck('slug')->all())) }}" class="small font-weight-bold">{{$categories[$numb]->category->title}}</a>
    </div>
</div>
@endif

@if(isset($categories[$numb+1]))
<div class="col-lg-4 my-2 average">
    <img src="{{ '/images/'. $categories[$numb+1]->image }}" alt="" width="100%">

    <div class="py-3">
        <a class="font-weight-bold text-dark" href="{{ route('news.url', implode("/", $categories[$numb+1]->category->ancestorsAndSelf($categories[$numb+1]->category_id)->pluck('slug')->all()).'/'.$categories[$numb+1]->slug) }}"> {{ $categories[$numb+1]->title }}</a><br>
        <a href="{{ route('news.url', implode("/", $categories[$numb+1]->category->ancestorsAndSelf($categories[$numb+1]->category_id)->pluck('slug')->all())) }}" class="small font-weight-bold">{{$categories[$numb+1]->category->title}}</a>
    </div>
</div>
@endif

