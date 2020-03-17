<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<meta name="app-url" content="{{url('/')}}">
	<meta name="app-lang" content="{{app()->getLocale()}}">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{$seo_page ? $seo_page->title : ''}} @yield('seo_page_title')</title>
	<meta name="og:title" property="og:title" content="{{$seo_page ? $seo_page->title : ''}} @yield('seo_page_title')">
	<meta name="description" content="{{$seo_page ? $seo_page->description : ''}} @yield('seo_page_description')">
	<meta property="og:description" content="{{$seo_page ? $seo_page->description : ''}} @yield('seo_page_description')" />
	<meta name="Keywords" content="{{$seo_page ? $seo_page->keywords : ''}} @yield('seo_page_keywords')">
	<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">
	<link href="{{asset('css/select2.min.css')}}" rel="stylesheet" />
	<link rel="stylesheet" href="{{asset('css/slick.css')}}">
	<link rel="stylesheet" href="{{asset('css/slick-theme.css')}}">
	<link rel="stylesheet" href="{{asset('css/hc-offcanvas-nav.css')}}">
	<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{asset('css/glide.theme.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/glide.core.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/aos.css')}}">
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
				<!-- <div class="col-xl-4 col-sm-8">
                    <p>
                        {{__('Это зона беспошлинной торговли между Казахстаном и Китаем, Дюти Фри (Duty Free) на нейтральной территории.')}}
                    </p>
                </div> -->
				<div class="col-xl-8 col-sm-8">
					<form action="{{route('search')}}" method="GET" class="search-form flex-wrap">
						<div class="d-flex w-100">
							<input class="search-field" type="search" id="predictive_search" placeholder="{{__('Поиск по продукции')}}" name="q" value="{{request()->q}}" required>
							<input class="search-btn" id="predictive_search_btn" type="submit" value="">
						</div>
						<div id="livesearch" class="w-100 bg-white mt-2" style="z-index: 100; max-height: 500px; overflow-y: auto"></div>
					</form>
					<p class="search-example">@lang('search-placeholder-example-label'){{__('Например:')}} <span>{{__('Женские меховые жилетки')}}</span></p>
				</div>
				<div class="col-xl-2 col-sm-4">
					<ul class="nav pl-3">
						<li class="nav-item"><a href="{{ url('/lang/ru') }}" class="nav-link">RU</a></li>
						<li class="nav-item"><a href="{{ url('/lang/en') }}" class="nav-link">EN</a></li>
						<li class="nav-item"><a href="{{ url('/lang/kz') }}" class="nav-link">KZ</a></li>
					</ul>
					@if(Auth::user())
					<div class="loginOrReg">
						<a class="login-btn" href="{{route('home')}}">{{Auth::user()->name}}</a>

						<a class="reg-btn" href="{{ route('logout') }}" onclick="event.preventDefault();
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
							<h3>@lang('interface.catalog-boutiques')</h3>
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
	<!-- HEADER END -->

	@yield('content')


	<!-- FOOTER -->
	<div class="footer" style="margin-top: unset;">
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
								<img src="{{asset('images/v.png')}}" alt="">
							</a></li>
						@endif
						@if(!empty(setting('sayt.twitter')))
						<li><a href="{{setting('sayt.twitter')}}">
								<img src="{{asset('images/y.png')}}" alt="">
							</a></li>
						@endif
						@if(!empty(setting('sayt.vk')))
						<li><a href="{{setting('sayt.vk')}}">
								<img src="{{asset('images/t.png')}}" alt="">
							</a></li>
						@endif
						@if(!empty(setting('sayt.youtube')))
						<li><a href="{{setting('sayt.youtube')}}">
								<img src="{{asset('images/v.png')}}" alt="">
							</a></li>
						@endif
						@if(!empty(setting('sayt.instagram')))
						<li><a href="{{setting('sayt.instagram')}}">
								<svg enable-background="new 0 0 40 40" version="1.1" viewBox="0 0 40 40" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
									<g>
										<g>
											<path d="M20,2c9.925,0,18,8.075,18,18s-8.074,18-18,18S2,29.925,2,20S10.075,2,20,2 M20,0C8.954,0,0,8.954,0,20    c0,11.047,8.954,20,20,20c11.044,0,20-8.953,20-20C40,8.954,31.045,0,20,0L20,0z" fill="#959595" />
										</g>
										<path clip-rule="evenodd" d="M12.537,10.641h14.926c1.416,0,2.576,1.159,2.576,2.577v14.925   c0,1.418-1.16,2.577-2.576,2.577H12.537c-1.417,0-2.577-1.159-2.577-2.577V13.218C9.96,11.8,11.12,10.641,12.537,10.641   L12.537,10.641z M24.588,12.872c-0.498,0-0.904,0.407-0.904,0.904v2.164c0,0.497,0.406,0.903,0.904,0.903h2.27   c0.496,0,0.902-0.406,0.902-0.903v-2.164c0-0.497-0.406-0.904-0.902-0.904H24.588L24.588,12.872z M27.77,19.132h-1.768   c0.168,0.546,0.258,1.124,0.258,1.724c0,3.34-2.795,6.047-6.24,6.047c-3.447,0-6.243-2.707-6.243-6.047   c0-0.6,0.091-1.178,0.258-1.724h-1.844v8.482c0,0.439,0.358,0.799,0.798,0.799h13.983c0.438,0,0.797-0.359,0.797-0.799V19.132   L27.77,19.132z M20.02,16.73c-2.229,0-4.034,1.749-4.034,3.907c0,2.159,1.805,3.909,4.034,3.909c2.226,0,4.031-1.75,4.031-3.909   C24.051,18.479,22.246,16.73,20.02,16.73z" fill="#959595" fill-rule="evenodd" />
									</g>
								</svg>
							</a></li>
						@endif
					</ul>
					<div class="AStoreGPlay mt-5">
						@if(!empty(setting('sayt.playmarket')))
						<a href="{{setting('sayt.playmarket')}}">
							<a href="#">
								<img src="{{asset('images/google.png')}}" alt="">
							</a>
						</a>
						@endif
						@if(!empty(setting('sayt.Appstore')))
						<a href="{{setting('sayt.Appstore')}}">
						<a href="#">
								<img src="{{asset('images/app.png')}}" alt="">
							</a>
						</a>
						@endif
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 pl-5 mobile__padding-left">
					<h5>{{__('Звоните')}}</h5>
					<a class="phoneNumber" href="tel: {{setting('sayt.phone')}}">{{setting('sayt.phone')}}</a>
					<button class="callOrder" type="button" data-toggle="modal" data-target="#callUs" onclick="function(){callhunter();}()">{{__('Заказать звонок')}}</button>
					<div class="mt-4">
						<h5>{{__('Адрес')}}</h5>
						<p>{{setting('sayt.address')}}</p>
					</div>
					<div class="mt-4">
						<h5>{{__('Время работы')}}</h5>
						<p>Работаем с {{setting('sayt.work-time')}} без выходных.</p>
					</div>
					<div class="mt-4">
						<script type="text/javascript">
							document.write('<a href="//www.liveinternet.ru/click" '+
							'target="_blank"><img src="//counter.yadro.ru/hit?t27.1;r'+
							escape(document.referrer)+((typeof(screen)=='undefined')?'':
							';s'+screen.width+'*'+screen.height+'*'+(screen.colorDepth?
							screen.colorDepth:screen.pixelDepth))+';u'+escape(document.URL)+
							';h'+escape(document.title.substring(0,150))+';'+Math.random()+
							'" alt="" title="LiveInternet: number of visitors and pageviews'+
							' is shown" '+
							'border="0" width="130" height="170"><\/a>')
						</script>
					</div>
					<!-- Модальное окно -->
					<div class="modal fade" id="callUs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="myModalLabel">Свяжитесь с нами</h4>
								</div>
								<div class="modal-body">
									<h2>{{setting('kontakty.name-1')}}</h2>
									<a href="tel: {{setting('kontakty.phone-1')}}">{{setting('kontakty.phone-1')}}</a>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<p>Разработано В <a href="https://www.a-lux.kz/">Алматы Люкс</a></p>
			<div class="col-md-12 d-flex justify-content-end">

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

			<!-- {{renderMenu($menu)}} -->
			@foreach($_categories as $item)
			<li><a href='{{route('trading-houses', ['category' => $item->id])}}'>{{$item->getTranslatedAttribute('name')}}</a></li>
			@endforeach
		</ul>
	</nav>
	<!-- PRODUCTION CATALOG END -->

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="{{asset('js/popper.min.js')}}"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="{{asset('js/slick.min.js')}}"></script>
	<script src="{{asset('js/select2.min.js')}}"></script>
	<script src="{{asset('js/glide.min.js')}}"></script>
	<script src="{{asset('js/hc-offcanvas-nav.js')}}"></script>
	<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('js/headhesive.min.js')}}"></script>
	<script>
		window.lang = 'ru';
	</script>
	<script src="{{asset('js/app.js')}}?q={{rand()}}"></script>
	<script src="{{asset('js/main.js')}}"></script>
	@stack('scripts')
	<script>
		// var searchInput = document.querySelector('#predictive_search');

		// for (const search of searchInput) {
		// search.addEventListener('keyup', function() {
		// 	var activeLiveSearch = this.parentNode.nextElementSibling;
		// 	var activeSearchBtn = this.nextElementSibling;
		// 	var activeInput = this;

			// setTimeout(() => {
			// 	showResult(this.value, activeLiveSearch, activeInput);
			// }, 10000);
		// });
		// }

		// function showResult(str, lv, input) {
		// 	if (str.length == 0) {
		// 		lv.innerHTML = "";
		// 		lv.classList.remove('p-2');
		// 		return;
		// 	}
		// 	axios.get('/api/search-words?word=' + str)
		// 	.then(response => {
		// 		lv.innerHTML = "";
		// 		lv.classList.remove('p-2');
		// 		for (const wordIndex in response.data) {
		// 			lv.innerHTML += '<div class="py-2"><a href="javascript:void(0)" style="color: #a39ab4" onclick="addWordToSearchField(\'' + response.data[wordIndex] + '\')">' + response.data[wordIndex] + '</a></div>';
		// 		}

		// 		if(lv.children.length > 0) {
		// 			lv.classList.add('p-2');
		// 		} else {
		// 			lv.classList.remove('p-2');
		// 		}
		// 	});
		// }

		// function addWordToSearchField(word) {
		// 	activeInput.value = word;
		// 	activeLiveSearch.innerHTML = '';
		// 	activeSearchBtn.click();
		// }
	</script>
	@if(session('message'))
	<script src="{{asset('js/sweetalert2.min.js')}}"></script>
	<script>
		Swal.fire("{{session('message')}}");
	</script>
	@endif
	@if (session('updated'))
	<script>
		Swal.fire('Данные успешно обновлены!');
	</script>
	@endif
	<!-- MAIN PAGE SLICKS -->
	<style>
		. {
				{
				env('MIX_EDITABLE_BLOCK_CLASS')
			}
		}

			{
			border: none !important;
		}

		. {
				{
				env('MIX_EDITABLE_BLOCK_CLASS')
			}
		}

		.edit {
			opacity: 0.5;
			position: absolute;
			top: 0;
			background-color: rgba(0, 0, 0, 0.3);
			color: #fff;
			padding: 5px;
			left: 0;
		}

		. {
				{
				env('MIX_EDITABLE_BLOCK_CLASS')
			}
		}

		:hover .edit {
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
