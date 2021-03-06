@extends('layout')

@section('content')
    <div class="news">
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-7 pr-0">
                    <div class="flexible">
                        <a href="#">
                            <span>@lang('interface.main')</span>
                        </a>
                        <span>/</span>
                        <h4>@lang('interface.news')</h4>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-9 col-md-8 col-sm-6 col-5"></div>
            </div>
        </div>
        <div class="news__wrapper">
            <div class="container">
                <div class="row mt-4 mb-4" style="background: unset; box-shadow: unset;">
                    <div class="col-xl-4 col-md-4">
                        <img src="{{Voyager::image($post->image)}}">
                    </div>
                    
                    <div class="col-xl-12">
                        <div class="d-flex flex-column justify-content-between h-100 pt-3 pb-3">
                            <h1 style="line-height: 2.2;">{{$post->getTranslatedAttribute('title')}}</h1>
                            <p>
                            {!!$post->getTranslatedAttribute('content')!!}
                            </p>
                            <span style="-webkit-transform: unset; font-size: 15px; line-height: 2.2;">{{$post->dateFormated}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid favorite-boutiques">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 mt-5">
                        <h1 class="favorite-header">Избранные бутики</h1>
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
