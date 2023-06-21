 <?php

use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SadaqahController;
use App\Http\Controllers\Admin\ZakahController;
use App\Http\Controllers\Admin\ProjectController;
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
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\HomepageSliderController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\Admin\KafarahController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('migrate', function (){
//     \Artisan::call('migrate', ['--force' => true]);
// });
// Auth::routes();
Route::middleware('web')->namespace('App\Http\Controllers')->group(function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::post('/register', 'Auth\RegisterController@register')->name('register');
    Route::post('/login', 'Auth\LoginController@signIn')->name('login');
    // Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout.post');

    Route::get('/sadaqa', 'SadaqahController@index')->name('sadaqa');
    Route::get('/zakah', 'ZakahController@index')->name('zakah');

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

    Route::get('/gift', 'GiftController@index')->name('gift');
    Route::get('/donation', 'DonationController@index')->name('donation');
    Route::get('/search/{string}', 'SearchController@index')->name('search');

    Route::get('cart', 'CartController@cartList')->name('cart');
    Route::post('cart', 'CartController@addToCart')->name('cart.store');
    Route::post('update-cart', 'CartController@updateCart')->name('cart.update');
    Route::post('remove', 'CartController@removeCart')->name('cart.remove');
    Route::post('clear', 'CartController@clearAllCart')->name('cart.clear');

    Route::get('/payment', 'PaymentController@index')->name('payment');

    Route::get('/publications', 'PublicationsController@index')->name('publications');

    Route::get('/news', 'NewsController@index')->name('news');
    Route::get('/news/{article}', 'NewsController@show')->name('news.details');

    Route::get('payment/index', 'MyFatoorahController@index');
});




Route::get('/iftar', function () {
    return view('front.iftar');
})->name('iftar');

Route::get('/online-service', function () {
    return view('front.onlineService');
})->name('onlineService');

Route::get('/about-us', function () {
    return view('front.aboutUs');
})->name('aboutUs');

Route::get('/contact-us', function () {
    return view('front.contactUs');
})->name('contactUs');

Route::get('/sign-in', function () {
    return view('front.signIn');
})->name('signIn');

Route::get('/donation-methods', function () {
    return view('front.donationMethods');
})->name('donationMethods');

Route::get('/project-details', function () {
    return view('front.details');
})->name('projectDetails');

Route::get('/directors', function () {
    return view('front.directors');
})->name('directors');

Route::get('/teams', function () {
    return view('front.teams');
})->name('teams');



Route::get('lang/{lang}', [LangController::class, 'update'])->name('updateLang');

// Auth::routes();

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    // COUNTRIES
    Route::resource('countries', CountryController::class)->except('show');

    // SADAQAH
    Route::resource('sadaqat', SadaqahController::class)->except(['show', 'destroy']);
    Route::post('sadaqat/status/{sadaqah}', [SadaqahController::class, 'changeStatus'])->name('sadaqat.status');
    Route::get('sadaqah-page', [SadaqahController::class, 'sadaqahDetails'])->name('sadaqahPage.edit');
    Route::patch('sadaqah-page', [SadaqahController::class, 'sadaqahDetailsUpdate'])->name('sadaqahPage.update');

    // ZAKAH
    Route::resource('zakat', ZakahController::class)->except(['show', 'destroy']);
    Route::post('zakat/status/{zakah}', [ZakahController::class, 'changeStatus'])->name('zakat.status');
    Route::get('zakah-page', [ZakahController::class, 'zakahDetails'])->name('zakahPage.edit');
    Route::patch('zakah-page', [ZakahController::class, 'zakahDetailsUpdate'])->name('zakahPage.update');

    // PROJECT
    Route::resource('projects', ProjectController::class)->except(['show', 'destroy']);
    Route::post('projects/status/{project}', [ProjectController::class, 'changeStatus'])->name('projects.status');
    Route::post('projects/homepage/{project}', [ProjectController::class, 'homepageUpdate'])->name('projects.homepage');
    Route::get('projects-page', [ProjectController::class, 'projectsDetails'])->name('projectsPage.edit');
    Route::patch('projects-page', [ProjectController::class, 'projectsDetailsUpdate'])->name('projectsPage.update');

    // GIFT
    Route::resource('gifts', GiftController::class)->only(['create', 'store']);

    // KAFALAH
    Route::resource('kafalaTypes', KafalaTypeController::class)->except('show');
    Route::resource('kafalaFields', KafalaFieldsController::class)->except('show');
    Route::resource('kafalat', KafalaController::class)->except(['show', 'destroy']);
    Route::post('kafalat/status/{kafala}', [KafalaController::class, 'changeStatus'])->name('kafalat.status');
    Route::get('kafalah-page', [KafalaController::class, 'kafalahDetails'])->name('kafalahPage.edit');
    Route::patch('kafalah-page', [KafalaController::class, 'kafalahDetailsUpdate'])->name('kafalahPage.update');
    Route::get('kafala-type/fields/{type}', [KafalaTypeController::class, 'getTypeFields'])->name('kafalaType.fields');

    // WAQF
    Route::resource('waqf', WaqfController::class)->except(['show', 'destroy']);
    Route::get('waqf-page', [WaqfController::class, 'waqfDetails'])->name('waqfPage.edit');
    Route::patch('waqf-page', [WaqfController::class, 'waqfDetailsUpdate'])->name('waqfPage.update');
    Route::post('waqf/status/{waqf}', [WaqfController::class, 'changeStatus'])->name('waqf.status');
    Route::post('waqf/homepage/{waqf}', [WaqfController::class, 'homepageUpdate'])->name('waqf.homepage');

    //Kafarah
    Route::resource('Kafarah', KafarahController::class)->except(['show', 'destroy']);
    Route::get('Kafarah-page', [KafarahController::class, 'KafarahDetails'])->name('KafarahPage.edit');
    Route::patch('Kafarah-page', [KafarahController::class, 'KafarahDetailsUpdate'])->name('KafarahPage.update');
    Route::post('Kafarah/status/{Kafarah}', [KafarahController::class, 'changeStatus'])->name('Kafarah.status');
    Route::post('Kafarah/homepage/{Kafarah}', [KafarahController::class, 'homepageUpdate'])->name('Kafarah.homepage');

    // RELIEF
    Route::resource('reliefs', ReliefController::class)->except(['show', 'destroy']);
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

});
Route::fallback(function () {
    return view('errors.404');
});
