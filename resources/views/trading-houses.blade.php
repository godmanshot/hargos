@extends('layout')

@section('content')
<div class="td">
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-7 pr-0">
                <div class="flexible">
                    <a href="/">
                        <span>@lang('interface.main')</span>
                    </a>
                    <span>/</span>
                    <h4>@lang('interface.shoppingMalls')</h4>
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
                <h1 class="category__header">@lang('interface.selectACategory')</h1>
            </div>
            <div class="col-xl-12">
                <div class="row">
                    @foreach($categories as $category)
                    <div class="col-lg-2 col-md-3 col-sm-6 col-4">
                        <button class="category-btn {{($selected_category->id ?? false) == $category->id ? 'category-btn__chosen' : ''}}" data-aos="fade-up" onclick="window.location.href = '{{route('trading-houses', ['trading_house' => $selected_trading_house->id ?? null, 'category' => $category->id])}}';">{{$category->getTranslatedAttribute('name')}}</button>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="filters-block mt-5" id="filters-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-8 col-sm-12">
                    <div class="row">
                        <div class="col-xl-3 col-sm-3">
                            <h4 class="sort-by">@lang('interface.sortBy')</h4>
                        </div>
                        <div class="col-xl-9 col-sm-9">
                            <ul class="filter__wrapper">
                                <li><a href="{{request()->fullUrlWithQuery(['sort' => 'popular'])}}#filters-block" class="filter-btn" id="filter-by-popular">@lang('interface.popular')</a></li>
                                <li><a href="{{request()->fullUrlWithQuery(['sort' => 'top'])}}#filters-block" class="filter-btn top-products" id="filter-by-top">@lang('interface.topProducts')</a></li>
                                <li><a href="{{request()->fullUrlWithQuery(['sort' => 'stock'])}}#filters-block" class="filter-btn discounts" id="filter-by-discount">@lang('interface.sales')</a></li>
                                <li><a href="{{request()->fullUrlWithQuery(['sort' => 'new'])}}#filters-block" class="filter-btn novelties" id="filter-by-new">@lang('interface.new')</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4 col-sm-12">
                    <div class="row">
                        <div class="col-xl-7 col-lg-10 col-sm-9">
                            <form action="#filters-block" class="search-form">
                                <input class="search-field" type="search" name="search" placeholder="@lang('interface.search')">
                                <input class="search-btn" type="submit" value="">
                            </form>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-sm-3">
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
                            <a href="{{url('/trading-houses')}}" class="clear-filter" id="filter-clear">@lang('interface.clearFilter')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container boutique__container mt-5">
        <div class="row" id="boutiquesInTradingHouses">
            @foreach($boutiques as $boutique)
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-10">
                <div class="boutique-block">
                    <a href="{{route('boutique', $boutique->id)}}">
                        <img src="{{Voyager::image($boutique->firstImage)}}">
                    </a>
                    <div class="tab-title">
                        <h3 class="boutique-header">{{$boutique->getTranslatedAttribute('name')}}</h3>
                        <p class="boutique-title">{{$boutique->categoriesName}}</p>
                    </div>
                    <div class="star-rating__wrapper">
                        {!!$boutique->averageRatingHtml!!}
                    </div>
                    <a href="{{route('boutique', $boutique->id)}}">@lang('interface.goToTheBoutiques')</a>
                    <p>@lang('interface.sku'): {{$boutique->id}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="container" id="content">
    </div>
    <div class="container-fluid favorite-boutiques">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 mt-5">
                    <h1 class="favorite-header">@lang('interface.featuredBoutiques')</h1>
                </div>
            </div>
            <div class="row favorite__slick">
                @if(Auth::user() && Auth::user()->favoriteBoutiques->count())
                @foreach((Auth::user()->favoriteBoutiques ?? []) as $fav_boutique)
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-10">
                    <div class="boutique-block">
                        <a href="{{route('boutique', $fav_boutique->id)}}">
                            <img src="{{Voyager::image($fav_boutique->firstImage)}}">
                        </a>
                        <h3 class="boutique-header">{{$fav_boutique->getTranslatedAttribute('name')}}</h3>
                        <p class="boutique-title">{{$fav_boutique->categoriesName}}</p>
                        <div class="star-rating__wrapper">
                            {!!$fav_boutique->averageRatingHtml!!}
                        </div>
                        <a href="{{route('boutique', $fav_boutique->id)}}">@lang('interface.goToTheBoutiques')</a>
                        <p>@lang('interface.sku'): {{$fav_boutique->id}}</p>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
