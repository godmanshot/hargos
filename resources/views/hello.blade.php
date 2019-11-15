@extends('layout')

@section('content')
<div class="background-slider">
    <div class="glide_header">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
                @if($hello_slider && $hello_slider->slides->count())

                    @foreach($hello_slider->slides as $slide)
                    <li class="glide__slide">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-5">
                                    <h1>{{$slide->getTranslatedAttribute('title')}}</h1>
                                </div>
                                <div class="col-xl-7">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <p>
                                        {{$slide->getTranslatedAttribute('description')}}
                                    </p>
                                </div>
                                <div class="col-xl-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-xl-3">
                                    <a href="{{$slide->link}}" class="detailed">{{__('подробнее')}}</a>
                                </div>
                                <div class="col-xl-9"></div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="glide__bullets" data-glide-el="controls[nav]">
                        @if($hello_slider && $hello_slider->slides->count())
                            @foreach($hello_slider->slides as $slide)
                                <button class="glide__bullet" data-glide-dir="={{$loop->index}}"></button>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="relative__wrapper pt-5">
        <div class="absolute__wrapper-left">
            <div class="left-block">
                <a class="playMarket" href="#"></a>
                <a class="appStore" href="#"></a>
            </div>
        </div>
        <div class="absolute__wrapper-right">
            <div class="right-block">
                <a class="facebook" href="#"></a>
                <a class="twitter" href="#"></a>
                <a class="vk" href="#"></a>
                <a class="youtube" href="#"></a>
                <a class="instagram" href="#"></a>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="flexibleServices">
                        <embed src="{{asset('images/visa.svg')}}" alt="">
                        <div>
                            <h4>@block(Безвизовый доступ)</h4>
                            <p>@block(23rf3fds)</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="flexibleServices">
                        <embed src="{{asset('images/terminal.svg')}}" alt="">
                        <div>
                            <h4>@block(vdf4rf3)</h4>
                            <p>@block(fasd43)</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="flexibleServices">
                        <embed src="{{asset('images/car.svg')}}" alt="">
                        <div>
                            <h4>@block(vdsfvre)</h4>
                            <p>@block(brec23)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator mt-5 mb-5"></div>
        
        <div class="container geek-block">
            <div class="row">
                <div class="col-xl-9 col-sm-6">
                    <h2>{{__('Гиды рекомендуют')}}</h2>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="geek-recommendation__control-panel">
                        <a href="#" class="showAll">{{__('Смотреть все')}}</a>
                        <ul>
                            <li class="prev"></li>
                            <li class="next"></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-12 mt-4 pr-0">
                    <div class="slider geek-recommendation">
                        
                        @if($recommended && $recommended->count())
                            @foreach($recommended as $item)
                            <div class="geek-recommendation__block">
                                <div>
                                    <img src="{{Voyager::image($item->image)}}">
                                    <div class="geek-recommendation__inner-block">
                                        <h3>{{$item->boutiqueName}}</h3>
                                        <p>{{$item->boutiqueCategories}}</p>
                                        <a href="#">Перейти в бутик</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="separator mt-5 mb-5"></div>
        <div class="container special-block">
            <div class="row">
                <div class="col-xl-6 col-sm-6">
                    <h2>Специально для вас</h2>
                </div>
                <div class="col-xl-6 col-sm-6">
                    <div class="hidenAdWrapper">
                        <a href="#" class="hidenAd">cкрытая фраза - реклама</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 pl-0 pr-0 mt-4">
                <div class="special-slider">
                    <div class="glide_header">
                        <div class="glide__track" data-glide-el="track">
                            <ul class="glide__slides">
                                <li class="glide__slide">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xl-7">
                                                <h1>Встречаем осень со скидками</h1>
                                            </div>
                                            <div class="col-xl-5"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-7">
                                                <h2>до <span>55 %</span></h2>
                                            </div>
                                            <div class="col-xl-5"></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="glide__slide">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xl-7">
                                                <h1>Встречаем осень со скидками</h1>
                                            </div>
                                            <div class="col-xl-5"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-7">
                                                <h2>до <span>55 %</span></h2>
                                            </div>
                                            <div class="col-xl-5"></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="glide__slide">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xl-7">
                                                <h1>Встречаем осень со скидками</h1>
                                            </div>
                                            <div class="col-xl-5"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-7">
                                                <h2>до <span>55 %</span></h2>
                                            </div>
                                            <div class="col-xl-5"></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="glide__slide">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xl-7">
                                                <h1>Встречаем осень со скидками</h1>
                                            </div>
                                            <div class="col-xl-5"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-7">
                                                <h2>до <span>55 %</span></h2>
                                            </div>
                                            <div class="col-xl-5"></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="glide__arrows" data-glide-el="controls">
                            <button class="glide__arrow glide__arrow--left" data-glide-dir="<"></button>
                            <button class="glide__arrow glide__arrow--right" data-glide-dir=">"></button>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="glide__bullets" data-glide-el="controls[nav]">
                                        <button class="glide__bullet" data-glide-dir="=0"></button>
                                        <button class="glide__bullet" data-glide-dir="=1"></button>
                                        <button class="glide__bullet" data-glide-dir="=2"></button>
                                        <button class="glide__bullet" data-glide-dir="=3"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator mt-5 mb-5"></div>
        <div class="container category-discounts">
            <div class="row">
                <div class="col-xl-9 col-sm-6">
                    <h2>Скидки по категориям</h2>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="category-discounts__control-panel">
                        <a href="#" class="showAll">Смотреть все</a>
                        <ul>
                            <li class="prev"></li>
                            <li class="next"></li>
                        </ul>
                    </div>
                </div>
            </div>
                <div class="row mt-4 mobile__column-reverse">
                    <div class="col-xl-3">
                        <div class="category-discounts__left-block">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <h4>Женская мода</h4>
                                    </div>
                                    <div class="col-xl-6"></div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-xl-8 mobile__text-center">
                                        <img src="images/category-discount__left-block_img-01.png">
                                    </div>
                                    <div class="col-xl-4 pl-0 flexible">
                                        <img src="images/category-discount__left-block_img-02.png">
                                        <img src="images/category-discount__left-block_img-03.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 pr-0 flexible">
                        <div class="slider category-discounts__slick-01">
                            <div>
                            <div class="category-discounts__block">
                                <div>
                                    <h5>Детям</h5>
                                    <div class="flexible">
                                        <img src="images/category-discount__left-block_img-02.png">
                                        <img src="images/category-discount__left-block_img-03.png">
                                        <img src="images/category-discount__left-block_img-04.png">
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div>
                            <div class="category-discounts__block">
                                <div>
                                    <h5>Красота</h5>
                                    <div class="flexible">
                                        <img src="images/category-discount__left-block_img-02.png">
                                        <img src="images/category-discount__left-block_img-03.png">
                                        <img src="images/category-discount__left-block_img-04.png">
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div>
                            <div class="category-discounts__block">
                                <div>
                                    <h5>Автотовары</h5>
                                    <div class="flexible">
                                        <img src="images/category-discount__left-block_img-02.png">
                                        <img src="images/category-discount__left-block_img-03.png">
                                        <img src="images/category-discount__left-block_img-04.png">
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div>
                            <div class="category-discounts__block">
                                <div>
                                    <h5>Детям</h5>
                                    <div class="flexible">
                                        <img src="images/category-discount__left-block_img-02.png">
                                        <img src="images/category-discount__left-block_img-03.png">
                                        <img src="images/category-discount__left-block_img-04.png">
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="slider category-discounts__slick-02">
                            <div>
                            <div class="category-discounts__block">
                                <div>
                                    <h5>Детям</h5>
                                    <div class="flexible">
                                        <img src="images/category-discount__left-block_img-02.png">
                                        <img src="images/category-discount__left-block_img-03.png">
                                        <img src="images/category-discount__left-block_img-04.png">
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div>
                            <div class="category-discounts__block">
                                <div>
                                    <h5>Красота</h5>
                                    <div class="flexible">
                                        <img src="images/category-discount__left-block_img-02.png">
                                        <img src="images/category-discount__left-block_img-03.png">
                                        <img src="images/category-discount__left-block_img-04.png">
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div>
                            <div class="category-discounts__block">
                                <div>
                                    <h5>Автотовары</h5>
                                    <div class="flexible">
                                        <img src="images/category-discount__left-block_img-02.png">
                                        <img src="images/category-discount__left-block_img-03.png">
                                        <img src="images/category-discount__left-block_img-04.png">
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div>
                            <div class="category-discounts__block">
                                <div>
                                    <h5>Детям</h5>
                                    <div class="flexible">
                                        <img src="images/category-discount__left-block_img-02.png">
                                        <img src="images/category-discount__left-block_img-03.png">
                                        <img src="images/category-discount__left-block_img-04.png">
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator mt-5 mb-5"></div>
            <div class="container top-products">
                <div class="row">
                    <div class="col-xl-9 col-sm-6">
                        <h2>Топ товары</h2>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="top-products__control-panel">
                            <a href="#" class="showAll">Смотреть все</a>
                            <ul>
                                <li class="prev"></li>
                                <li class="next"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-xl-12 flexible">
                        <div class="slider top-products__slick-01">
                            <div>
                                <div class="top-products__block">
                                    <div>
                                        <div class="flexible">
                                            <img src="images/top-products__img-01.png">
                                            <p>Аккумуляторная  дисковая пила</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="top-products__block">
                                    <div>
                                        <div class="flexible">
                                            <img src="images/top-products__img-01.png">
                                            <p>Аккумуляторная  дисковая пила</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="top-products__block">
                                    <div>
                                        <div class="flexible">
                                            <img src="images/top-products__img-01.png">
                                            <p>Аккумуляторная  дисковая пила</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="top-products__block">
                                    <div>
                                        <div class="flexible">
                                            <img src="images/top-products__img-01.png">
                                            <p>Аккумуляторная  дисковая пила</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="top-products__block">
                                    <div>
                                        <div class="flexible">
                                            <img src="images/top-products__img-01.png">
                                            <p>Аккумуляторная  дисковая пила</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="top-products__block">
                                    <div>
                                        <div class="flexible">
                                            <img src="images/top-products__img-01.png">
                                            <p>Аккумуляторная  дисковая пила</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="top-products__block">
                                    <div>
                                        <div class="flexible">
                                            <img src="images/top-products__img-01.png">
                                            <p>Аккумуляторная  дисковая пила</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider top-products__slick-02">
                            <div>
                                <div class="top-products__block">
                                    <div>
                                        <div class="flexible">
                                            <img src="images/top-products__img-01.png">
                                            <p>Аккумуляторная  дисковая пила</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="top-products__block">
                                    <div>
                                        <div class="flexible">
                                            <img src="images/top-products__img-01.png">
                                            <p>Аккумуляторная  дисковая пила</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="top-products__block">
                                    <div>
                                        <div class="flexible">
                                            <img src="images/top-products__img-01.png">
                                            <p>Аккумуляторная  дисковая пила</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="top-products__block">
                                    <div>
                                        <div class="flexible">
                                            <img src="images/top-products__img-01.png">
                                            <p>Аккумуляторная  дисковая пила</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="top-products__block">
                                    <div>
                                        <div class="flexible">
                                            <img src="images/top-products__img-01.png">
                                            <p>Аккумуляторная  дисковая пила</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="top-products__block">
                                    <div>
                                        <div class="flexible">
                                            <img src="images/top-products__img-01.png">
                                            <p>Аккумуляторная  дисковая пила</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="top-products__block">
                                    <div>
                                        <div class="flexible">
                                            <img src="images/top-products__img-01.png">
                                            <p>Аккумуляторная  дисковая пила</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator mt-3 mb-5"></div>
            <div class="container popular-products">
                <div class="row">
                    <div class="col-xl-9 col-sm-6">
                        <h2>Популярные товары</h2>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="popular-products__control-panel">
                            <a href="#" class="showAll">Смотреть все</a>
                            <ul>
                                <li class="prev"></li>
                                <li class="next"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-xl-12 pr-0">
                        <div class="slider popular-products__slick">
                            <div>
                                <div class="popular-products__block">
                                    <div>
                                        <div class="flexible">
                                            <img src="images/popular-products__img-01.png">
                                            <div class="popular-products__inner-block">
                                                <h3>Аккумуляторная дисковая пила GRAPHITE Energy+</h3>
                                                <p>
                                                    Дисковая пилаGraphite (Графит) 58G008, работающая с аккумулятором
                                                </p>
                                                <a href="#">Подробнее</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="popular-products__block">
                                    <div>
                                        <div class="flexible">
                                            <img src="images/popular-products__img-01.png">
                                            <div class="popular-products__inner-block">
                                                <h3>Аккумуляторная дисковая пила GRAPHITE Energy+</h3>
                                                <p>
                                                    Дисковая пилаGraphite (Графит) 58G008, работающая с аккумулятором
                                                </p>
                                                <a href="#">Подробнее</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="popular-products__block">
                                    <div>
                                        <div class="flexible">
                                            <img src="images/popular-products__img-01.png">
                                            <div class="popular-products__inner-block">
                                                <h3>Аккумуляторная дисковая пила GRAPHITE Energy+</h3>
                                                <p>
                                                    Дисковая пилаGraphite (Графит) 58G008, работающая с аккумулятором
                                                </p>
                                                <a href="#">Подробнее</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="popular-products__block">
                                    <div>
                                        <div class="flexible">
                                            <img src="images/popular-products__img-01.png">
                                            <div class="popular-products__inner-block">
                                                <h3>Аккумуляторная дисковая пила GRAPHITE Energy+</h3>
                                                <p>
                                                    Дисковая пилаGraphite (Графит) 58G008, работающая с аккумулятором
                                                </p>
                                                <a href="#">Подробнее</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="popular-products__block">
                                    <div>
                                        <div class="flexible">
                                            <img src="images/popular-products__img-01.png">
                                            <div class="popular-products__inner-block">
                                                <h3>Аккумуляторная дисковая пила GRAPHITE Energy+</h3>
                                                <p>
                                                    Дисковая пилаGraphite (Графит) 58G008, работающая с аккумулятором
                                                </p>
                                                <a href="#">Подробнее</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator mt-5 mb-5"></div>
            <div class="container about-us">
                <div class="row">
                    <div class="col-xl-9 col-sm-6">
                        <h2>Интервью о нас</h2>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="about-us__control-panel">
                            <a href="#" class="showAll">Смотреть все</a>
                            <ul>
                                <li class="prev"></li>
                                <li class="next"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 mt-4 pr-0 pl-0">
                    
                    <div class="slider about-us__slick">
                        <div>
                        <div class="about-us__block">
                            <div>
                                <img src="images/about-us__img.png">
                            </div>
                        </div>
                        </div>
                        <div>
                        <div class="about-us__block">
                            <div>
                                <img src="images/about-us__img.png">
                            </div>
                        </div>
                        </div>
                        <div>
                        <div class="about-us__block">
                            <div>
                                <img src="images/about-us__img.png">
                            </div>
                        </div>
                        </div>
                        <div>
                        <div class="about-us__block">
                            <div>
                                <img src="images/about-us__img.png">
                            </div>
                        </div>
                        </div>
                        <div>
                        <div class="about-us__block">
                            <div>
                                <img src="images/about-us__img.png">
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator mt-5 mb-5"></div>
            <div class="container freebie">
                <div class="row">
                    <div class="col-xl-9 col-sm-6">
                        <h2>Халява</h2>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="freebie__control-panel">
                            <a href="#" class="showAll">Смотреть все</a>
                            <ul>
                                <li class="prev"></li>
                                <li class="next"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-xl-12 pr-0">
                        <div class="slider freebie__slick">
                            <div>
                                <div class="freebie__block">
                                    <div>
                                        <div class="flexible">
                                            <img src="images/popular-products__img-01.png">
                                            <div class="freebie__inner-block">
                                                <h3>Аккумуляторная дисковая пила GRAPHITE Energy+</h3>
                                                <p>
                                                    Дисковая пилаGraphite (Графит) 58G008, работающая с аккумулятором
                                                </p>
                                                <a href="#">Подробнее</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="freebie__block">
                                    <div>
                                        <div class="flexible">
                                            <img src="images/popular-products__img-01.png">
                                            <div class="freebie__inner-block">
                                                <h3>Аккумуляторная дисковая пила GRAPHITE Energy+</h3>
                                                <p>
                                                    Дисковая пилаGraphite (Графит) 58G008, работающая с аккумулятором
                                                </p>
                                                <a href="#">Подробнее</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="freebie__block">
                                    <div>
                                        <div class="flexible">
                                            <img src="images/popular-products__img-01.png">
                                            <div class="freebie__inner-block">
                                                <h3>Аккумуляторная дисковая пила GRAPHITE Energy+</h3>
                                                <p>
                                                    Дисковая пилаGraphite (Графит) 58G008, работающая с аккумулятором
                                                </p>
                                                <a href="#">Подробнее</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="freebie__block">
                                    <div>
                                        <div class="flexible">
                                            <img src="images/popular-products__img-01.png">
                                            <div class="freebie__inner-block">
                                                <h3>Аккумуляторная дисковая пила GRAPHITE Energy+</h3>
                                                <p>
                                                    Дисковая пилаGraphite (Графит) 58G008, работающая с аккумулятором
                                                </p>
                                                <a href="#">Подробнее</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="freebie__block">
                                    <div>
                                        <div class="flexible">
                                            <img src="images/popular-products__img-01.png">
                                            <div class="freebie__inner-block">
                                                <h3>Аккумуляторная дисковая пила GRAPHITE Energy+</h3>
                                                <p>
                                                    Дисковая пилаGraphite (Графит) 58G008, работающая с аккумулятором
                                                </p>
                                                <a href="#">Подробнее</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection