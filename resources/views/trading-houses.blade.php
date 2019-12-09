@extends('layout')

@push('scripts')
    @php
        $params = [];
        if($selected_trading_house) {
            $params['trading_house'] = $selected_trading_house->id;
        }

        if($selected_category) {
            $params['categories'] = $selected_category->id;
        }
    @endphp
    <script>
        window.filter = @json($params);
        window.filterInitial = @json($params);
        boutiquesInTradingHouses();
    </script>
@endpush

@section('content')
<div class="td">
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-7 pr-0">
                <div class="flexible">
                    <a href="#">
                        <span>{{__('главная')}}</span>
                    </a>
                    <span>/</span>
                    <h4>{{__('торговые дома')}}</h4>
                </div>
            </div>
            <div class="col-xl-10 col-lg-9 col-md-8 col-sm-6 col-5"></div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="slider td-slider">
                    @foreach($trading_houses as $house)
                        <a href="{{route('trading-houses', ['trading_house' => $house->id])}}">
                            <div class="td-slider__block">
                                <div class="td-slider__img-wrapper">
                                    <img src="{{Voyager::image($house->logo)}}">
                                </div>
                                <div class="separator"></div>
                                <h2>{{$house->getTranslatedAttribute('name')}}</h2>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xl-12 mb-3">
                <h1 class="category__header">{{__('Выберите категорию')}}</h1>
            </div>
            <div class="col-xl-12">
                <div class="row">
                    @foreach($categories as $category)
                        <div class="col-lg-2 col-md-3 col-sm-6">
                            <button class="category-btn {{($selected_category->id ?? false) == $category->id ? 'category-btn__chosen' : ''}}" onclick="window.location.href = '{{route('trading-houses', ['trading_house' => $selected_trading_house->id ?? null, 'category' => $category->id])}}';">{{$category->getTranslatedAttribute('name')}}</button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="filters-block mt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-sm-12">
                    <div class="row">
                        <div class="col-xl-3 col-sm-3">
                            <h4 class="sort-by">{{__('Сортировать по')}}:</h4>
                        </div>
                        <div class="col-xl-9 col-sm-9">
                            <ul class="filter__wrapper">
                                <li><button class="filter-btn" id="filter-by-popular">{{__('По популярности')}}</button></li>
                                <li><button class="filter-btn top-products" id="filter-by-top">{{__('TOP товары')}}</button></li>
                                <li><button class="filter-btn discounts" id="filter-by-discount">{{__('Скидки %')}}</button></li>
                                <li><button class="filter-btn novelties" id="filter-by-new">{{__('NEW')}}</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-sm-12">
                    <div class="row">
                        <div class="col-xl-7 col-sm-9">
                            <form action="" class="search-form">
                                <input class="search-field" type="search" placeholder="{{__('Поиск')}}">
                                <input class="search-btn" type="submit" value="">
                            </form>
                        </div>
                        <div class="col-xl-2 col-sm-3">
                            <div class="list-grid_wrapper">
                                <button class="grid-btn view-btn active">
                                    <i class="fa fa-th-large"></i>
                                </button>
                                <button class="list-btn view-btn">
                                    <i class="fa fa-bars"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-12 separator">
                            <button class="clear-filter" id="filter-clear">Очистить фильтр</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container boutique__container mt-5">
        <div class="row" id="boutiquesInTradingHouses"></div>
    </div>
    <div class="container" id="content">
    </div>
    <div class="container-fluid favorite-boutiques">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 mt-5">
                    <h1 class="favorite-header">Избранные бутики</h1>
                </div>
                    @if(Auth::user() && Auth::user()->favoriteBoutiques->count())
                        @foreach((Auth::user()->favoriteBoutiques ?? []) as $fav_boutique)
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                            <div class="boutique-block">
                                <img src="{{Voyager::image($fav_boutique->firstImage)}}">
                                <h3 class="boutique-header">{{$fav_boutique->getTranslatedAttribute('name')}}</h3>
                                <p class="boutique-title">{{$fav_boutique->categoriesName}}</p>
                                <div class="star-rating__wrapper">
                                    {!!$fav_boutique->averageRatingHtml!!}
                                </div>
                                <a href="{{route('boutique', $fav_boutique->id)}}">{{__('Перейти в бутик')}}</a>
                                <p>Артикул: {{$fav_boutique->id}}</p>
                            </div>
                        </div>
                        @endforeach
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection