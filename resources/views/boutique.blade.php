@extends('layout')

@section('content')
<div class="cardd">
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-7 pr-0">
                <div class="flexible">
                    <a href="#">
                        <span>главная</span>
                    </a>
                    <span>/</span>
                    <h4>{{$boutique->getTranslatedAttribute('name')}}</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-5 col-md-6">
                <div class="slider slider-for">
                    @php
                        $images = $boutique->imagesArray;
                    @endphp
                    @foreach($images as $image)
                        <div>
                            <img src="{{Voyager::image($image)}}">
                        </div>
                    @endforeach
                </div>
                <div class="slider slider-nav">
                    @foreach($images as $image)
                        <div>
                            <img src="{{Voyager::image($image)}}">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-xl-7 col-md-6 pl-3">
                <div class="boutique__info-wrapper">
                    <div class="row">
                        <div class="col-xl-6 col-sm-8 col-12">
                            <h1>{{$boutique->getTranslatedAttribute('name')}}</h1>
                        </div>
                        <div class="col-xl-6 col-sm-4 col-12">
                            <p>{{__('Поделиться')}}</p>
                            <ul class="share">
                                <li><a href="#"><i class="fab fa-twitter-square"></i>11.6K</a></li>
                                <li><a href="#"><i class="fab fa-facebook-square"></i>12.3M</a></li>
                                <li><a href="#"><i class="fab fa-google-plus-square"></i>11.38M</a></li>
                                <li><a href="#"><i class="fab fa-invision"></i>8.42K</a></li>
                            </ul>
                        </div>
                        <div class="col-xl-4 col-sm-5 col-12">
                            <div class="boutique__rating">
                                <p>{{__('Рейтинг')}}:</p>
                                <div class="star-rating__wrapper">
                                    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                        <input class="star-rating__input" type="radio" name="rating" value="5">
                                    </label>
                                    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                        <input class="star-rating__input" type="radio" name="rating" value="4" checked>
                                    </label>
                                    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                        <input class="star-rating__input" type="radio" name="rating" value="3">
                                    </label>
                                    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                        <input class="star-rating__input" type="radio" name="rating" value="2">
                                    </label>
                                    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                        <input class="star-rating__input" type="radio" name="rating" value="1">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8"></div>
                    </div>
                    <div class="boutique__info">
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-sm-4 col-6">
                                <p>{{__('Торговый дом')}}</p>
                            </div>
                            <div class="col-xl-9 col-md-6 col-sm-8 col-6">
                                <h2>{{$boutique->tradingHousesName}}</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-sm-4 col-6">
                                <p>{{__('Категория')}}</p>
                            </div>
                            <div class="col-xl-9 col-md-6 col-sm-8 col-6">
                                <h2>{{$boutique->categoriesName}}</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-sm-4 col-6">
                                <p>{{__('Бутик')}}</p>
                            </div>
                            <div class="col-xl-9 col-md-6 col-sm-8 col-6">
                                <h2>{{$boutique->getTranslatedAttribute('name')}}</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-sm-4 col-6">
                                <p>{{__('Имя продавца')}}</p>
                            </div>
                            <div class="col-xl-9 col-md-6 col-sm-8 col-6">
                                <h2>{{$boutique->getTranslatedAttribute('seller_name')}}</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-sm-4 col-6">
                                <p>{{__('Имя владельца')}}</p>
                            </div>
                            <div class="col-xl-9 col-md-6 col-sm-8 col-6">
                                <h2>{{$boutique->getTranslatedAttribute('owner_name')}}</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-sm-4 col-6">
                                <p>{{__('Язык общения')}}</p>
                            </div>
                            <div class="col-xl-9 col-md-6 col-sm-8 col-6">
                                <h2>{{$boutique->getTranslatedAttribute('languages')}}</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-sm-4 col-6">
                                <p>{{__('Телефон')}}</p>
                            </div>
                            <div class="col-xl-9 col-md-6 col-sm-8 col-6">
                                <h2>{{$boutique->getTranslatedAttribute('phone')}}</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-sm-4 col-6">
                                <p>{{__('Whatsapp')}}</p>
                            </div>
                            <div class="col-xl-9 col-md-6 col-sm-8 col-6">
                                <h2>{{$boutique->getTranslatedAttribute('whatsapp')}}</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-sm-4 col-6">
                                <p>{{__('WeChat')}}</p>
                            </div>
                            <div class="col-xl-9 col-md-6 col-sm-8 col-6">
                                <h2>{{$boutique->getTranslatedAttribute('weechat')}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="boutique__description">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h1>{{__('Описание магазина')}}</h1>
                </div>
                <div class="col-xl-12">
                    <div class="moreContent">
                        <p>{!!$boutique->getTranslatedAttribute('full_description')!!}</p>
                        <div class="content__fadeout"></div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <a class="boutique__more">Подробнее</a>
                </div>
                <div class="col-xl-10"></div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="pricesPerProducts">
                    <div class="row">
                        <div class="col-xl-4 col-6">
                            <h1>Цены на товары</h1>
                        </div>
                        <div class="col-xl-4 col-6">
                            <select class="prices js-states form-control select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="kzt" >&#8376; KZT</option>
                                <option value="usd">&#36; USD</option>
                                <option value="rub">&#8381; RUB</option>
                            </select>
                        </div>
                        <div class="col-xl-4"></div>
                    </div>
                    <div class="priceList">
                        <ul>
                            @if($boutique->products->count())
                                @foreach($boutique->products as $product)
                                    <li>
                                        <p>{{$product->getTranslatedAttribute('name')}}</p>
                                        <h2>от {{$product->price_from}} до {{$product->price_to}} тг</h2>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                    <div class="mallMap">
                        <div class="row">
                            <div class="col-xl-12">
                                <h1>{{__('Карта торгового центра')}}</h1>
                            </div>
                        </div>
                        <a class="zoomMap" href="images/mallMap.png">
                            <img src="{{Voyager::image($boutique->trading_house_image)}}">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="reviews__wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row justify-content-between pl-3 pr-3">
                            <h1>Отзывы о бутике</h1>
                            <div class="avg--rate">
                                <p>Средняя оценка <span>{{$boutique->averageRating->rating ?? 0}}</span></p>
                                <div class="star-rating__wrapper">
                                    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg {{($boutique->averageRating->rating ?? 0) >= 5 ? 'star-rating__checked' : ''}}">
                                        <input class="star-rating__input" type="radio" name="rating" value="5">
                                    </label>
                                    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg {{($boutique->averageRating->rating ?? 0) >= 4 ? 'star-rating__checked' : ''}}">
                                        <input class="star-rating__input" type="radio" name="rating" value="4" checked>
                                    </label>
                                    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg {{($boutique->averageRating->rating ?? 0) >= 3 ? 'star-rating__checked' : ''}}">
                                        <input class="star-rating__input" type="radio" name="rating" value="3">
                                    </label>
                                    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg {{($boutique->averageRating->rating ?? 0) >= 2 ? 'star-rating__checked' : ''}}">
                                        <input class="star-rating__input" type="radio" name="rating" value="2">
                                    </label>
                                    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg {{($boutique->averageRating->rating ?? 0) >= 1 ? 'star-rating__checked' : ''}}">
                                        <input class="star-rating__input" type="radio" name="rating" value="1">
                                    </label>
                                </div>
                                <button type="button" class="leave__feedback" id="create-review" data-boutique_id="{{$boutique->id}}">Оставить отзыв</button>
                            </div>
                        </div>
                    </div>
                    @if($boutique->reviews->count())
                        @foreach($boutique->reviews as $comment)
                            <div class="col-xl-12 comment--wrapper">
                                <div class="row justify-content-between">
                                    <div class="col-xl-2 mobile__flex">
                                        <h2>Оценка</h2>
                                        <div class="star-rating__wrapper">
                                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg {{$comment->rating >= 5 ? 'star-rating__checked' : ''}}">
                                                <input class="star-rating__input" type="radio" name="rating" value="5">
                                            </label>
                                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg {{$comment->rating >= 4 ? 'star-rating__checked' : ''}}">
                                                <input class="star-rating__input" type="radio" name="rating" value="4">
                                            </label>
                                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg {{$comment->rating >= 3 ? 'star-rating__checked' : ''}}">
                                                <input class="star-rating__input" type="radio" name="rating" value="3">
                                            </label>
                                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg {{$comment->rating >= 2 ? 'star-rating__checked' : ''}}">
                                                <input class="star-rating__input" type="radio" name="rating" value="2">
                                            </label>
                                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg {{$comment->rating >= 1 ? 'star-rating__checked' : ''}}">
                                                <input class="star-rating__input" type="radio" name="rating" value="1">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xl-10">
                                        <h2>{{$comment->name}} <span>{{$comment->dateFormated}}</span></h2>
                                        <p>{{$comment->review}}</p>
                                        <div class="row justify-content-end mt-3">
                                        <div class="col-xl-3 col-lg-4 col-sm-6 col-md-5 col-9">
                                            <div class="useful__wrapper">
                                                <h2>Отзыв полезен</h2>
                                                <span><button class="liked" type="button"></button>{{$comment->likes}}</span>
                                                <span><button class="disliked" type="button"></button>{{$comment->dislikes}}</span>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        
        <div class="container-fluid favorite-boutiques">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 mt-5">
                    <h1 class="favorite-header">{{__('Избранные бутики')}}</h1>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="boutique-block">
                        <img src="images/boutique-oodji.png">
                        <h3 class="boutique-header">oodji</h3>
                        <p class="boutique-title">Женская одежда</p>
                        <div class="star-rating__wrapper">
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="5">
                            </label>
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="4" checked>
                            </label>
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="3">
                            </label>
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="2">
                            </label>
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="1">
                            </label>
                        </div>
                        <a href="#">Перейти в бутик</a>
                        <p>Артикул: 100156321</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                        <div class="boutique-block">
                        <img src="images/boutique-oodji.png">
                        <h3 class="boutique-header">oodji</h3>
                        <p class="boutique-title">Женская одежда</p>
                        <div class="star-rating__wrapper">
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="5">
                            </label>
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="4" checked>
                            </label>
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="3">
                            </label>
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="2">
                            </label>
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="1">
                            </label>
                        </div>
                        <a href="#">Перейти в бутик</a>
                        <p>Артикул: 100156321</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="boutique-block">
                        <img src="images/boutique-oodji.png">
                        <h3 class="boutique-header">oodji</h3>
                        <p class="boutique-title">Женская одежда</p>
                        <div class="star-rating__wrapper">
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="5">
                            </label>
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="4" checked>
                            </label>
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="3">
                            </label>
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="2">
                            </label>
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="1">
                            </label>
                        </div>
                        <a href="#">Перейти в бутик</a>
                        <p>Артикул: 100156321</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="boutique-block">
                        <img src="images/boutique-oodji.png">
                        <h3 class="boutique-header">oodji</h3>
                        <p class="boutique-title">Женская одежда</p>
                        <div class="star-rating__wrapper">
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="5">
                            </label>
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="4" checked>
                            </label>
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="3">
                            </label>
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="2">
                            </label>
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="1">
                            </label>
                        </div>
                        <a href="#">Перейти в бутик</a>
                        <p>Артикул: 100156321</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="boutique-block">
                        <img src="images/boutique-oodji.png">
                        <h3 class="boutique-header">oodji</h3>
                        <p class="boutique-title">Женская одежда</p>
                        <div class="star-rating__wrapper">
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="5">
                            </label>
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="4" checked>
                            </label>
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="3">
                            </label>
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="2">
                            </label>
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="1">
                            </label>
                        </div>
                        <a href="#">Перейти в бутик</a>
                        <p>Артикул: 100156321</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="boutique-block">
                        <img src="images/boutique-oodji.png">
                        <h3 class="boutique-header">oodji</h3>
                        <p class="boutique-title">Женская одежда</p>
                        <div class="star-rating__wrapper">
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="5">
                            </label>
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="4" checked>
                            </label>
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="3">
                            </label>
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="2">
                            </label>
                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                <input class="star-rating__input" type="radio" name="rating" value="1">
                            </label>
                        </div>
                        <a href="#">Перейти в бутик</a>
                        <p>Артикул: 100156321</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid similar-boutiques">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 mt-5">
                    <h1 class="favorite-header">{{__('Похожие бутики')}}</h1>
                </div>
                @if($boutique->related->count())
                    @foreach($boutique->related as $boutique)
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                            <div class="boutique-block">
                                <img src="{{Voyager::image($boutique->firstImage)}}">
                                <h3 class="boutique-header">{{$boutique->getTranslatedAttribute('name')}}</h3>
                                <p class="boutique-title">{{$boutique->categoriesName}}</p>
                                <div class="star-rating__wrapper">
                                    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                        <input class="star-rating__input" type="radio" name="rating" value="5">
                                    </label>
                                    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                        <input class="star-rating__input" type="radio" name="rating" value="4" checked>
                                    </label>
                                    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                        <input class="star-rating__input" type="radio" name="rating" value="3">
                                    </label>
                                    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                        <input class="star-rating__input" type="radio" name="rating" value="2">
                                    </label>
                                    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                        <input class="star-rating__input" type="radio" name="rating" value="1">
                                    </label>
                                </div>
                                <a href="{{route('boutique', $boutique)}}">Перейти в бутик</a>
                                <p>Артикул: {{$boutique->id}}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="container-fluid recommended-boutiques">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 mt-5">
                    <h1 class="favorite-header">{{__('Рекомендуемые бутики')}}</h1>
                </div>
                @if($boutique->related->count())
                    @foreach($boutique->recommended as $boutique)
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                            <div class="boutique-block">
                                <img src="{{Voyager::image($boutique->firstImage)}}">
                                <h3 class="boutique-header">{{$boutique->getTranslatedAttribute('name')}}</h3>
                                <p class="boutique-title">{{$boutique->categoriesName}}</p>
                                <div class="star-rating__wrapper">
                                    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                        <input class="star-rating__input" type="radio" name="rating" value="5">
                                    </label>
                                    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                        <input class="star-rating__input" type="radio" name="rating" value="4" checked>
                                    </label>
                                    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                        <input class="star-rating__input" type="radio" name="rating" value="3">
                                    </label>
                                    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                        <input class="star-rating__input" type="radio" name="rating" value="2">
                                    </label>
                                    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                        <input class="star-rating__input" type="radio" name="rating" value="1">
                                    </label>
                                </div>
                                <a href="{{route('boutique', $boutique)}}">Перейти в бутик</a>
                                <p>Артикул: {{$boutique->id}}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection