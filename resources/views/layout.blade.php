<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="app-url" content="{{url('/')}}">
    <meta name="app-lang" content="{{app()->getLocale()}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Хоргос</title>
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/hc-offcanvas-nav@3.4.1/dist/hc-offcanvas-nav.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
	<link rel="stylesheet" href="https://cdn.bootcss.com/Glide.js/3.4.1/css/glide.theme.min.css">
	<link rel="stylesheet" href="https://cdn.bootcss.com/Glide.js/3.4.1/css/glide.core.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
</head>
<body class="bg-grey">
    <!-- HEADER -->
    <div class="header">
        <div class="container pt-5 pb-4 pl-0 pr-0">
            <div class="row">
                <div class="col-xl-2 col-sm-4">
                    <a href="{{url('/')}}" class="logo">{{__('Хоргос')}}</a>
                </div>
                <div class="col-xl-4 col-sm-8">
                    <p>
                        {{__('Это зона беспошлинной торговли между Казахстаном и Китаем, Дюти Фри (Duty Free) на нейтральной территории.')}}
                    </p>
                </div>
                <div class="col-xl-4 col-sm-8">
                    <form action="{{route('search')}}" method="GET" class="search-form">
					    <input class="search-field" type="search" placeholder="{{__('Поиск по продукции')}}" name="q" required>
					    <input class="search-btn" type="submit" value="">
				    </form>
                    <p class="search-example">{{__('Например:')}} <span>{{__('Женские меховые жилетки')}}</span></p>
                </div>
                <div class="col-xl-2 col-sm-4">
					@if(Auth::user())
						<div class="loginOrReg">
							<a class="login-btn" href="{{route('home')}}">{{Auth::user()->name}}</a>

							<a class="reg-btn" href="{{ route('logout') }}"
								onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">
								{{ __('Выйти') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</div>
					@else
						<div class="loginOrReg">
							<a class="login-btn" href="{{route('login')}}">{{__('Войти')}}</a>
							<a class="reg-btn" href="{{route('register')}}">{{__('Зарегистрироваться')}}</a>
						</div>
					@endif
                </div>
            </div>
        </div>
        <div class="multicolors">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3">
                        <div class="burger-bc">

                        </div>
                        <div class="burger">
                            <a class="toggle">
                                <span></span>
                            </a>
                            <h3>{{__('Каталог бутиков')}}</h3>
                        </div>
                    </div>
                    <div class="col-xl-9 flexible">
                        <ul class="main-nav">
							@php
								$menu = menu('Главное меню сайта', '_json');
								$menu->load('translations');
							@endphp
                            @foreach($menu as $item)
                                <li><a href="{{$item->url}}"><span>{{$item->getTranslatedAttribute('title')}}</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCTION CATALOG -->
	<nav id="catalog-nav">
		<ul class="first-nav">
			<li>
				<span>Навигация</span>
				<ul>
					@php
					$menu = menu('Главное меню сайта', '_json');
					$menu->load('translations');
					@endphp
					@foreach($menu as $item)
						<li><a href="{{$item->url}}">{{$item->getTranslatedAttribute('title')}}</a></li>
					@endforeach
				</ul>
			</li>
            @php
				$menu = menu('Каталог бутиков', '_json');
				$menu->load('translations');
                function renderMenu($items) {
                    foreach($items as $item) {
                        if($item->children->count()) {
                            echo "<li><span>".$item->getTranslatedAttribute('title')."</span>";
                                echo "<ul>";
                                    renderMenu($item->children);
                                echo "</ul>";
                            echo "</li>";
                        } else {
                            echo "<li><a href='".$item->url."'>".$item->getTranslatedAttribute('title')."</a></li>";
                        }
                    }
                }
            @endphp

            {{renderMenu($menu)}}
		</ul>
    </nav>
    <!-- PRODUCTION CATALOG END -->
    <!-- HEADER END -->

    @yield('content')
    

    <!-- FOOTER -->
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6">
					<h5>{{__('Меню')}}</h5>
					<ul class="footer__nav">
						@php
							$menu = menu('Меню в футере', '_json');
							$menu->load('translations');
						@endphp
						@foreach($menu as $item)
                            <li><a href="{{$item->url}}"><span>{{$item->getTranslatedAttribute('title')}}</span></a></li>
                        @endforeach
					</ul>
				</div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6">
					<h5>{{__('Торговые дома')}}</h5>
					<ul class="footer__nav">
						@php
							$menu = menu('Торговые дома в футере', '_json');
							$menu->load('translations');
						@endphp
						@foreach($menu as $item)
                            <li><a href="{{$item->url}}"><span>{{$item->getTranslatedAttribute('title')}}</span></a></li>
                        @endforeach
					</ul>
				</div>
				<div class="col-xl-5 col-lg-5 col-md-8">
					<h5>{{__('Подпишитесь на рассылку')}}</h5>
					<form action="{{route('subscribe')}}" method="POST" class="subscription__form">
						@csrf
						<input class="subscription__value" type="email" name="email" placeholder="{{__('Почта')}}" required>
						<button class="subscription__button" type="submit">{{__('Подписаться')}}</button>
					</form>
					<h5 class="mt-3">{{__('Мы в социальных сетях')}}</h5>
					<ul class="social__btns mt-2">
						@if(!empty(setting('sayt.facebook')))
						<li><a href="{{setting('sayt.facebook')}}">
						<svg version="1.1" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink">
							<g fill="none" fill-rule="evenodd" stroke="none" stroke-width="1">
								<g fill="#000000" id="Facebook">
									<path d="M25,50 C38.8071194,50 50,38.8071194 50,25 C50,11.1928806 38.8071194,0 25,0 C11.1928806,0 0,11.1928806 0,25 C0,38.8071194 11.1928806,50 25,50 Z M25,47 C37.1502651,47 47,37.1502651 47,25 C47,12.8497349 37.1502651,3 25,3 C12.8497349,3 3,12.8497349 3,25 C3,37.1502651 12.8497349,47 25,47 Z M26.8145197,36 L26.8145197,24.998712 L30.0687449,24.998712 L30.5,21.2076072 L26.8145197,21.2076072 L26.8200486,19.3101227 C26.8200486,18.3213442 26.9207209,17.7915341 28.4425538,17.7915341 L30.4769629,17.7915341 L30.4769629,14 L27.2222769,14 C23.3128757,14 21.9368678,15.8390937 21.9368678,18.9318709 L21.9368678,21.2080366 L19.5,21.2080366 L19.5,24.9991413 L21.9368678,24.9991413 L21.9368678,36 L26.8145197,36 Z M26.8145197,36" id="Oval-1"/>
								</g>
							</g>
						</svg>
						</a></li>
						@endif
						@if(!empty(setting('sayt.twitter')))
						<li><a href="{{setting('sayt.twitter')}}">
						<svg version="1.1" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink">
							<g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1">
								<g fill="#000000" id="Twitter">
									<path d="M25,50 C38.8071194,50 50,38.8071194 50,25 C50,11.1928806 38.8071194,0 25,0 C11.1928806,0 0,11.1928806 0,25 C0,38.8071194 11.1928806,50 25,50 Z M25,47 C37.1502651,47 47,37.1502651 47,25 C47,12.8497349 37.1502651,3 25,3 C12.8497349,3 3,12.8497349 3,25 C3,37.1502651 12.8497349,47 25,47 Z M24.6822554,20.5542975 L24.729944,21.3761011 L23.9351333,21.2754721 C21.0420225,20.8897275 18.5145246,19.5815504 16.3685358,17.3844837 L15.3193857,16.2943361 L15.0491501,17.0993681 C14.4768864,18.8939188 14.8424993,20.7890985 16.0347153,22.0637326 C16.6705638,22.7681357 16.5274979,22.8687647 15.4306592,22.4494772 C15.0491501,22.3153051 14.7153296,22.2146761 14.6835371,22.2649907 C14.5722637,22.3823912 14.9537728,23.9085978 15.2558008,24.5123719 C15.6691024,25.350947 16.5116017,26.1727505 17.433582,26.6591241 L18.2124965,27.0448686 L17.2905161,27.0616401 C16.4003282,27.0616401 16.3685358,27.0784116 16.4639131,27.4306131 C16.7818374,28.5207608 18.0376382,29.6779944 19.436505,30.1811394 L20.4220701,30.533341 L19.5636746,31.070029 C18.2919776,31.8415181 16.7977335,32.2775772 15.3034895,32.3111202 C14.5881599,32.3278916 14,32.3949776 14,32.4452922 C14,32.6130071 15.939338,33.5522113 17.0679692,33.9211843 C20.4538626,35.0113319 24.4756046,34.5417298 27.4958851,32.6800932 C29.6418739,31.3551445 31.7878628,28.7220188 32.7893242,26.1727505 C33.3297954,24.8142589 33.8702667,22.3320767 33.8702667,21.1413 C33.8702667,20.369811 33.9179553,20.269182 34.8081432,19.3467494 C35.3327183,18.8100613 35.8255009,18.2230588 35.9208782,18.0553437 C36.0798403,17.7366852 36.0639442,17.7366852 35.2532373,18.0218007 C33.9020591,18.5249458 33.7113045,18.4578598 34.3789455,17.7031422 C34.8717281,17.1664541 35.459888,16.1937071 35.459888,15.9085915 C35.459888,15.858277 35.2214448,15.9421346 34.9512092,16.093078 C34.6650773,16.2607931 34.0292288,16.5123656 33.5523424,16.6633091 L32.6939469,16.9484246 L31.9150324,16.394965 C31.4858346,16.093078 30.8817786,15.757648 30.5638543,15.657019 C29.7531474,15.422218 28.5132428,15.455761 27.7820169,15.724105 C25.7949903,16.4788226 24.5391894,18.4243168 24.6822554,20.5542975 C24.6822554,20.5542975 24.5391894,18.4243168 24.6822554,20.5542975 Z M24.6822554,20.5542975" id="Oval-1"/>
								</g>
							</g>
						</svg>
						</a></li>
						@endif
						@if(!empty(setting('sayt.vk')))
						<li><a href="{{setting('sayt.vk')}}">
						<svg enable-background="new 0 0 1024 1024" id="Layer_1" version="1.1" viewBox="0 0 1024 1024" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
							<g id="Background">
								<path d="M983.766,312.727c-25.785-60.972-62.694-115.728-109.705-162.744   C827.05,102.966,772.299,66.049,711.329,40.257C648.194,13.548,581.14,0.004,512,0c-69.104,0-136.155,13.54-199.289,40.243   c-60.969,25.787-115.721,62.699-162.735,109.71c-47.014,47.011-83.929,101.761-109.72,162.728   C13.548,375.814,0.004,442.865,0,511.97c-0.004,69.109,13.533,136.165,40.234,199.304   c25.785,60.973,62.696,115.728,109.707,162.743c47.011,47.018,101.762,83.935,162.732,109.727   c63.136,26.708,130.19,40.253,199.323,40.257h0.009c69.104,0,136.153-13.54,199.288-40.243   c60.969-25.787,115.72-62.699,162.733-109.709c47.013-47.01,83.929-101.76,109.72-162.728   c26.708-63.134,40.251-130.186,40.255-199.29C1024.004,442.921,1010.467,375.866,983.766,312.727z M512.004,976.328h-0.03   c-124.026-0.007-240.627-48.313-328.323-136.019C95.957,752.604,47.665,635.999,47.672,511.973   c0.015-256.016,208.312-464.3,464.356-464.3c124.026,0.007,240.626,48.312,328.32,136.017   c87.695,87.706,135.986,204.311,135.979,328.337C976.313,768.043,768.018,976.328,512.004,976.328z" fill="#262626"/>
							</g>
							<g id="VK">
								<path d="M154.504,399.328c7.7,20.099,17.191,39.48,26.987,58.622   c23.277,45.48,47.248,89.673,79.387,129.647c32.479,40.396,70.825,79.544,115.996,105.676c12.563,7.268,25.77,13.4,39.527,18.061   c53.079,17.979,111.295,16.267,129.273,4.281c17.979-11.986-3.424-90.75,12.842-100.167c16.267-9.418,45.375,11.13,66.777,29.965   c21.403,18.834,37.669,35.1,49.656,47.942c7.506,8.042,12.79,17.64,22.575,23.376c16.186,9.486,37.753,8.435,55.808,8.485   c10.065,0.029,20.133,0.063,30.199-0.063c6.803-0.084,13.608,0.136,20.406-0.193c11.171-0.542,25.779-4.952,24.941-18.927   c-0.198-3.304-0.931-7.256-2.244-10.306c-2.822-6.555-6.797-13.357-11.069-19.067c-22.258-29.75-37.026-44.946-48.155-56.933   c-11.13-11.984-56.933-55.22-59.929-63.78c-2.996-8.562-3.96-12.36,4.548-23.918c8.508-11.559,27.129-40.72,41.684-61.694   c9.128-13.155,17.42-26.91,25.612-40.659c9.659-16.21,18.743-32.813,26.485-50.029c3.462-7.698,6.604-14.711,4.46-23.337   c-1.437-5.779-4.687-10.856-10.739-12.282c-3.304-0.778-6.909-0.857-10.29-0.857c-12.627,0-45.589,0-45.589,0   c-5.958,0-11.917-0.087-17.876-0.076c-6.109,0.011-12.269-0.037-18.36,0.485c-8.666,0.742-13.977,7.425-18.336,14.163   c-5.333,8.245-10.187,16.823-15.36,25.172c-3.537,5.705-6.998,11.455-10.397,17.243c-5.312,9.04-10.784,17.983-16.256,26.927   c-2.271,3.71-4.55,7.416-6.789,11.146c-6.421,10.699-62.069,83.898-73.198,86.896s-14.982,2.142-14.982-20.547   c0-22.687,0-151.533,0-151.533s-0.854-9.935-10.272-9.935s-53.099,0-53.099,0h-90.09c0,0-21.188,0.088-13.697,19.138   c7.491,19.049,29.644,24.828,29.644,56.611c0,31.782,0,124.565,0,124.565s-3.745,27.931-27.931,4.815   c-19.059-18.215-34.762-39.751-48.637-62.081c-14.426-23.215-26.048-47.333-36.4-72.602c-2.961-7.227-5.893-14.466-8.934-21.659   c-3.174-7.509-6.319-15.031-9.363-22.593c-3.535-8.784-7.317-20.265-16.849-24.309c-4.792-2.033-10.092-1.933-15.2-1.932   c-18.943,0.005-37.885,0.058-56.827,0.022c-5.558-0.01-11.116-0.016-16.674-0.002c-13.123,0.031-29.445-0.356-32.558,16.038   c-1.794,9.443,1.772,19.523,4.757,28.367C151.321,391.511,152.99,395.375,154.504,399.328z" fill="#262626" id="Vk"/>
							</g>
						</svg>
						</a></li>
						@endif
						@if(!empty(setting('sayt.youtube')))
						<li><a href="{{setting('sayt.youtube')}}">
							<svg version="1.1" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink">
							
								<g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1">
									<g fill="#000000" id="YouTube">
										<path d="M50,25 C50,11.1928806 38.8071194,0 25,0 C11.1928806,0 0,11.1928806 0,25 C0,38.8071194 11.1928806,50 25,50 C38.8071194,50 50,38.8071194 50,25 Z M47,25 C47,12.8497349 37.1502651,3 25,3 C12.8497349,3 3,12.8497349 3,25 C3,37.1502651 12.8497349,47 25,47 C37.1502651,47 47,37.1502651 47,25 Z M36.768327,30.7654774 C36.4698281,32.0627028 35.4087162,33.0191862 34.1319129,33.1618614 C31.1074781,33.4998058 28.0463955,33.5014844 24.9984613,33.4998058 C21.9508068,33.5014844 18.8894444,33.4998058 15.8652894,33.1618614 C14.5882064,33.0191862 13.5276539,32.0627028 13.2294348,30.7654774 C12.8047662,28.9179732 12.8047662,26.9020564 12.8047662,25.0002798 C12.8047662,23.0982233 12.8098018,21.0820268 13.2341906,19.2345226 C13.5326895,17.9372972 14.5932419,16.980534 15.8700452,16.8381386 C18.89448,16.5001942 21.9555627,16.4985156 25.0034969,16.5001942 C28.0511513,16.4985156 31.1125137,16.5001942 34.1366687,16.8381386 C35.4137518,16.980534 36.4748637,17.9372972 36.7730829,19.2345226 C37.1977514,21.0820268 37.1952336,23.0982233 37.1952336,25.0002798 C37.1952336,26.9020564 37.1927158,28.9179732 36.768327,30.7654774 Z M22.8047662,20.5 L29.5547662,24.3971143 L22.8047662,28.2942286 L22.8047662,20.5 Z M22.8047662,20.5" id="Oval-1"/>
									</g>
								</g>
							</svg>
						</a></li>
						@endif
						@if(!empty(setting('sayt.instagram')))
						<li><a href="{{setting('sayt.instagram')}}">
						<svg enable-background="new 0 0 40 40" version="1.1" viewBox="0 0 40 40" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
							<g>
								<g>
									<path d="M20,2c9.925,0,18,8.075,18,18s-8.074,18-18,18S2,29.925,2,20S10.075,2,20,2 M20,0C8.954,0,0,8.954,0,20    c0,11.047,8.954,20,20,20c11.044,0,20-8.953,20-20C40,8.954,31.045,0,20,0L20,0z" fill="#959595"/>
								</g>
								<path clip-rule="evenodd" d="M12.537,10.641h14.926c1.416,0,2.576,1.159,2.576,2.577v14.925   c0,1.418-1.16,2.577-2.576,2.577H12.537c-1.417,0-2.577-1.159-2.577-2.577V13.218C9.96,11.8,11.12,10.641,12.537,10.641   L12.537,10.641z M24.588,12.872c-0.498,0-0.904,0.407-0.904,0.904v2.164c0,0.497,0.406,0.903,0.904,0.903h2.27   c0.496,0,0.902-0.406,0.902-0.903v-2.164c0-0.497-0.406-0.904-0.902-0.904H24.588L24.588,12.872z M27.77,19.132h-1.768   c0.168,0.546,0.258,1.124,0.258,1.724c0,3.34-2.795,6.047-6.24,6.047c-3.447,0-6.243-2.707-6.243-6.047   c0-0.6,0.091-1.178,0.258-1.724h-1.844v8.482c0,0.439,0.358,0.799,0.798,0.799h13.983c0.438,0,0.797-0.359,0.797-0.799V19.132   L27.77,19.132z M20.02,16.73c-2.229,0-4.034,1.749-4.034,3.907c0,2.159,1.805,3.909,4.034,3.909c2.226,0,4.031-1.75,4.031-3.909   C24.051,18.479,22.246,16.73,20.02,16.73z" fill="#959595" fill-rule="evenodd"/>
							</g>
						</svg>
						</a></li>
						@endif
					</ul>
					<div class="AStoreGPlay mt-5">
						@if(!empty(setting('sayt.playmarket')))
						<a href="{{setting('sayt.playmarket')}}">
							<svg 
								xmlns="http://www.w3.org/2000/svg"
								xmlns:xlink="http://www.w3.org/1999/xlink"
								>
								<path fill-rule="evenodd"  stroke="rgb(255, 58, 82)" stroke-width="1px" stroke-linecap="butt" stroke-linejoin="miter" fill="none"
								d="M3.500,0.499 L227.500,0.499 C229.157,0.499 230.500,1.843 230.500,3.499 L230.500,51.500 C230.500,53.156 229.157,54.499 227.500,54.499 L3.500,54.499 C1.843,54.499 0.500,53.156 0.500,51.500 L0.500,3.499 C0.500,1.843 1.843,0.499 3.500,0.499 Z"/>
								<image  x="51.5px" y="7.5px" width="124px" height="37px"  xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHwAAAAlCAMAAAC3QX2zAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAC8VBMVEX/OlL/////OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL///+ZEEjoAAAA+XRSTlMAAB+Iz6wBb+7Al51tSx721AUDEiYsOnI1cQIKeyOCQDvs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" />
							</svg>
						</a>
						@endif
						@if(!empty(setting('sayt.Appstore')))
						<a href="{{setting('sayt.Appstore')}}">
							<svg 
								xmlns="http://www.w3.org/2000/svg"
								xmlns:xlink="http://www.w3.org/1999/xlink"
								>
								<image  x="44.5px" y="13.5px" width="139px" height="27px"  xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIsAAAAbCAMAAAB7oYyOAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAC3FBMVEX/OlL/////OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL/OlL///9du93lAAAA8nRSTlMAAErjtUKXoi+Q+JUeju2EEd1xB8xdI3SmvLA0MF9LAV5cUkBDwEQDdu76jReJ2QKW9KQfu8Sv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" />
								<path fill-rule="evenodd"  stroke="rgb(255, 58, 82)" stroke-width="1px" stroke-linecap="butt" stroke-linejoin="miter" fill="none"
								d="M3.500,0.499 L227.500,0.499 C229.157,0.499 230.500,1.843 230.500,3.499 L230.500,51.500 C230.500,53.156 229.157,54.499 227.500,54.499 L3.500,54.499 C1.843,54.499 0.500,53.156 0.500,51.500 L0.500,3.499 C0.500,1.843 1.843,0.499 3.500,0.499 Z"/>
							</svg>
						</a>
						@endif
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 pl-5 mobile__padding-left">
					<h5>{{__('Звоните')}}</h5>
					<a class="phoneNumber" href="tel: {{setting('sayt.phone')}}">{{setting('sayt.phone')}}</a>
					<button class="callOrder" type="button" onclick="function(){callhunter();}()">{{__('Заказать звонок')}}</button>
					<div class="mt-4">
						<h5>{{__('Адрес')}}</h5>
						<p>{{setting('sayt.address')}}</p>
					</div>
					<div class="mt-4">
						<h5>{{__('Время работы')}}</h5>
						<p>Работаем с {{setting('sayt.work-time')}} без выходных.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
	<script src="https://cdn.jsdelivr.net/npm/hc-offcanvas-nav@3.4.1/dist/hc-offcanvas-nav.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/headhesive/1.2.4/headhesive.min.js"></script>
	<script>
		window.lang = 'ru';
	</script>
    <script src="{{asset('js/app.js')}}?q={{rand()}}"></script>
	<script src="{{asset('js/main.js')}}"></script>
    @stack('scripts')

	@if(session('message'))
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script>swal("{{session('message')}}", "");</script>
	@endif
	<!-- MAIN PAGE SLICKS -->
	<style>
			
			.{{env('MIX_EDITABLE_BLOCK_CLASS')}} {
				border: none !important;
			}

			.{{env('MIX_EDITABLE_BLOCK_CLASS')}} .edit {
				opacity: 0.5;
				position: absolute;
				top: 0;
				background-color: rgba(0, 0, 0, 0.3);
				color: #fff;
				padding: 5px;left: 0;
			}

			.{{env('MIX_EDITABLE_BLOCK_CLASS')}}:hover .edit {
				opacity: 1;
			}

			.no-spacing {
				padding: 0 !important;
				margin: 0 !important;
			}
			  	
	</style>
	
	@if((Auth::user()->role_id ?? 0) == 1)
	<script>
		adminEdit();
	</script>
	@endif
	<!-- MAIN PAGE SLICKS END -->
	<!-- FOOTER END -->
</body>
</html> 