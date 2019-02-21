@if(isset($categorys[$numb]))
<div class="col-lg-12 wide">
    <img src="{{ '/images/'. $categorys[$numb]->image }}" alt="" width="100%">

    <div class="py-3">
        <a class="font-weight-bold text-dark" href="{{ route('news.url', implode("/", $categorys[$numb]->category->ancestorsAndSelf($categorys[$numb]->category_id)->pluck('slug')->all()).'/'.$categorys[$numb]->slug) }}"> {{ $categorys[$numb]->title }}</a><br>
        <a href="{{ route('news.url', implode("/", $categorys[$numb]->category->ancestorsAndSelf($categorys[$numb]->category_id)->pluck('slug')->all())) }}" class="small font-weight-bold">{{$categorys[$numb]->category->title}}</a>
    </div>
</div>
@endif