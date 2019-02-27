@if(isset($categories[$numb]))
<div class="col-lg-4 my-5 average">
    <img src="{{ '/images/'. $categories[$numb]->image }}" alt="" width="100%">

    <div class="py-3">
        <a href="{{ route('news.url', implode("/", $categories[$numb]->category->ancestorsAndSelf($categories[$numb]->category_id)->pluck('slug')->all())) }}"
           class="news-tile__category-title">
            {{$categories[$numb]->category->title}}</a>
        <a class="font-weight-bold text-dark" href="{{ route('news.url', implode("/", $categories[$numb]->category->ancestorsAndSelf($categories[$numb]->category_id)->pluck('slug')->all()).'/'.$categories[$numb]->slug) }}"> {{ $categories[$numb]->title }}</a><br>

    </div>
    @include('main.components.user_info.user_info-mini', ['content'=>$categories[$numb]->owner])
    <div>
        @include('main.components.com_count.com_count', ['content'=>$categories[$numb]])
        @include('main.components.views.view_count', ['content'=>$categories[$numb]])
        @include('main.components.likes.like', ['content'=>$categories[$numb]])
    </div>
</div>
@endif

@if(isset($categories[$numb+1]))
<div class="col-lg-4 my-5 average">
    <img src="{{ '/images/'. $categories[$numb+1]->image }}" alt="" width="100%">

    <div class="py-3">
        <a href="{{ route('news.url', implode("/", $categories[$numb+1]->category->ancestorsAndSelf($categories[$numb+1]->category_id)->pluck('slug')->all())) }}"
           class="news-tile__category-title">
            {{$categories[$numb+1]->category->title}}</a>
        <a class="font-weight-bold text-dark" href="{{ route('news.url', implode("/", $categories[$numb+1]->category->ancestorsAndSelf($categories[$numb+1]->category_id)->pluck('slug')->all()).'/'.$categories[$numb+1]->slug) }}"> {{ $categories[$numb+1]->title }}</a><br>

    </div>
    @include('main.components.user_info.user_info-mini', ['content'=>$categories[$numb+1]->owner])
    <div>
        @include('main.components.com_count.com_count', ['content'=>$categories[$numb+1]])
        @include('main.components.views.view_count', ['content'=>$categories[$numb+1]])
        @include('main.components.likes.like', ['content'=>$categories[$numb+1]])
    </div>
</div>
@endif

@if(isset($categories[$numb+2]))
    <div class="col-lg-4 my-5 average">
        <img src="{{ '/images/'. $categories[$numb+2]->image }}" alt="" width="100%">

        <div class="py-3">
            <a href="{{ route('news.url', implode("/", $categories[$numb+2]->category->ancestorsAndSelf($categories[$numb+2]->category_id)->pluck('slug')->all())) }}"
               class="news-tile__category-title">
                {{$categories[$numb]->category->title}}</a>
            <a class="font-weight-bold text-dark" href="{{ route('news.url', implode("/", $categories[$numb+2]->category->ancestorsAndSelf($categories[$numb+2]->category_id)->pluck('slug')->all()).'/'.$categories[$numb+2]->slug) }}"> {{ $categories[$numb+2]->title }}</a><br>

        </div>
        @include('main.components.user_info.user_info-mini', ['content'=>$categories[$numb+2]->owner])
        <div>
            @include('main.components.com_count.com_count', ['content'=>$categories[$numb+2]])
            @include('main.components.views.view_count', ['content'=>$categories[$numb+2]])
            @include('main.components.likes.like', ['content'=>$categories[$numb+2]])
        </div>
    </div>
@endif

