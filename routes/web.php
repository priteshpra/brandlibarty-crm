<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\EmailSettingsController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\KeywordController;
use App\Http\Controllers\ChatGPTController;
use App\Http\Controllers\PromptController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MozController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\SchedulingController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\AddblockController;
use App\Http\Controllers\OpenAIController;
use App\Models\Affiliate;
use Intervention\Image\Facades\Image;
// use Intervention\Image\Facades\Image as Image;
use GuzzleHttp\Client;
use App\Http\Controllers\FreepikController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(route('login'));
});

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['middleware' => ['auth', 'AdminPanelAccess']], function () {


    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('category', CategoryController::class);
    Route::resource('cms', CmsController::class);
    Route::resource('city', CityController::class);
    Route::resource('country', CountryController::class);
    Route::resource('language', LanguageController::class);
    Route::resource('pages', PagesController::class);
    Route::resource('state', StateController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('role', RoleController::class);
    Route::resource('changepassword', ChangePasswordController::class);
    Route::resource('settings', SettingsController::class);
    Route::resource('emailsettings', EmailSettingsController::class);
    Route::resource('roles', RoleController::class);
    Route::post('/admin/roles', [RoleController::class, 'store'])->name('admin.roles.store');
    Route::resource('keyword', KeywordController::class);
    Route::resource('permissions', PermissionController::class)->except(['show']);
    Route::get('/chat', [ChatGPTController::class, 'index']);
    Route::post('/chat/generate', [ChatGPTController::class, 'generate']);
    Route::post('/chat/generate2', [ChatGPTController::class, 'generate2']);
    Route::resource('prompt', PromptController::class);
    Route::resource('users', UsersController::class);
    Route::resource('project', ProjectController::class);
    Route::post('blog/blogcreate', [BlogController::class, 'blogcreate']);
    Route::resource('blog', BlogController::class);
    Route::resource('addblock', AddblockController::class);

    Route::resource('moz', MozController::class);
    Route::resource('email', EmailController::class);
    Route::resource('calendar', CalendarController::class);
    Route::resource('affiliate', AffiliateController::class);
    Route::resource('scheduling', SchedulingController::class);
    Route::get('/moz-keywords', [MozController::class, 'getKeywords']);
    Route::get('/getUserData', [UsersController::class, 'getUserData']);
    Route::get('/getPromptData', [PromptController::class, 'getPromptData']);
    Route::get('/getPromptDataByName', [PromptController::class, 'getPromptDataByName']);
    Route::get('/getDomainData', [BlogController::class, 'getDomainData']);
    Route::POST('/getBlogDisabled', [BlogController::class, 'getBlogDisabled']);
    Route::get('/getSettingsData', [SettingsController::class, 'getSettingsData']);
    Route::get('/savekeywordTitle', [MozController::class, 'savekeywordTitle']);

    Route::get('/openai-response', [OpenAIController::class, 'showForm'])->name('openai.showForm');
    Route::post('/openai/generate', [OpenAIController::class, 'generateText'])->name('openai.generateText');

    Route::get('/blog.create', function () {
        return view('blog/create');
    });

    Route::get('/generate-freepik', function () {
        return view('admin.freepik.generate');
    });
    // Route::post('/generate-image', [FreepikController::class, 'generate']);
    Route::post('blog/generate-image', [BlogController::class, 'generate'])->name('blog.generateText');
});
