@if(isset($categories[$numb]))
    <div class="col-lg-12">
        <div class="news-tile news-tile--wide">
            <img src="{{ '/images/'. $categories[$numb]->image }}" alt="{{ $categories[$numb]->title }}"
                 class="news-tile__image">
            <div class="news-tile__content">
                <a class="font-weight-bold text-dark"
                   href="{{ route('news.url', implode("/", $categories[$numb]->category->ancestorsAndSelf($categories[$numb]->category_id)->pluck('slug')->all()).'/'.$categories[$numb]->slug) }}">
                    {{ $categories[$numb]->title }}
                </a>
                <a href="{{ route('news.url', implode("/", $categories[$numb]->category->ancestorsAndSelf($categories[$numb]->category_id)->pluck('slug')->all())) }}"
                   class="small font-weight-bold">{{$categories[$numb]->category->title}}</a>
            </div>
        </div>
    </div>
@endif