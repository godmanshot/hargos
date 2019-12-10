@extends('layout')

@section('content')
<div class="main">
    <div class="background-slider">
        @if($hello_slider && $hello_slider->slides->count())
        <div class="glide_header">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">

                        @foreach($hello_slider->slides as $slide)
                        <li class="glide__slide" style="background-image: url('{{Voyager::image($slide->image)}}') !important;">
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
                                        @if(!empty($slide->link))
                                        <a href="{{$slide->link}}" class="detailed">{{__('подробнее')}}</a>
                                        @endif
                                    </div>
                                    <div class="col-xl-9"></div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                </ul>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="glide__bullets" data-glide-el="controls[nav]">
                            @foreach($hello_slider->slides as $slide)
                                <button class="glide__bullet" data-glide-dir="={{$loop->index}}"></button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
        <div class="relative__wrapper pt-5" id="top">
            <div class="absolute__wrapper-left">
                <div class="left-block">
                    <a class="playMarket" href="{{setting('sayt.playmarket')}}"></a>
                    <a class="appStore" href="{{setting('sayt.Appstore')}}"></a>
                </div>
            </div>
            <div class="absolute__wrapper-right">
                <div class="right-block">
                    <a class="facebook" href="{{setting('sayt.facebook')}}"></a>
                    <a class="twitter" href="{{setting('sayt.twitter')}}"></a>
                    <a class="vk" href="{{setting('sayt.vk')}}"></a>
                    <a class="youtube" href="{{setting('sayt.youtube')}}"></a>
                    <a class="instagram" href="{{setting('sayt.instagram')}}"></a>
                    <a href="#top" class="anchor"></a>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="flexibleServices">
                            <embed src="{{asset('images/visa.svg')}}" alt="">
                            <div>
                                <h4>{!!Block::_('Безвизовый доступ')!!}</h4>
                                <p>{!!Block::_('23rf3fds')!!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="flexibleServices">
                            <embed src="{{asset('images/terminal.svg')}}" alt="">
                            <div>
                                <h4>{!!Block::_('vdf4rf3')!!}</h4>
                                <p>{!!Block::_('fasd43')!!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="flexibleServices">
                            <embed src="{{asset('images/car.svg')}}" alt="">
                            <div>
                                <h4>{!!Block::_('vdsfvre')!!}</h4>
                                <p>{!!Block::_('brec23')!!}</p>
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
                                <div>
                                    <div class="geek-recommendation__block">
                                        <div>
                                            <img src="{{Voyager::image($item->image)}}">
                                            <div class="geek-recommendation__inner-block">
                                                <h3>{{$item->getTranslatedAttribute('name')}}</h3>
                                                <p>{{$item->boutiqueCategories}}</p>
                                                <a href="{{route('boutique', $item->boutique->id)}}">Перейти в бутик</a>
                                            </div>
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
                        <h2>{{__('Специально для вас')}}</h2>
                    </div>
                    <div class="col-xl-6 col-sm-6">
                        <div class="hidenAdWrapper">
                            <a href="#" class="hidenAd">cкрытая фраза - реклама</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 pl-0 pr-0 mt-4">
                    <div class="special-slider">
                        @if($special_slider && $special_slider->slides->count())
                        <div class="glide_header">
                            <div class="glide__track" data-glide-el="track">
                                <ul class="glide__slides">
                                    @foreach($special_slider->slides as $slide)
                                    <li class="glide__slide" style="background-image: url('{{Voyager::image($slide->image)}}') !important;">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-xl-7">
                                                    <h1>{{$slide->getTranslatedAttribute('title')}}</h1>
                                                </div>
                                                <div class="col-xl-5"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-7">
                                                    <!-- <h2>до <span>55 %</span></h2> -->
                                                </div>
                                                <div class="col-xl-5"></div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
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
                                            @foreach($hello_slider->slides as $slide)
                                                <button class="glide__bullet" data-glide-dir="={{$loop->index}}"></button>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="separator mt-5 mb-5"></div>
            <div class="container category-discounts">
                <div class="row">
                    <div class="col-xl-9 col-sm-6">
                        <h2>{{__('Скидки по категориям')}}</h2>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="category-discounts__control-panel">
                            <a href="#" class="showAll">{{__('Смотреть все')}}</a>
                            <ul>
                                <li class="prev"></li>
                                <li class="next"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row mt-4 mobile__column-reverse">
                    <div class="col-xl-3">
                    @if($category_stocks->count())
                        @php
                            $first_stock = $category_stocks->first();
                            $images = !empty($first_stock->images) ? json_decode($first_stock->images, true) : [];
                        @endphp
                        <a href="{{route('boutique', $first_stock->boutique->id)}}">
                            <div class="category-discounts__left-block">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <h4>{{$first_stock->getTranslatedAttribute('name')}}</h4>
                                        </div>
                                        <div class="col-xl-6"></div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-xl-8 mobile__text-center">
                                        @if(!empty($images[0]))
                                            <img src="{{Voyager::image($images[0])}}">
                                        @endif
                                        </div>
                                        <div class="col-xl-4 pl-0 flexible">
                                            @if(!empty($images[1]))
                                                <img src="{{Voyager::image($images[1])}}">
                                            @endif
                                            @if(!empty($images[2]))
                                                <img src="{{Voyager::image($images[2])}}">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endif
                    </div>
                    <div class="col-xl-9 pr-0 flexible">
                        <div class="slider category-discounts__slick-01">
                            @foreach($category_stocks_first_line as $item)
                                @php
                                    $images = !empty($item->images) ? json_decode($item->images, true) : [];
                                @endphp
                                <a href="{{route('boutique', $item->boutique->id)}}">
                                <div>
                                <div class="category-discounts__block">
                                    <div>
                                        <h5>{{$item->getTranslatedAttribute('name')}}</h5>
                                        <div class="flexible">
                                            @if(!empty($images[0]))
                                                <img src="{{Voyager::image($images[0])}}" style="width: 33%;">
                                            @endif
                                            @if(!empty($images[1]))
                                                <img src="{{Voyager::image($images[1])}}" style="width: 33%;">
                                            @endif
                                            @if(!empty($images[2]))
                                                <img src="{{Voyager::image($images[2])}}" style="width: 33%;">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </a>
                            @endforeach
                        </div>
                        <div class="slider category-discounts__slick-02">
                            @foreach($category_stocks_second_line as $item)
                                @php
                                    $images = !empty($item->images) ? json_decode($item->images, true) : [];
                                @endphp
                                <a href="{{route('boutique', $item->boutique->id)}}">
                                <div>
                                <div class="category-discounts__block">
                                    <div>
                                        <h5>{{$item->getTranslatedAttribute('name')}}</h5>
                                        <div class="flexible">
                                            @if(!empty($images[0]))
                                                <img src="{{Voyager::image($images[0])}}" style="width: 33%;">
                                            @endif
                                            @if(!empty($images[1]))
                                                <img src="{{Voyager::image($images[1])}}" style="width: 33%;">
                                            @endif
                                            @if(!empty($images[2]))
                                                <img src="{{Voyager::image($images[2])}}" style="width: 33%;">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator mt-5 mb-5"></div>
            <div class="container top-products">
                <div class="row">
                    <div class="col-xl-9 col-sm-6">
                        <h2>{{__('Топ товары')}}</h2>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="top-products__control-panel">
                            <a href="#" class="showAll">{{__('Смотреть все')}}</a>
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
                            @foreach($top_products_first_line as $item)
                            <a href="{{route('boutique', $item->boutique->id)}}">
                                <div>
                                    <div class="top-products__block">
                                        <div>
                                            <div class="flexible">
                                                <img src="{{Voyager::image($item->image)}}">
                                                <p>{{$item->getTranslatedAttribute('name')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                        <div class="slider top-products__slick-02">
                            @foreach($top_products_second_line as $item)
                            <a href="{{route('boutique', $item->boutique->id)}}">
                                <div>
                                    <div class="top-products__block">
                                        <div>
                                            <div class="flexible">
                                                <img src="{{Voyager::image($item->image)}}">
                                                <p>{{$item->getTranslatedAttribute('name')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator mt-3 mb-5"></div>
            <div class="container popular-products">
                <div class="row">
                    <div class="col-xl-9 col-sm-6">
                        <h2>{{__('Популярные товары')}}</h2>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="popular-products__control-panel">
                            <a href="#" class="showAll">{{__('Смотреть все')}}</a>
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
                            @foreach($popular_products as $item)
                            <div>
                                <div class="popular-products__block">
                                    <div>
                                        <div class="flexible">
                                            <img src="images/popular-products__img-01.png">
                                            <div class="popular-products__inner-block">
                                                <h3>{{$item->getTranslatedAttribute('name')}}</h3>
                                                <p>
                                                    {{$item->getTranslatedAttribute('description')}}
                                                </p>
                                                <a href="{{route('boutique', $item->boutique->id)}}">{{__('Подробнее')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator mt-5 mb-5"></div>
            <div class="container about-us">
                <div class="row">
                    <div class="col-xl-9 col-sm-6">
                        <h2>{{__('Интервью о нас')}}</h2>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="about-us__control-panel">
                            <a href="#" class="showAll">{{__('Смотреть все')}}</a>
                            <ul>
                                <li class="prev"></li>
                                <li class="next"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 mt-4 pr-0 pl-0">
                    <div class="slider about-us__slick">
                    @if($interviews->count())
                        @foreach($interviews as $interview)
                            <div>
                            <div class="about-us__block">
                                <div>
                                    {!!$interview->iframe!!}
                                </div>
                            </div>
                            </div>
                        @endforeach
                    @endif
                    </div>
                </div>
            </div>
            <div class="separator mt-5 mb-5"></div>
            <div class="container freebie">
                <div class="row">
                    <div class="col-xl-9 col-sm-6">
                        <h2>{{__('Халява')}}</h2>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="freebie__control-panel">
                            <a href="#" class="showAll">{{__('Смотреть все')}}</a>
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
                            @foreach($freebies as $item)
                                <div>
                                    <div class="freebie__block">
                                        <div>
                                            <div class="flexible">
                                                <img src="images/popular-products__img-01.png">
                                                <div class="freebie__inner-block">
                                                    <h3>{{$item->getTranslatedAttribute('name')}}</h3>
                                                    <p>
                                                        {{$item->getTranslatedAttribute('description')}}
                                                    </p>
                                                    <a href="{{route('boutique', $item->boutique->id)}}">{{__('Подробнее')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection