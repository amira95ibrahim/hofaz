<?php
// use App\Twilio\Rest\Client;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SadaqahController;
use App\Http\Controllers\Admin\IftarController;
use App\Http\Controllers\Admin\ZakahController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\PeriodicDonationController;
use App\Models\Category;

use App\Http\Controllers\Admin\MarketersController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\GiftController;
use App\Http\Controllers\Admin\KafalaTypeController;
use App\Http\Controllers\Admin\KafalaFieldsController;
use App\Http\Controllers\Admin\KafalaController;
use App\Http\Controllers\Admin\WaqfController;
use App\Http\Controllers\Admin\ReliefController;
use App\Http\Controllers\Admin\NavSectionController;
use App\Http\Controllers\Admin\PublicationController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\HomepageSliderController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\Admin\KafarahController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ElkherController;
use App\Http\Controllers\FacebookController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IftarfrontController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------

| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('web')->namespace('App\Http\Controllers')->group(function () {

    Route::get('/', 'HomeController@index')->name('home');
    // Route::post('/register', 'Auth\RegisterController@register')->name('register');
    // Route::post('/login', 'Auth\LoginController@signIn')->name('login');

    // Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    // Route::post('/logout', 'Auth\LoginController@logout')->name('logout.post');


    // ============================ login with facebook =================================================================


    // Route::get('login/facebook', [LoginController::class, 'redirectToFacebookProvider'])->name('login.facebook');
    // Route::post('login/facebook/callback', [LoginController::class, 'handleFacebookProviderCallback'])->name('login.facebook.callback');

    // Route::controller(FacebookController::class)->group(function(){
    //     Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    //     Route::get('auth/facebook/callback', 'handleFacebookCallback');
    // });

    Route::get('auth/facebook', 'FacebookController@redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'FacebookController@handleFacebookCallback');



    // ============================== End login with facebook ================================================================
    // Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    // Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    // Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    // Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

    // ================================== Start Forget Password ===================================================================================

    Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

    // ===================================== End Forget Password ===================================================================================


    Route::get('/sadaqa', 'SadaqahController@index')->name('sadaqa');
    Route::get('/zakah', 'ZakahController@index')->name('zakah');
    Route::get('/kafarahv', 'KafarahController@index')->name('kafarahv');
    Route::get('/iftar', 'IftarfrontController@index')->name('iftar');

    Route::get('/kafalat', 'KafalahController@index')->name('kafalat');
    Route::get('/sponsor-detail/{kafala}', 'KafalahController@show')->name('sponsorDetail');

    Route::get('/relief', 'ReliefController@index')->name('relief');
    Route::get('/relief/{relief}', 'ReliefController@show')->name('relief.show');

    Route::get('/waqf', 'WaqfController@index')->name('waqf');
    Route::get('/waqf/{waqf}', 'WaqfController@show')->name('waqf.show');

    Route::get('/kafarah', [KafarahController::class, 'index'])->name('admin.kafarah.index');
    // Route::get('/kafarah/{kafarah}', [KafarahController::class, 'edit'])->name('admin.kafarah.edit');
    //  Route::get('admin//kafarah', 'kafarahController@index')->name('kafarah');
    // Route::get('/kafarah/{kafarah}', 'kafarahController@show')->name('kafarah.show');

    Route::get('/projects', 'ProjectController@index')->name('projects');
    Route::get('/project/{project}', 'ProjectController@show')->name('project.show');
    Route::get('/projectCategory/{catid}', 'ProjectController@projectCategory')->name('project.category');


    Route::get('/gift', 'GiftController@index')->name('gift');
    Route::post('/gift/generate', 'GiftController@generate')->name('generate');
    Route::get('/gift-created-popup', 'GiftController@showGiftCreatedPopup')->name('gift-created-popup');

    Route::get('/donation', 'DonationController@index')->name('donation');
    Route::get('/search/{string}', 'SearchController@index')->name('search');

    Route::get('cart', 'CartController@cartList')->name('cart');
    Route::post('cart', 'CartController@addToCart')->name('cart.store');
    Route::post('update-cart', 'CartController@updateCart')->name('cart.update');
    Route::post('remove', 'CartController@removeCart')->name('cart.remove');
    Route::post('clear', 'CartController@clearAllCart')->name('cart.clear');

    Route::get('/publications', 'PublicationsController@index')->name('publications');
    Route::get('/news', 'NewsController@index')->name('news');
    Route::get('/news/{article}', 'NewsController@show')->name('news.details');

    //elhesab elkhairy
    Route::get('/online-service', [ElkherController::class, 'index'])->name('onlineService')->middleware(('frontend.auth'));;
    Route::get('/elkher_kafalat', [ElkherController::class, 'elkher_kafalat'])->name('elkherkafalat')->middleware(('frontend.auth'));;
    Route::get('/elkher_tabraat', [ElkherController::class, 'elkher_tabraat'])->name('elkhertabraat')->middleware(('frontend.auth'));;
    Route::get('/elkher_masert', [ElkherController::class, 'elkher_masert'])->name('elkhermasert')->middleware(('frontend.auth'));;
    Route::get('/elkher_arshef', [ElkherController::class, 'elkher_arshef'])->name('elkherarshef')->middleware(('frontend.auth'));;
    Route::get('/elkher_wakfyat', [ElkherController::class, 'elkher_wakfyat'])->name('elkherwakfyat')->middleware(('frontend.auth'));;
    Route::get('/elkher_mashroat', [ElkherController::class, 'elkher_mashroat'])->name('elkhermashroat')->middleware(('frontend.auth'));;

    Route::post('make-payment', 'MyFatoorahController@index')->name('make-payment');
    Route::post('initiate', 'MyFatoorahController@initiate')->name('initiate');


    Route::get('getPaymentMethods', 'MyFatoorahController@getPaymentMethods')->name('getPaymentMethods');
    Route::post('make-payment-signed', 'MyFatoorahController@index')->name('make-payment-signed'); //->middleware(('frontend.auth'));
    Route::post('PeriodicDonation', 'MyFatoorahController@createPeriodicDonation')->name('PeriodicDonation')->middleware(('frontend.auth'));
    Route::post('myfatoorah/callback/periodic', 'MyFatoorahController@callback_periodic')->name('myfatoorah.callback_periodic');
});

Route::namespace('App\Http\Controllers')->group(function () {
    Route::get('/payment', 'PaymentController@index')->name('payment');
    Route::get('/paymentfromcart', 'PaymentController@paymentfromcart')->name('paymentfromcart');
});



Route::get('/about-us', function () {
    $categories = Category::active()->take(7)->get();

    return view('front.aboutUs',compact('categories'));
})->name('aboutUs');

Route::get('/contact-us', function () {
    $categories = Category::active()->take(7)->get();

    return view('front.contactUs',compact('categories'));
})->name('contactUs');

Route::get('/sign-in', function () {
    $categories = Category::active()->take(7)->get();

    return view('front.signIn',compact('categories'));
})->name('signIn');

Route::get('/donation-methods', function () {
    $categories = Category::active()->take(7)->get();

    return view('front.donationMethods',compact('categories'));
})->name('donationMethods');

Route::get('/project-details', function () {
    $categories = Category::active()->take(7)->get();

    return view('front.details',compact('categories'));
})->name('projectDetails');

Route::get('/directors', function () {
    $categories = Category::active()->take(7)->get();

    return view('front.directors',compact('categories'));
})->name('directors');

Route::get('/teams', function () {
    $categories = Category::active()->take(7)->get();

    return view('front.teams',compact('categories'));
})->name('teams');

Route::get('lang/{lang}', [LangController::class, 'update'])->name('updateLang');

 Auth::routes();
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    // Auth::routes();
    Route::get('/', [HomeController::class, 'index'])->name('home');
    // COUNTRIES
    Route::resource('countries', CountryController::class)->except('show');
    // SADAQAH
    Route::resource('sadaqat', SadaqahController::class)->except(['show']);
    Route::post('sadaqat/status/{sadaqah}', [SadaqahController::class, 'changeStatus'])->name('sadaqat.status');
    Route::get('sadaqah-page', [SadaqahController::class, 'sadaqahDetails'])->name('sadaqahPage.edit');
    Route::patch('sadaqah-page', [SadaqahController::class, 'sadaqahDetailsUpdate'])->name('sadaqahPage.update');
    // iftar
    Route::resource('iftar', IftarController::class)->except(['show']);
    Route::post('iftar/status/{sadaqah}', [IftarController::class, 'changeStatus'])->name('iftar.status');
    Route::get('iftar-page', [IftarController::class, 'iftarDetails'])->name('iftarPage.edit');
    Route::patch('iftar-page', [IftarController::class, 'iftarDetailsUpdate'])->name('iftarPage.update');
    // ZAKAH
    Route::resource('zakat', ZakahController::class)->except(['show']);
    Route::post('zakat/status/{zakah}', [ZakahController::class, 'changeStatus'])->name('zakat.status');
    Route::get('zakah-page', [ZakahController::class, 'zakahDetails'])->name('zakahPage.edit');
    Route::patch('zakah-page', [ZakahController::class, 'zakahDetailsUpdate'])->name('zakahPage.update');
    // PROJECT
    Route::resource('projects', ProjectController::class)->except(['show']);
    Route::post('projects/status/{project}', [ProjectController::class, 'changeStatus'])->name('projects.status');
    Route::post('projects/homepage/{project}', [ProjectController::class, 'homepageUpdate'])->name('projects.homepage');
    Route::get('projects-page', [ProjectController::class, 'projectsDetails'])->name('projectsPage.edit');
    Route::patch('projects-page', [ProjectController::class, 'projectsDetailsUpdate'])->name('projectsPage.update');
     // periodicDonation
     Route::resource('periodicDonation', PeriodicDonationController::class)->except(['show']);
    //  Route::post('periodicDonation/status/{id}', [PeriodicDonationController::class, 'changeStatus'])->name('periodicDonation.status');
    //  Route::get('zakah-page', [PeriodicDonationController::class, 'zakahDetails'])->name('zakahPage.edit');
    //  Route::patch('zakah-page', [PeriodicDonationController::class, 'zakahDetailsUpdate'])->name('zakahPage.update');
    //Repote
    Route::resource('admin/reports', ReportsController::class);
    Route::get('reports', [ReportsController::class, 'index'])->name('reports');
    //Marketers
    Route::resource('admin/marketers', MarketersController::class);
    Route::post('marketers/status/{marketer}', [MarketersController::class, 'changeStatus'])->name('marketer.status');
    Route::get('marketer-edit/{marketer}', [MarketersController::class, 'edit'])->name('marketer.edit');
    Route::delete('marketer-delete/{marketer}', [MarketersController::class, 'destroy'])->name('delete');
    // GIFT
    Route::resource('gifts', GiftController::class)->only(['create', 'store']);
    // KAFALAH
    Route::resource('kafalaTypes', KafalaTypeController::class)->except('show');
    Route::resource('kafalaFields', KafalaFieldsController::class)->except('show');
    Route::resource('kafalat', KafalaController::class)->except(['show']);
    Route::post('kafalat/status/{kafala}', [KafalaController::class, 'changeStatus'])->name('kafalat.status');
    Route::get('kafalah-page', [KafalaController::class, 'kafalahDetails'])->name('kafalahPage.edit');
    Route::patch('kafalah-page', [KafalaController::class, 'kafalahDetailsUpdate'])->name('kafalahPage.update');
    Route::get('kafala-type/fields/{type}', [KafalaTypeController::class, 'getTypeFields'])->name('kafalaType.fields');
    // WAQF
    Route::resource('waqf', WaqfController::class)->except(['show']);
    Route::get('waqf-page', [WaqfController::class, 'waqfDetails'])->name('waqfPage.edit');
    Route::patch('waqf-page', [WaqfController::class, 'waqfDetailsUpdate'])->name('waqfPage.update');
    Route::post('waqf/status/{waqf}', [WaqfController::class, 'changeStatus'])->name('waqf.status');
    Route::post('waqf/homepage/{waqf}', [WaqfController::class, 'homepageUpdate'])->name('waqf.homepage');
    //Kafarah
    Route::resource('Kafarah', KafarahController::class)->except(['show']);
    Route::get('Kafarah-page', [KafarahController::class, 'KafarahDetails'])->name('KafarahPage.edit');
    Route::patch('Kafarah-page', [KafarahController::class, 'KafarahDetailsUpdate'])->name('KafarahPage.update');
    Route::post('Kafarah/status/{Kafarah}', [KafarahController::class, 'changeStatus'])->name('Kafarah.status');
    // Route::delete('Kafarah/destroy/{Kafarah}', [KafarahController::class, 'destroy'])->name('Kafarah.destroy');
    Route::post('Kafarah/homepage/{Kafarah}', [KafarahController::class, 'homepageUpdate'])->name('Kafarah.homepage');
    // RELIEF
    Route::resource('reliefs', ReliefController::class)->except(['show']);
    Route::get('relief-page', [ReliefController::class, 'reliefsDetails'])->name('reliefsPage.edit');
    Route::patch('relief-page', [ReliefController::class, 'reliefsDetailsUpdate'])->name('reliefsPage.update');
    Route::post('reliefs/status/{relief}', [ReliefController::class, 'changeStatus'])->name('reliefs.status');
    Route::post('reliefs/homepage/{relief}', [ReliefController::class, 'homepageUpdate'])->name('reliefs.homepage');
    //NAV SECTIONS
    Route::resource('navSections', NavSectionController::class)->only(['index', 'edit', 'update']);
    Route::post('navSections/status/{NavSection}', [NavSectionController::class, 'changeStatus'])->name('navSections.status');
    // PUBLICATIONS
    Route::resource('publications', PublicationController::class);
    Route::post('publications/homepage/{publication}', [PublicationController::class, 'homepageUpdate'])->name('publications.homepage');
    // NEWS
    Route::resource('news', NewsController::class);
    Route::post('news/homepage/{news}', [NewsController::class, 'homepageUpdate'])->name('news.homepage');
    // ACHIEVEMENTS
    Route::resource('achievements', AchievementController::class)->only(['index', 'edit', 'update', 'show']);
    // TESTIMONIALS
    Route::resource('testimonials', TestimonialController::class);
    // SUBSCRIBERS
    Route::resource('subscribers', SubscriberController::class);
    // SETTINGS
    Route::resource('settings', SettingController::class)->only('edit', 'update');
    Route::resource('homepageSliders', HomepageSliderController::class)->except('show');
    Route::post('homepageSliders/status/{homepageSlider}', [HomepageSliderController::class, 'changeStatus'])->name('homepageSliders.status');
    Route::resource('categories', CategoryController::class)->except('show');
    Route::post('categories/status/{category}', [CategoryController::class, 'changeStatus'])->name('categories.status');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::fallback(function () {
    return view('errors.404');
});
Route::get('/send-message', function () {
    $accountSid = 'AC995a83c77a83f7555c7ef81fecb05daa';
    $authToken = 'dee07cd8e23c6a2a133769770ed8a49d';
    $twilioNumber = 'whatsapp:+12568576201';
    $recipientNumber = 'whatsapp:+201558041433';

    // $client = new Client($accountSid, $authToken);
    $client = new \Twilio\Rest\Client($accountSid, $authToken);
    $message = $client->messages->create(
        $recipientNumber,
        [
            'from' => $twilioNumber,
            'body' => 'Hello, this is a message from my app!'
        ]
    );

    return response()->json([
        'message' => 'Message sent',
        'sid' => $message->sid
    ]);
});
