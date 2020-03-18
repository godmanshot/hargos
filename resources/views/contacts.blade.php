@extends('layout')

@section('content')
    <div class="contact">
        <div class="container">
            <div class="row pt-5 mb-5">
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-7 pr-0">
                    <div class="flexible">
                        <a href="/">
                            <span>@lang('interface.main')</span>
                        </a>
                        <span>/</span>
                        <h4>@lang('interface.contacts')</h4>
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
                                <h2>@lang('interface.address')</h2>
                                <p>{{setting('sayt.address')}}</p>
                            </div>
                        </div>
                        <div class="contact__card">
                            <h2>@lang('interface.ceo'):</h2>
                            <div class="card__wrapper">
                                <div class="img__wrapper">
                                    <img src="{{Voyager::image(setting('kontakty.director-photo'))}}">
                                </div>
                                <p>{{setting('kontakty.director-name')}}</p>
                            </div>
                        </div>
                        <div class="contact__details--wrapper">
                            <h1>@lang('interface.liveAMessage')</h1>
                            <form action="{{route('send')}}" method="POST" class="leave__message-form" id="leave__message-form">
                                @csrf
                                <input type="text" name="name" placeholder="@lang('interface.name')" required oninvalid="this.setCustomValidity('Введите ваше имя')" oninput="setCustomValidity('')">
                                <input type="email" name="email" placeholder="Email" required oninvalid="this.setCustomValidity('Введите ваш email')" oninput="setCustomValidity('')">
                                <textarea name="message" required placeholder="@lang('interface.message')" oninvalid="this.setCustomValidity('Введите ваше сообщение')" oninput="setCustomValidity('')"></textarea>
                                <button type="submit" class="leave__message-btn">@lang('interface.send')</button>
                                <div class="consent__wrapper">
                                    <input id="consent" type="checkbox" required oninvalid="this.setCustomValidity('Необходимо принять условие соглашения')" oninput="setCustomValidity('')">
                                    <label for="consent">@lang('interface.agreemnt') <span>@lang('interface.personal')</span></label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-md-6 col-lg-7 pl-1 pr-1">
                    <div class="map__wrapper">
                        <h1>@lang('interface.llcHorgos')</h1>
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

@push('scripts')
    <script>
        var requestForm = document.getElementById('leave__message-form');
        var appUrl = document.querySelector('meta[name=app-url]').content;

        requestForm.addEventListener('submit', function(event) {
            event.preventDefault();
            var data = new FormData(requestForm);

            axios.post(appUrl + "/api/feedback", data)
                .then(function(response) {
                    Swal.fire(response.message);
                });
        });
    </script>
@endpush
