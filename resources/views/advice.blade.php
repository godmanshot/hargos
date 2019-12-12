@extends('layout')

@section('content')

    <div class="advice">
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-7 pr-0">
                    <div class="flexible">
                        <a href="#">
                            <span>{{__('главная')}}</span>
                        </a>
                        <span>/</span>
                        <h4>{{__('советы')}}</h4>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-9 col-md-8 col-sm-6 col-5"></div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <h1>{{__('Популярные советы')}}</h1>
                </div> 
                <div class="col-xl-12">
                    <div class="popular__advices mt-4">
                        @if($categories->count())
                            @foreach($categories as $category)
                                <button onclick="window.location.href = '{{url('advice')}}?category_id={{$category->id}}';" class="advice-btn {{$category->id == $selected_category ? 'advice-btn__chosen' : ''}}">{{$category->getTranslatedAttribute('name')}}</ onclick="window.location.href = "http://www.w3schools.com";">
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="advices__video">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <h1>{{__('Видео')}}</h1>
                    </div>
                    <div class="col-xl-12">
                        <div class="slider advice-player">
                            @if($videos->count())
                                @foreach($videos as $video)
                                    <div>
                                        {!!$video->lazyIframe!!}
                                        <h3>{{$video->getTranslatedAttribute('title')}}</h3>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container articles--container">
            <div class="row">
                <div class="col-xl-12">
                    <h1>{{__('Статьи')}}</h1>
                </div>
                @if($posts->count())
                    @foreach($posts as $post)
                    <div class="col-xl-12 article--wrapper">
                        <div class="row">
                            <div class="col-xl-5 col-md-6">
                                <div class="img__wrapper" img-caption="{{$post->getTranslatedAttribute('title')}}">
                                    <img src="{{Voyager::image($post->image)}}">
                                </div>
                            </div>
                            <div class="col-xl-7 col-md-6">
                                <h1>{{$post->getTranslatedAttribute('title')}}</h1>
                                <p>{{$post->getTranslatedAttribute('description')}}</p>
                                <div class="moreContent">
                                    {!!$post->getTranslatedAttribute('content')!!}
                                    <div class="content__fadeout"></div>
                                </div>
                                <a class="article__more">{{__('Читать далее')}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
        
    </div>
    @endsection