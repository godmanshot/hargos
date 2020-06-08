@extends('layout')

@section('content')
<div class="cardd">
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-10 col-12 pr-0">
                <div class="flexible justify-content-start">
                    <a href="/">
                        <span>@lang('interface.main')</span>
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
                        <a href="{{Voyager::image($image)}}">
                            <figure onmousemove="zoom(event)" class="zoomMe" style="background-image: url()">
                                <img class="asyncImage async-figure" data-src="{{Voyager::image($image)}}" data-lazy="#">
                            </figure>
                        </a>
                        </div>
                    @endforeach
                </div>
                <div class="slider slider-nav">
                    @foreach($images as $image)
                        <div>
                            <img class="asyncImage" data-src="{{ Voyager::image($image) }}" data-lazy="#">
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
                            <p>@lang('interface.share')</p>
                            <ul class="share">
                                <li>
                                    <script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                                    <script src="https://yastatic.net/share2/share.js"></script>
                                    <div class="ya-share2" data-services="whatsapp,vkontakte,telegram,facebook,moimir,odnoklassniki,twitter,linkedin"></div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xl-4 col-sm-5 col-12">
                            <div class="boutique__rating">
                                <p>@lang('interface.rating')</p>
                                <div class="star-rating__wrapper">
                                    {!!$boutique->averageRatingHtml!!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8"></div>
                        <div class="col-12">
                            @auth
                                @if(Auth::user() && Auth::user()->favoriteBoutiques &&
                                    !Auth::user()->favoriteBoutiques->pluck('id')->contains($boutique->id))
                                <form action="{{url('/favorite/'.$boutique->id)}}" method="POST">
                                    @method('POST')
                                    @csrf

                                    <button type="submit" class="btn btn-link pl-0">@lang('interface.addToFavorites')</button>
                                </form>
                                @else
                                <form action="{{url('/favorite/'.$boutique->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <button type="submit" class="btn btn-link pl-0">@lang('interface.deleteFromFavorite')</button>
                                </form>
                                @endif
                            @endauth
                            <b>@lang('interface.thisPageVisitedBy') {{$current_page_visitors_count}} @lang('interface.people')</b>
                        </div>
                    </div>
                    <div class="boutique__info">
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-sm-4 col-6">
                                <p>@lang('interface.shoppingMall')</p>
                            </div>
                            <div class="col-xl-9 col-md-6 col-sm-8 col-6">
                                <h2>{{$boutique->tradingHousesName}}</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-sm-4 col-6">
                                <p>@lang('interface.floor')</p>
                            </div>
                            <div class="col-xl-9 col-md-6 col-sm-8 col-6">
                                <h2>{{$boutique->floor}}</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-sm-4 col-6">
                                <p>@lang('interface.boutiqueNumber')</p>
                            </div>
                            <div class="col-xl-9 col-md-6 col-sm-8 col-6">
                                <h2>{{$boutique->boutique_number}}</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-sm-4 col-6">
                                <p>@lang('interface.category')</p>
                            </div>
                            <div class="col-xl-9 col-md-6 col-sm-8 col-6">
                                <h2>{{$boutique->categoriesName}}</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-sm-4 col-6">
                                <p>@lang('interface.boutique')</p>
                            </div>
                            <div class="col-xl-9 col-md-6 col-sm-8 col-6">
                                <h2>{{$boutique->getTranslatedAttribute('name')}}</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-sm-4 col-6">
                                <p>@lang('interface.sellerName')</p>
                            </div>
                            <div class="col-xl-9 col-md-6 col-sm-8 col-6">
                                <h2>{{$boutique->getTranslatedAttribute('seller_name')}}</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-sm-4 col-6">
                                <p>@lang('interface.ownerName')</p>
                            </div>
                            <div class="col-xl-9 col-md-6 col-sm-8 col-6">
                                <h2>{{$boutique->getTranslatedAttribute('owner_name')}}</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-sm-4 col-6">
                                <p>@lang('interface.language')</p>
                            </div>
                            <div class="col-xl-9 col-md-6 col-sm-8 col-6">
                                <h2>{{$boutique->getTranslatedAttribute('languages')}}</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-sm-4 col-6">
                                <p>@lang('interface.phone')</p>
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
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-sm-4 col-6">
                                <p>{{__('QR код')}}</p>
                            </div>
                            <div class="col-xl-9 col-md-6 col-sm-8 col-6">
                                <a class="QR" href="{{!empty($boutique->qr_code) ? Voyager::image($boutique->qr_code) : ''}}">
                                    <img style="width: 100%;max-width: 150px;margin-top: 15px;" src="{{!empty($boutique->qr_code) ? Voyager::image($boutique->qr_code) : ''}}"/>
                                </a>
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
                    <h1>@lang('interface.shopDescription')</h1>
                </div>
                <div class="col-xl-12">
                    <div class="moreContent">
                        <p>{!!$boutique->getTranslatedAttribute('full_description')!!}</p>
                        <div class="content__fadeout"></div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <a class="boutique__more">@lang('interface.detailed')</a>
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
                            <h1>@lang('interface.pricesFromAToZ')</h1>
                        </div>
                        <div class="col-xl-4 col-6">
                            <select class="prices js-states form-control select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="price_cny" >&#165; CNY</option>
                                <option value="price_usd">&#36; USD</option>
                                <option value="price_kzt">&#8376; KZT</option>
                                <option value="price_rub">&#8381; RUB</option>
                            </select>
                        </div>
                        <div class="col-xl-4"></div>
                    </div>
                    <div class="priceList mb-3">
                        <ul>
                            @if($boutique->products->count())
                                @foreach($boutique->products->sortBy('name') as $product)
                                    <li>
                                        <div class="col-xl-7">
                                            <p>{{$product->getTranslatedAttribute('name')}}</p>
                                        </div>
                                        <div class="col-xl-5">
                                            <h2 class="one_price price_cny" style="display: block;">@lang('interface.from') {{$product->priceFromCny}} @lang('interface.to') {{$product->priceToCny}} &#165;</h2>
                                            <h2 class="one_price price_usd" style="display: none;">@lang('interface.from'){{$product->priceFromDollar}} @lang('interface.to') {{$product->priceToDollar}} &#36;</h2>
                                            <h2 class="one_price price_kzt" style="display: none;">@lang('interface.from'){{$product->priceFromTenge}} @lang('interface.to') {{$product->priceToTenge}} &#8376;</h2>
                                            <h2 class="one_price price_rub" style="display: none;">@lang('interface.from'){{$product->priceFromRub}} @lang('interface.to') {{$product->priceToRub}} &#8381;</h2>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-6">
                            <h1>@lang('interface.wholeRange')</h1>
                        </div>
                    </div>
                    <div class="priceList mb-3">
                        <ul>
                            @if($boutique->allProducts->count())
                                @foreach($boutique->allProducts->sortBy('name') as $product)
                                    <li>
                                        <p>{{$product->getTranslatedAttribute('name')}}</p>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    @push('scripts')
                    <script>
                        $('select.prices').change(function() {
                            $('.one_price').css({'display': 'none'});
                            $('.'+$(this).val()).css({'display': 'block'});
                        });
                    </script>
                    @endpush

                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                    <div class="mallMap">
                        <div class="row">
                            <div class="col-xl-12">
                                <h1>@lang('interface.tcMap')</h1>
                            </div>
                        </div>
                        <a class="zoomMap" href="{{Voyager::image($boutique->trading_house_image)}}">
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
                            <h1>@lang('interface.reviewAboutBoutique')</h1>
                            <div class="avg--rate">
                                <p>@lang('interface.avgRating') <span>{{$boutique->averageRating->rating ?? 0}}</span></p>
                                <div class="star-rating__wrapper">
                                    {!!$boutique->averageRatingHtml!!}
                                </div>
                                <button type="button" class="leave__feedback" id="create-review" data-boutique_id="{{$boutique->id}}">@lang('interface.liveAReview')</button>
                            </div>
                        </div>
                    </div>
                    @if($boutique->reviews->count())
                        @foreach($boutique->reviews as $comment)
                            <div class="col-xl-12 comment--wrapper">
                                <div class="row justify-content-between">
                                    <div class="col-xl-2 mobile__flex">
                                        <h2>@lang('interface.mark')</h2>
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
                                                <h2>@lang('interface.reviewIsHelpful')</h2>
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

    @if(Auth::user() && Auth::user()->favoriteBoutiques->count())
    <div class="container-fluid favorite-boutiques">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 mt-5">
                    <h1 class="favorite-header">@lang('interface.featuredBoutiques')</h1>
                </div>
            </div>
            <div class="row favorite__slick">
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
            </div>
        </div>
    </div>
    @endif

    @if($boutique->related->count())
    <div class="container-fluid similar-boutiques">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 mt-5">
                    <h1 class="favorite-header">@lang('interface.similarBoutiques')</h1>
                </div>
            </div>
            <div class="row similar__slick">
                    @foreach($boutique->related as $boutique)
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-10">
                            <div class="boutique-block">
                                <a href="{{route('boutique', $boutique)}}">
                                    <img src="{{Voyager::image($boutique->firstImage)}}">
                                </a>
                                <h3 class="boutique-header">{{$boutique->getTranslatedAttribute('name')}}</h3>
                                <p class="boutique-title">{{$boutique->categoriesName}}</p>
                                <div class="star-rating__wrapper">  
                                    {!!$boutique->averageRatingHtml!!}
                                </div>
                                <a href="{{route('boutique', $boutique)}}">@lang('interface.goToTheBoutiques')</a>
                                <p>Артикул: {{$boutique->id}}</p>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
    @endif
    @if($boutique->recommended->count())
    <div class="container-fluid recommended-boutiques">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 mt-5">
                    <h1 class="favorite-header">@lang('interface.recommendedBoutiques')</h1>
                </div>
            </div>
            <div class="row recommended__slick">
                    @foreach($boutique->recommended as $boutique)
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-10">
                            <div class="boutique-block">
                                <a href="{{route('boutique', $boutique)}}">
                                    <img src="{{Voyager::image($boutique->firstImage)}}">
                                </a>
                                <h3 class="boutique-header">{{$boutique->getTranslatedAttribute('name')}}</h3>
                                <p class="boutique-title">{{$boutique->categoriesName}}</p>
                                <div class="star-rating__wrapper">
                                    {!!$boutique->averageRatingHtml!!}
                                </div>
                                <a href="{{route('boutique', $boutique)}}">@lang('interface.goToTheBoutiques')</a>
                                <p>@lang('interface.sku'): {{$boutique->id}}</p>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
    @endif
</div>
<script>
    function zoom(e){
        var zoomer = e.currentTarget;
        zoomer.style.backgroundSize = '300%';
        e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
        e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
        x = offsetX/zoomer.offsetWidth*100
        y = offsetY/zoomer.offsetHeight*100
        zoomer.style.backgroundPosition = x + '% ' + y + '%';
        zoomer.addEventListener('mouseleave', function() {
            zoomer.style.backgroundSize = 'cover';
        })
      }
</script>
@endsection
