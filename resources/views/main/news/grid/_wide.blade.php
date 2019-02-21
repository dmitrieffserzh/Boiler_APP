@if(isset($categorys[$numb]))
<div class="col-lg-12 my-2 wide">
    <div class="col-lg-12" style="background: url('{{ '/images/'. $categorys[$numb]->image }}'); min-height: 360px;background-size: contain;">
        <div class="py-5">
            <a class="font-weight-bold text-dark" href="{{ route('news.url', implode("/", $categorys[$numb]->category->ancestorsAndSelf($categorys[$numb]->category_id)->pluck('slug')->all()).'/'.$categorys[$numb]->slug) }}"> {{ $categorys[$numb]->title }}</a><br>
            <a href="{{ route('news.url', implode("/", $categorys[$numb]->category->ancestorsAndSelf($categorys[$numb]->category_id)->pluck('slug')->all())) }}" class="small font-weight-bold">{{$categorys[$numb]->category->title}}</a>
        </div>
    </div>
</div>
@endif