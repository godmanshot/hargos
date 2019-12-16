
@extends('layout')

@section('content')
<div class="tour">
    <div class="achivements">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-7 pr-0">
                    <div class="flexible">
                        <a href="#">
                            <span>{{__('главная')}}</span>
                        </a>
                        <span>/</span>
                        <h4>{{__('тур операторы')}}</h4>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-9 col-md-8 col-sm-6 col-5"></div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    {!!Block::_('hwFHhDDvs9B5Owlp')!!}
                </div>
                <div class="separator"></div>
                <div class="col-xl-6">
                    {!!Block::_('25hC1uu1EZ49eMVu')!!}
                </div>
                <div class="col-xl-2"></div>
            </div>
        </div>
    </div>
    <div class="filters-block">
        <div class="container">
            <div class="row">
                <div class="col-xl-3  col-sm-5">
                    <div class="filters-confirm__bc"></div>
                    <div class="filters-confirm__block">
                        <div class="filters-question__block">
                            <h2>{{__('Ваш город')}}?</h2>
                            <div>
                                <svg 
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="17px" height="23px">
                                    <image  x="0px" y="0px" width="17px" height="23px"  xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAAXCAMAAADa6lTVAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAB7FBMVEX/////yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/yFH/////yFH/yFH/////////////////////////yFH/yFH/3ZP/////////////////////////////////yFH/////////////////////////////46j/yFH/yFH/////////////yFH/yFH/////////////////yFH/yFH/////////////////////////yFH/yFH/yFH/////////////////////////////////////////+/P/yFH/8tX/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////yFH////KA3NuAAAAonRSTlMAIpTZ8t2dLUTq+/NXH+zCRyNAs/Uui8gIAaLLP9/XOSbuv29V1OQrHdaGC9DrVn/jFQRNWESOPQKgWQLMCLNBfnNjLJwkUgaSCUqhjyACvMchcXtBSzeEjGC2wElvFJhCgj38SApyHw0pi8aFa1AdZxl9triQk2RdGiZXRRI5eAMPVnlATmolblGWE5eBO40BsXoIHAsusDZ1F0dtPyhbiplmDWT2AAAAAWJLR0QAiAUdSAAAAAd0SU1FB+MLChAbM06pGwUAAAFFSURBVBjTPY6HN4JRGIdfI5siK5vM7CgjSmb47JGMEkqyoygrUbbI3rx/qft9fbzn3N9zz3Pu+zsXACAgMCiYExIK/xMWjhiBGBn1J6JjkMuLjeNjfAJrEjEpmUDAxxTWpKL/eRqmsyYDMxlmYTZrclDIMBfzWCPE/AKCwiIUsaa4BEtFZeUVyKn0CzFUoX+qJdKaWmLq6mVcRjQ0yhVNyuYWaFW08RjT3qEC6OzqBqoHevuI6JcNqOiWQRiSAAwTMwKjarp2DDQawnGcEMDkFLlpdTCtJ5yZnQODUT1vggUzKBaXlldW19Yt1Mam1abXKWFr22R37Oza98T7B+A8dB2B5ZhsuT0kTigSDilQDsLTM7r0nMTFJeichFfX9Fe85NyY4dbndtyp7h8eXb4ntefZ8AKvb0arVW6xed8/tJ9f37afX17/XfilHfEPAAAAAElFTkSuQmCC" />
                                </svg>
                                <p class="isCity">{{__('Алматы')}}</p>
                            </div>
                        </div>
                        <div class="filters-answer__block">
                            <button class="rightCity">{{__('Да')}}</button>
                            <div class="separator"></div>
                            <button class="wrongCity">{{__('Нет, другой город')}}</button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9  col-sm-7">
                    <div class="row h-100 align-items-center yourLocation">
                        <div class="col-xl-3">
                            <select class="countries js-states form-control select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option></option>
                                
                            </select>
                        </div>
                        <div class="col-xl-3">
                            <select class="cities js-states form-control select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option></option>
                            </select>
                        </div>
                        <div class="col-xl-3 separator">
                            <button class="clear-filter">{{__('Очистить фильтр')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container boutique__container mt-5">
        <div class="row" id="boutique__products">
        </div>
    </div>
    <div class="container mt-5">
        <div class="row" id="product__info">
        </div>
    </div>
    <div class="schedule mt-5">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-xl-4 col-lg-3">
                    <div class="schedule__left-block">
                        <h1>
                            Расписание выездов на однодневный  шоппинг
                        </h1>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-lg-4">
                    <div class="schedule__right-block">
                        <h1>Сентябрь 2019</h1>
                        <div class="schedule__content-wrapper">
                            <h2>Дата выезда</h2>
                            <ul>
                                <li>
                                    <p><span>6</span> сентября 2019 г., с Пн., на Вт.</p>
                                </li>
                                <li>
                                    <p><span>6</span> сентября 2019 г., с Пн., на Вт.</p>
                                </li>
                                <li>
                                    <p><span>6</span> сентября 2019 г., с Пн., на Вт.</p>
                                </li>
                                <li>
                                    <p><span>6</span> сентября 2019 г., с Пн., на Вт.</p>
                                </li>
                                <li>
                                    <p><span>6</span> сентября 2019 г., с Пн., на Вт.</p>
                                </li>
                            </ul>
                            <div class="separator"></div>
                            <p>Стоимость поездки:</p>
                            <h3>6 500<sup>тг.</sup></h3>
                            <p>Сбор группы:</p>
                            <h3>с 21:00 до 21:30</h3>
                            <p>Переодичность выездов -два раза в неделю!</p>
                            <div class="separator"></div>
                            <p>Парковка метро ст. Алатау пр. Абая, угол ул. Жарокова (иногородних забираем с ЖД-1)</p>
                            <div class="bottom__line"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-lg-4">
                    <div class="schedule__right-block">
                        <h1>Сентябрь 2019</h1>
                        <div class="schedule__content-wrapper">
                            <h2>Дата выезда</h2>
                            <ul>
                                <li>
                                    <p><span>6</span> сентября 2019 г., с Пн., на Вт.</p>
                                </li>
                                <li>
                                    <p><span>6</span> сентября 2019 г., с Пн., на Вт.</p>
                                </li>
                                <li>
                                    <p><span>6</span> сентября 2019 г., с Пн., на Вт.</p>
                                </li>
                                <li>
                                    <p><span>6</span> сентября 2019 г., с Пн., на Вт.</p>
                                </li>
                                <li>
                                    <p><span>6</span> сентября 2019 г., с Пн., на Вт.</p>
                                </li>
                            </ul>
                            <div class="separator"></div>
                            <p>Стоимость поездки:</p>
                            <h3>6 500<sup>тг.</sup></h3>
                            <p>Сбор группы:</p>
                            <h3>с 21:00 до 21:30</h3>
                            <p>Переодичность выездов -два раза в неделю!</p>
                            <div class="separator"></div>
                            <p>Парковка метро ст. Алатау пр. Абая, угол ул. Жарокова (иногородних забираем с ЖД-1)</p>
                            <div class="bottom__line"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tour__program">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-md-6 mt-5" id="tour__program-content">
                    
                </div>
                <div class="col-xl-5 col-md-6" id="tour__program-map">
                    <div class="mapouter"><div class="gmap_canvas"><iframe id="gmap_canvas" src="https://maps.google.com/maps?q=%D0%B0%D0%BB%D0%BC%D0%B0%D1%82%D1%8B&&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div></div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <p>
                    Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="slider about-player">
                        <div>
                        <iframe
                            src="https://www.youtube.com/embed/tgbNymZ7vqY">
                        </iframe> 
                        </div>
                        <div>
                            <iframe
                                src="https://www.youtube.com/embed/tgbNymZ7vqY">
                            </iframe> 
                        </div>
                        <div>
                            <iframe
                                src="https://www.youtube.com/embed/tgbNymZ7vqY">
                            </iframe> 
                        </div>
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