@extends('layout')

@section('content')
    <div class="contact">
        <div class="container">
            <div class="row pt-5 mb-5">
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-7 pr-0">
                    <div class="flexible">
                        <a href="#">
                            <span>{{__('главная')}}</span>
                        </a>
                        <span>/</span>
                        <h4>{{__('контакты')}}</h4>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-9 col-md-8 col-sm-6 col-5"></div>
            </div>
            <div class="row pb-5">
                <div class="col-xl-4 col-md-6 col-lg-5">
                    <div class="contact__wrapper">
                        <div class="contact__details--wrapper">
                            <div class="contact__details">
                                <h2>{{setting('kontakty.name-1')}}</h2>
                                <a href="tel: {{setting('kontakty.phone-1')}}">{{setting('kontakty.phone-1')}}</a>
                            </div>
                            <div class="contact__details">
                                <h2>{{setting('kontakty.name-2')}}</h2>
                                <a href="tel: {{setting('kontakty.phone-2')}}">{{setting('kontakty.phone-2')}}</a>
                            </div>
                            <div class="contact__details">
                                <h2>{{__('Адрес')}}</h2>
                                <p>{{setting('sayt.address')}}</p>
                            </div>
                        </div>
                        <div class="contact__card">
                            <h2>{{__('Генеральный директор')}}:</h2>
                            <div class="card__wrapper">
                                <div class="img__wrapper">
                                    <img src="{{Voyager::image(setting('kontakty.director-photo'))}}">
                                </div>
                                <p>{{setting('kontakty.director-name')}}</p>
                            </div>
                        </div>
                        <div class="contact__details--wrapper">
                            <h1>{{__('Отправить сообщения')}}</h1>
                            <form action="" class="leave__message-form">
                                <input type="text" name="uname" placeholder="Имя" required oninvalid="this.setCustomValidity('Введите ваше имя')" oninput="setCustomValidity('')">
                                <input type="email" name="umail" placeholder="Email" required oninvalid="this.setCustomValidity('Введите ваш email')" oninput="setCustomValidity('')">
                                <textarea name="review__textarea" required placeholder="Сообщение" oninvalid="this.setCustomValidity('Введите ваше сообщение')" oninput="setCustomValidity('')"></textarea>
                                <button type="submit" class="leave__message-btn">Отправить</button>
                                <div class="consent__wrapper">
                                    <input id="consent" type="checkbox" required oninvalid="this.setCustomValidity('Необходимо принять условие соглашения')" oninput="setCustomValidity('')">
                                    <label for="consent">Даю согласие на обработку <span>персональных данных</span></label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-md-6 col-lg-7 pl-1 pr-1">
                    <div class="map__wrapper">
                        <h1>{{__('Общество с ограниченной ответственностью “Хоргос”')}}</h1>
                        <div class="separator"></div>
                    </div>
                    <div class="mapouter"><div class="gmap_canvas">{!!setting('kontakty.map')!!}</div></div>
                </div>
            </div>
        </div>
        <div class="container-fluid favorite-boutiques">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 mt-5">
                        <h1 class="favorite-header">Избранные бутики</h1>
                    </div>
                    @if((Auth::user()->favoriteBoutiques ?? false) && Auth::user()->favoriteBoutiques->count())
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
