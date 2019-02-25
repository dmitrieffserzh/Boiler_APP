@if(isset($categories[$numb]))
<div class="col-lg-12 my-2 wide">
    <div class="col-lg-12" style="background: url('{{ '/images/'. $categories[$numb]->image }}'); min-height: 360px;background-size: cover;">
        <div class="py-5">
            <a class="font-weight-bold text-dark" href="{{ route('news.url', implode("/", $categories[$numb]->category->ancestorsAndSelf($categories[$numb]->category_id)->pluck('slug')->all()).'/'.$categories[$numb]->slug) }}"> {{ $categories[$numb]->title }}</a><br>
            <a href="{{ route('news.url', implode("/", $categories[$numb]->category->ancestorsAndSelf($categories[$numb]->category_id)->pluck('slug')->all())) }}" class="small font-weight-bold">{{$categories[$numb]->category->title}}</a>
        </div>
    </div>
</div>
@endif