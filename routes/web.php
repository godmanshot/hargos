<?php

use App\Post;
use App\Review;
use App\Slider;
use App\Freebie;
use App\Boutique;
use App\Callback;
use App\Category;
use App\Interview;
use App\Subscribe;
use App\AdvicePost;
use App\TopProduct;
use App\AdviceVideo;
use App\Recommended;
use App\TradingHouse;
use App\CategoryStock;
use App\AdviceCategory;
use App\PopularProduct;
use App\BoutiqueProduct;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $hello_slider = Slider::withTranslations()->where('name', 'Главный слайдер')->first();
    $special_slider = Slider::withTranslations()->where('name', 'Специально для вас')->first();
    $recommended = Recommended::withTranslations()->orderBy('order')->get();
    $category_stocks = CategoryStock::withTranslations()->orderBy('order')->get();
    $category_stocks_first_line = $category_stocks->split(2)[0] ?? collect([]);
    $category_stocks_second_line = $category_stocks->split(2)[1] ?? collect([]);
    $top_products = TopProduct::withTranslations()->orderBy('order')->get();
    $top_products_first_line = $top_products->split(2)[0] ?? collect([]);
    $top_products_second_line = $top_products->split(2)[1] ?? collect([]);
    $popular_products = PopularProduct::withTranslations()->orderBy('order')->get();
    $freebies = Freebie::withTranslations()->orderBy('order')->get();
    $interviews = Interview::orderBy('order')->get();

    return view('hello', compact(
        'hello_slider',
        'special_slider',
        'recommended',
        'category_stocks',
        'category_stocks_first_line',
        'category_stocks_second_line',
        'top_products',
        'top_products_first_line',
        'top_products_second_line',
        'popular_products',
        'freebies',
        'interviews'
    ));
});

Route::get('/boutique/{boutique}', function(Request $request, Boutique $boutique) {
    return view('boutique', compact('boutique'));
})->name('boutique');

Route::get('/about', function(Request $request) {
    return view('about');
});

Route::get('/trading-houses', function(Request $request) {
    $trading_houses = TradingHouse::orderBy('order')->with('boutiques.categories')->get();

    if($request->has('trading_house')) {
        $selected_trading_house = TradingHouse::where('id', $request->trading_house)->first();
        $categories = $selected_trading_house->boutiquesCategories;
    } else {
        $selected_trading_house = false;
        $categories = Category::all();
    }

    if($request->has('category')) {
        $selected_category = Category::where('id', $request->category)->first();
        $boutiques = $selected_category->boutiques;
    } else {
        $selected_category = false;
        $boutiques = Boutique::all();
    }

    return view('trading-houses', compact('trading_houses', 'selected_trading_house', 'categories', 'selected_category', 'boutiques'));
})->name('trading-houses');

Route::get('/tour-operators', function(Request $request) {
    return view('tour-operators');
});

Route::get('/advice', function(Request $request) {
    $categories = AdviceCategory::latest()->get();

    $videos = AdviceVideo::latest();
    $posts = AdvicePost::latest();
    $selected_category = 0;

    if($request->has('category_id')) {
        $selected_category = $request->category_id;
        $videos->where('advice_category_id', $selected_category);
        $posts->where('advice_category_id', $selected_category);
    }

    $videos = $videos->get();
    $posts = $posts->get();

    return view('advice', compact('categories', 'videos', 'posts', 'selected_category'));
});

Route::get('/reviews', function(Request $request) {
    $reviews = Review::latest()->get();

    return view('reviews', compact('reviews'));
});

Route::post('/reviews', function(Request $request) {
    $request->validate([
        'uname',
        'utel',
        'umail',
        'review__textarea',
        'rating',
    ]);

    Review::create([
        'name' => $request->uname,
        'date' => now(),
        'review' => $request->review__textarea,
        'rating' => $request->rating,
        'likes' => 0,
        'dislikes' => 0,
    ]);
    
    return redirect()->back();

})->name('reviews.create');

Route::get('/reviews/{review}/like', function(Request $request, Review $review) {

    $review->likes += 1;
    $review->save();

    $can_like = json_decode(request()->cookie('can_like', '[]'), true);

    if(array_search($review->id, $can_like) === false) {
        $can_like[] = $review->id;
    }

    return back()->cookie(
        'can_like', json_encode($can_like), time() + (10 * 365 * 24 * 60 * 60)
    );
});

Route::get('/reviews/{review}/dislike', function(Request $request, Review $review) {

    $review->likes -= 1;
    $review->save();

    $can_like = json_decode(request()->cookie('can_like', '[]'), true);

    if(array_search($review->id, $can_like) === false) {
        $can_like[] = $review->id;
    }

    return back()->cookie(
        'can_like', json_encode($can_like), time() + (10 * 365 * 24 * 60 * 60)
    );
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->post('/favorite/{boutique}', function(Request $request, Boutique $boutique) {

    $user = Auth::user();
    
    $user->favorites()->create([
        'boutique_id' => $boutique->id
    ]);

    return redirect()->back();

});

Route::middleware('auth')->delete('/favorite/{boutique}', function(Request $request, Boutique $boutique) {

    $user = Auth::user();
        
    $user->favorites()->where('boutique_id', $boutique->id)->delete();

    return redirect()->back();

});

Route::get('/contacts', function(Request $request) {
    return view('contacts');
});

Route::get('/posts', function(Request $request) {
    $posts = Post::latest()->get();

    return view('posts', compact('posts'));
});

Route::get('/posts/{post}', function(Request $request, Post $post) {
    return view('post', compact('post'));
})->name('posts.show');

Route::post('/send', function(Request $request) {
    return redirect()->back();
})->name('send');

Route::post('/subscribe', function(Request $request) {

    $request->validate([
        'email' => 'required'
    ]);

    $model = Subscribe::create([
        'email' => $request->email
    ]);

    $request->session()->flash('message', __('Вы подписаны!'));

	return back();

})->name('subscribe');

Route::get('/search', function(Request $request) {

    $request->validate([
        'q' => 'required'
    ]);

    $search_query = $request->q;

    $models = Boutique::whereHas('products', function ($query) use ($search_query) {
        $query->where('name', 'like', '%'.$search_query.'%');
    })->orWhereHas('categories', function ($query) use ($search_query) {
        $query->where('name', 'like', '%'.$search_query.'%');
    })->orWhere('name', 'like', '%'.$search_query.'%')->get();

    return view('search', compact('search_query', 'models'));

})->name('search');


Route::get('/callback', function(Request $request) {
    
    $request->validate([
        'name' => 'required',
        'phone' => 'required',
    ]);

    $model = Callback::create([
        'name' => $request->name,
        'phone' => $request->phone,
    ]);

    return $model;
});