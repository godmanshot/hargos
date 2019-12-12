@extends('layout')

@section('content')
<div class="result">
    <div class="container boutique__container mt-5">
        <div class="row mt-5">
            <div class="col-xl-12 mb-3">
                <h1 class="category__header">Поиск по запросу: {{$search_query}}</h1>
            </div>
        </div>
        <div class="row">
            @if($models->count())
            @foreach($models as $model)
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="boutique-block">
                        <img src="{{Voyager::image($model->firstImage)}}">
                        <h3 class="boutique-header">{{$model->getTranslatedAttribute('name')}}</h3>
                        <p class="boutique-title">{{$model->categoriesName}}</p>
                        <div class="star-rating__wrapper">
                            {!!$model->averageRatingHtml!!}
                        </div>
                        <a href="{{route('boutique', $model)}}">{{__('Перейти в бутик')}}</a>
                        <p>Артикул: {{$model->id}}</p>
                    </div>
                </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
