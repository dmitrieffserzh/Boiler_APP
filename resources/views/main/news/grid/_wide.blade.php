@if(isset($categories[$numb]))
    <div class="news__item news__item--full">

        <img src="{{ '/images/'. $categories[$numb]->image }}" alt="{{ $categories[$numb]->title }}"
             class="news__image">
        <div class="news__content">
            <div class="news__date">{{ $categories[$numb]->created_at->diffForHumans() }}</div>
            <a class="news__title"
               href="{{ route('news.url', implode("/", $categories[$numb]->category->ancestorsAndSelf($categories[$numb]->category_id)->pluck('slug')->all()).'/'.$categories[$numb]->slug) }}">
                {{ $categories[$numb]->title }}
            </a>

        </div>
    </div>












    {{--<div class="col-lg-12">--}}
    {{--<div class="news-tile news-tile--wide">--}}
    {{--<img src="{{ '/images/'. $categories[$numb]->image }}" alt="{{ $categories[$numb]->title }}"--}}
    {{--class="news-tile__image">--}}
    {{--<div class="news-tile__content">--}}
    {{--{{ $categories[$numb]->created_at->diffForHumans() }}--}}
    {{--<a class="news-tile__title"--}}
    {{--href="{{ route('news.url', implode("/", $categories[$numb]->category->ancestorsAndSelf($categories[$numb]->category_id)->pluck('slug')->all()).'/'.$categories[$numb]->slug) }}">--}}
    {{--{{ $categories[$numb]->title }}--}}
    {{--</a>--}}

    {{--<a href="{{ route('news.url', implode("/", $categories[$numb]->category->ancestorsAndSelf($categories[$numb]->category_id)->pluck('slug')->all())) }}"--}}
    {{--class="news-tile__category-title">--}}
    {{--{{$categories[$numb]->category->title}}</a>--}}

    {{--<div class="news-tile__description">--}}
    {{--{!! str_limit( $categories[$numb]->content, $limit = 150, $end = '...') !!}--}}
    {{--</div>--}}

    {{--<div class="news-tile__author">--}}
    {{--<div class="d-inline-block position-relative">--}}
    {{--<img src="{{ UsersHelper::get_avatar($categories[$numb]->owner->profile->avatar ?? null) }}" alt="{{ $categories[$numb]->owner->username ?? $categories[$numb]->owner->first_name }}"--}}
    {{--width="50px" style="border-radius: 50%">--}}
    {{--@if( $categories[$numb]->owner->is_online() )--}}
    {{--<span class="component-status component-status--online"></span>--}}
    {{--@else--}}
    {{--<span class="component-status component-status--offline"></span>--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--<a class="font-weight-bold text-white"--}}
    {{--href="{{ route('user.profile', $categories[$numb]->owner->route ?? $categories[$numb]->owner->username) }}">{{ $categories[$numb]->owner->username ?? $categories[$numb]->owner->first_name }}</a></li>--}}

    {{--<div>--}}
    {{--@include('main.components.com_count.com_count', ['content'=>$categories[$numb]])--}}
    {{--@include('main.components.views.view_count', ['content'=>$categories[$numb]])--}}
    {{--@include('main.components.likes.like', ['content'=>$categories[$numb]])--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
@endif