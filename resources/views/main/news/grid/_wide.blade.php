@if(isset($categories[$numb]))
    <div class="col-lg-12">
        <div class="news-tile news-tile--wide">
            <img src="{{ '/images/'. $categories[$numb]->image }}" alt="{{ $categories[$numb]->title }}"
                 class="news-tile__image">
            <div class="news-tile__content">

                <a class="news-tile__title"
                   href="{{ route('news.url', implode("/", $categories[$numb]->category->ancestorsAndSelf($categories[$numb]->category_id)->pluck('slug')->all()).'/'.$categories[$numb]->slug) }}">
                    {{ $categories[$numb]->title }}
                </a>

                <a href="{{ route('news.url', implode("/", $categories[$numb]->category->ancestorsAndSelf($categories[$numb]->category_id)->pluck('slug')->all())) }}"
                   class="news-tile__category-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="#2ecdff"
                         stroke="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-circle">
                        <circle cx="12" cy="12" r="10"></circle>
                    </svg>
                    {{$categories[$numb]->category->title}}</a>


                <div class="news-tile__author">
                    <img src="{{ UsersHelper::get_avatar($categories[$numb]->owner->avatar ?? null) }}" alt="{{ $categories[$numb]->owner->username ?? $categories[$numb]->owner->first_name }}"
                         width="50px" style="border-radius: 50%">

                    <a class="font-weight-bold text-white"
                       href="{{ route('user.profile', $categories[$numb]->owner->route ?? $categories[$numb]->owner->username) }}">{{ $categories[$numb]->owner->username ?? $categories[$numb]->owner->first_name }}</a></li>
                </div>
            </div>
        </div>
    </div>
@endif