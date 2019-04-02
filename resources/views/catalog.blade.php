@extends('main.app_no_aside')

@section('content')

<br>
<br>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="container">
            <div class="row">

                @for($i=0;$i<20;$i++)
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="products-item">
                            <img src="test2.jpg" alt="" class="products-item__image">
                            <h2 class="products-item__title">Тестовый продукт</h2>
                            <div class="products-item__price">{{ rand(100,999) }} &#8381;</div>
                            <button class="products-item__add-to-cart">В корзину</button>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

@endsection
