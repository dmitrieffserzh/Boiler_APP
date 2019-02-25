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
                   class="small font-weight-bold">{{$categories[$numb]->category->title}}</a>
                <div class="news-tile__author">
                    <img src="{{ UsersHelper::get_avatar($categories[$numb]->owner->avatar ?? null) }}" alt="" width="50px" style="border-radius: 50%">

                    <a class="font-weight-bold text-white" href="{{ route('user.profile', $categories[$numb]->owner->route ?? $categories[$numb]->owner->username) }}">{{ $categories[$numb]->owner->username ?? $categories[$numb]->owner->first_name }}</a></li>
                </div>
            </div>
        </div>
    </div>
@endif