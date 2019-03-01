@if(isset($categories[$numb]))

    <div class="news__item news__item--wide">
        <img src="{{ '/images/'. $categories[$numb]->image }}" alt="{{ $categories[$numb]->title }}"
             class="news__image">
        <div class="news__content">

            <div class="news__date">{{ $categories[$numb]->created_at->diffForHumans() }}</div>

            <a class="news-tile__title"
               href="{{ route('news.url', implode("/", $categories[$numb]->category->ancestorsAndSelf($categories[$numb]->category_id)->pluck('slug')->all()).'/'.$categories[$numb]->slug) }}">
                {{ $categories[$numb]->title }}
            </a>

            <a href="{{ route('news.url', implode("/", $categories[$numb]->category->ancestorsAndSelf($categories[$numb]->category_id)->pluck('slug')->all())) }}"
               class="news-tile__category-title">
                {{$categories[$numb]->category->title}}</a>


            <div class="news-tile__author">
                <div class="d-inline-block position-relative">
                <img src="{{ UsersHelper::get_avatar($categories[$numb]->owner->profile->avatar ?? NULL) }}" alt="{{ $categories[$numb]->owner->username ?? $categories[$numb]->owner->first_name }}"
                     width="50px" style="border-radius: 50%">
                @if( $categories[$numb]->owner->is_online() )
                    <span class="component-status component-status--online"></span>
                @else
                    <span class="component-status component-status--offline"></span>
                @endif
                </div>
                <a class="font-weight-bold text-white"
                   href="{{ route('user.profile', $categories[$numb]->owner->route ?? $categories[$numb]->owner->username) }}">{{ $categories[$numb]->owner->username ?? $categories[$numb]->owner->first_name }}</a></li>
            </div>
        </div>
    </div>

@endif

@if(isset($categories[$numb+1]))
<div class="news__item">
    <img src="{{ '/images/'. $categories[$numb+1]->image }}" alt="" width="100%">

    <div class="py-3">
        <a href="{{ route('news.url', implode("/", $categories[$numb+1]->category->ancestorsAndSelf($categories[$numb+1]->category_id)->pluck('slug')->all())) }}"
           class="news-tile__category-title">
            {{$categories[$numb+1]->category->title}}</a>
        <a class="font-weight-bold text-dark" href="{{ route('news.url', implode("/", $categories[$numb+1]->category->ancestorsAndSelf($categories[$numb+1]->category_id)->pluck('slug')->all()).'/'.$categories[$numb+1]->slug) }}"> {{ $categories[$numb+1]->title }}</a><br>
    </div>
{{--@include('main.components.user_info.user_info-mini', ['content'=>$categories[$numb+1]])--}}
 <div>
     @include('main.components.com_count.com_count', ['content'=>$categories[$numb+1]])
     @include('main.components.views.view_count', ['content'=>$categories[$numb+1]])
     @include('main.components.likes.like', ['content'=>$categories[$numb+1]])
 </div>
</div>
@endif

