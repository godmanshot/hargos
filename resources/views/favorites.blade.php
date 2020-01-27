@extends('layout')

@section('content')
<div class="container boutique__container mt-5">
    <h1 class="h1">Избранное</h1>
    <div class="row" id="boutiquesInTradingHouses">
        @if ($boutiques->count() > 0)
        @foreach($boutiques as $boutique)
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-10">
            <div class="boutique-block">
                <a href="{{route('boutique', $boutique->id)}}">
                    <img src="{{Voyager::image($boutique->firstImage)}}">
                </a>
                <h3 class="boutique-header">{{$boutique->getTranslatedAttribute('name')}}</h3>
                <p class="boutique-title">{{$boutique->categoriesName}}</p>
                <div class="star-rating__wrapper">
                    {!!$boutique->averageRatingHtml!!}
                </div>
                <a href="{{route('boutique', $boutique->id)}}">{{__('Перейти в бутик')}}</a>
                <p>Артикул: {{$boutique->id}}</p>
            </div>
            <form action="{{url('/favorite/'.$boutique->id)}}" method="POST">
                @method('DELETE')
                @csrf

                <button type="submit" class="btn btn-link pl-0">{{__('Удалить из избранного')}}</button>
            </form>
        </div>
        @endforeach
        @else
        <p>Нет бутиков в избранном</p>
        @endif
    </div>
</div>
@endsection