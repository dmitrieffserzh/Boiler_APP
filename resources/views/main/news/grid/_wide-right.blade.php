@if(isset($categories[$numb]))
<div class="col-lg-4 my-2 average">
    <img src="{{ '/images/'. $categories[$numb]->image }}" alt="" width="100%">

    <div class="py-3">

        <a href="{{ route('news.url', implode("/", $categories[$numb]->category->ancestorsAndSelf($categories[$numb]->category_id)->pluck('slug')->all())) }}"
           class="news-tile__category-title">
            {{$categories[$numb]->category->title}}</a>
        <a class="font-weight-bold text-dark" href="{{ route('news.url', implode("/", $categories[$numb]->category->ancestorsAndSelf($categories[$numb]->category_id)->pluck('slug')->all()).'/'.$categories[$numb]->slug) }}"> {{ $categories[$numb]->title }}</a><br>

    </div>
</div>
@endif

@if(isset($categories[$numb+1]))
<div class="col-lg-8 my-2 average">
    <div class="news-tile news-tile--wide">
        <img src="{{ '/images/'. $categories[$numb+1]->image }}" alt="{{ $categories[$numb+1]->title }}"
             class="news-tile__image">
        <div class="news-tile__content">

            <a class="news-tile__title"
               href="{{ route('news.url', implode("/", $categories[$numb+1]->category->ancestorsAndSelf($categories[$numb+1]->category_id)->pluck('slug')->all()).'/'.$categories[$numb+1]->slug) }}">
                {{ $categories[$numb]->title }}
            </a>

            <a href="{{ route('news.url', implode("/", $categories[$numb+1]->category->ancestorsAndSelf($categories[$numb+1]->category_id)->pluck('slug')->all())) }}"
               class="news-tile__category-title">
                {{$categories[$numb+1]->category->title}}</a>

            <div class="news-tile__author">
                <img src="{{ UsersHelper::get_avatar($categories[$numb+1]->owner->profile->avatar ?? null) }}" alt="{{ $categories[$numb+1]->owner->username ?? $categories[$numb+1]->owner->first_name }}"
                     width="50px" style="border-radius: 50%">

                <a class="font-weight-bold text-white"
                   href="{{ route('user.profile', $categories[$numb+1]->owner->route ?? $categories[$numb+1]->owner->username) }}">{{ $categories[$numb+1]->owner->username ?? $categories[$numb+1]->owner->first_name }}</a></li>
            </div>
        </div>
    </div>
</div>
@endif

