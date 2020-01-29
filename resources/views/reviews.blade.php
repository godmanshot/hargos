@extends('layout')

@section('content')
<div class="reviews">
    <div class="container">
        <div class="row pt-5 mb-5">
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-7 pr-0">
                <div class="flexible">
                    <a href="#">
                        <span>{{__('главная')}}</span>
                    </a>
                    <span>/</span>
                    <h4>{{__('отзывы')}}</h4>
                </div>
            </div>
            <div class="col-xl-10 col-lg-9 col-md-8 col-sm-6 col-5"></div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-sm-6 d-flex align-items-center">
                <h1>{{__('Наши клиенты о нас')}}</h1>
            </div>
            <div class="col-xl-2 col-lg-3 col-sm-6">
                <a href="#leave__review-wrapper" class="leave__review">
                    {{__('Оставить отзыв')}}
                </a>
            </div>
            <div class="col-xl-7"></div>
        </div>
        <div class="row">

            @if($reviews->count())
                @foreach($reviews as $review)

                <div class="col-xl-12 comment--wrapper">
                    <div class="row justify-content-between">
                        <div class="col-xl-2 col-lg-2">
                            <div class="avatar__wrapper avatar__bg" style="min-height: 100px;">
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="reviewBy">
                                        <h2>{{$review->name}} <span>{{$review->dateFormated}}</span></h2>
                                        <h2>{{__('Оценка')}}</h2>
                                        <div class="star-rating__wrapper">
                                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg {{$review->rating >= 5 ? 'star-rating__checked' : ''}}">
                                                <input class="star-rating__input" type="radio" name="rating" value="5">
                                            </label>
                                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg {{$review->rating >= 4 ? 'star-rating__checked' : ''}}">
                                                <input class="star-rating__input" type="radio" name="rating" value="4">
                                            </label>
                                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg {{$review->rating >= 3 ? 'star-rating__checked' : ''}}">
                                                <input class="star-rating__input" type="radio" name="rating" value="3">
                                            </label>
                                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg {{$review->rating >= 2 ? 'star-rating__checked' : ''}}">
                                                <input class="star-rating__input" type="radio" name="rating" value="2">
                                            </label>
                                            <label class="star-rating__ico star-rating__hover fa fa-star fa-lg {{$review->rating >= 1 ? 'star-rating__checked' : ''}}">
                                                <input class="star-rating__input" type="radio" name="rating" value="1">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>{{$review->review}}</p>
                        </div>
                    </div>
                    <div class="row justify-content-end mt-3">
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-md-5 col-9">
                            <div class="useful__wrapper">
                                <h2>{{__('Отзыв полезен')}}</h2>
                                <span class="review-like" data-id="{{ $review->id }}"
                                {{-- @if( !in_array($review->id, json_decode(request()->cookie('can_like', '[]'), true)) )
                                        onclick="window.location.href = '{{url('/reviews/'.$review->id.'/like')}}';"
                                    @endif --}}
                                ><button class="liked" type="button"></button>
                                <span>{{ $review->likes }}</span>
                                </span>
                                <span class="review-dislike" data-id="{{ $review->id }}"
                                    {{-- @if( !in_array($review->id, json_decode(request()->cookie('can_like', '[]'), true)) )
                                        onclick="window.location.href = '{{url('/reviews/'.$review->id.'/dislike')}}';"
                                    @endif --}}
                                ><button class="disliked" type="button"></button>
                                <span>{{ $review->dislikes }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            @endif
        </div>
    </div>
    
    <div class="leave__review-wrapper" id="leave__review-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-4">
                    {!!Block::_('Jio0ql0pbwByBjek')!!}
                </div>
                <div class="col-xl-7 col-lg-8">
                    <form action="{{route('reviews.create')}}" method="POST" class="leave__review-form">
                        @csrf
                        <div class="row">
                            <div class="col-xl-4 col-md-4 pl-2 pr-2 pb-2">
                                <input type="text" name="uname" placeholder="Имя" required oninvalid="this.setCustomValidity('Введите ваше имя')" oninput="setCustomValidity('')">
                            </div>
                            <div class="col-xl-4 col-md-4 pl-2 pr-2 pb-2">
                                <input type="tel" name="utel" placeholder="Телефон" required oninvalid="this.setCustomValidity('Введите ваш номер телефона')" oninput="setCustomValidity('')">
                            </div>
                            <div class="col-xl-4 col-md-4 pl-2 pr-2 pb-2">
                                <input type="email" name="umail" placeholder="Эл. почта" required oninvalid="this.setCustomValidity('Введите ваш email')" oninput="setCustomValidity('')">
                            </div>
                            <div class="col-xl-12 pl-2 pr-2 pt-2 pb-2">
                                <textarea name="review__textarea" required placeholder="Оставьте отзыв" oninvalid="this.setCustomValidity('Введите ваш отзыв')" oninput="setCustomValidity('')"></textarea>
                            </div>
                            <div class="col-xl-4 col-md-4 pl-2 pr-2 pt-2">
                                <div class="star-rating__wrapper">
                                    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                        <input class="star-rating__input" type="radio" name="rating" value="5">
                                    </label>
                                    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                        <input class="star-rating__input" type="radio" name="rating" value="4">
                                    </label>
                                    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                        <input class="star-rating__input" type="radio" name="rating" value="3">
                                    </label>
                                    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                        <input class="star-rating__input" type="radio" name="rating" value="2">
                                    </label>
                                    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg">
                                        <input class="star-rating__input" type="radio" name="rating" value="1" required>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 pl-2 pr-2 pt-2">
                                <button type="submit" class="leave__review-btn">Оставить отзыв</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $('.review-like').on('click', function(e) {
            var id = this.getAttribute('data-id');
            var dislike = this.parentNode.querySelector('span.review-dislike span');
            var like = this.querySelector('span');
            axios.post('/reviews/' + id + '/like')
                .then(function(response) {
                    like.innerHTML = response.data.likes;
                    dislike.innerHTML = response.data.dislikes;
                });
        });

        $('.review-dislike').on('click', function(e) {
            var id = this.getAttribute('data-id');
            var like = this.parentNode.querySelector('span.review-like span');
            var dislike = this.querySelector('span');
            axios.post('/reviews/' + id + '/dislike')
                .then(function(response) {
                    like.innerHTML = response.data.likes;
                    dislike.innerHTML = response.data.dislikes;
                });
        })
    </script>
@endpush
