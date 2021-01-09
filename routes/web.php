<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SendToViewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContinentController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\StudentsModelController;
use App\Http\Controllers\SessionCookieController;
use App\Http\Controllers\UploadFileController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth\ChangePasswordController;
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
    return view('welcome');//view
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/mission', function () {
    return view('about.mission');
});
Route::get('/welcome', function () {
    //text
    return "Welcome to Laravel";
});
Route::get('/r', function () {
    //redirect
    return redirect('/about');
});


Route::get("/about/mission","App\Http\Controllers\AboutController@mission");
//Route::get("/about/vision","App\Http\Controllers\AboutController@vision");
Route::get("/about/vision",[AboutController::class,'vision']);



Route::get("/news",[NewsController::class,'index']);
Route::get("/news/{id}",[NewsController::class,'details']);




Route::get("blog",[BlogController::class,'index']);
Route::get("blog/contact",[BlogController::class,'contact'])->name('blog-contact');
Route::get("blog/about",[BlogController::class,'about'])->name('blog-about');
Route::get("blog/{id}",[BlogController::class,'details'])->name('blog-details');



Route::middleware(['auth'])->group(function () {
    Route::get("send-to-view",[SendToViewController::class,'index']);
    Route::get("send-to-view/with",[SendToViewController::class,'usingWith']);
    Route::get("send-to-view/with-name",[SendToViewController::class,'usingWithName']);
    Route::get("send-to-view/compact",[SendToViewController::class,'usingCompact']);



    Route::resource("products",ProductController::class);
    /*Route::get("products",[ProductController::class,"index"]);
    Route::get("products/create",[ProductController::class,"create"]);
    Route::get("products/{id}",[ProductController::class,"show"]);
    Route::post("products",[ProductController::class,"store"]);
    Route::get("products/{id}/edit",[ProductController::class,"edit"]);
    Route::put("products/{id}",[ProductController::class,"update"]);
    Route::delete("products/{id}",[ProductController::class,"destroy"]);*/


    Route::resource("continents",ContinentController::class);
    Route::resource("students",StudentsController::class);
    Route::get("students/{id}/delete",[StudentsController::class,'destroy'])->name("students.delete");



    Route::get("students-model/paging",[StudentsModelController::class,'paging'])->name("students-paging");
    Route::get("students-model/search",[StudentsModelController::class,'search'])->name("students-search");
    Route::get("students-model/search-paging",[StudentsModelController::class,'searchPaging'])->name("students-search-paging");
    Route::get("students-model/search-paging-advanced",[StudentsModelController::class,'searchPagingAdvanced'])->name("students-search-paging-advanced");
    Route::resource("students-model",StudentsModelController::class);
    Route::get("students-model/{id}/delete",[StudentsModelController::class,'destroy'])->name("students-model.delete");


    Route::get("session/login",[SessionCookieController::class,'sessionLogin'])->name("session-login");
    Route::post("session/login",[SessionCookieController::class,'sessionPostLogin'])->name("session-post-login");
    Route::get("session/signout",[SessionCookieController::class,'sessionSignout'])->name("session-signout");
    Route::get("session/secure",[SessionCookieController::class,'sessionSecurePage'])->name("session-secure");



    Route::get("cookies/login",[SessionCookieController::class,'cookiesLogin'])->name("cookies-login");
    Route::post("cookies/login",[SessionCookieController::class,'cookiesPostLogin'])->name("cookies-post-login");
    Route::get("cookies/signout",[SessionCookieController::class,'cookiesSignout'])->name("cookies-signout");
    Route::get("cookies/secure",[SessionCookieController::class,'cookiesSecurePage'])->name("cookies-secure");

    Route::get("upload-file",[UploadFileController::class,'uploadFile'])->name('upload-file');
    Route::post("upload-file",[UploadFileController::class,'postUploadFile'])->name('post-upload-file');
    Route::get("download-private",[UploadFileController::class,'getSecureFile'])->name('download-private');

    
    Route::get("change-password",[ChangePasswordController::class,'changePassword'])->name('change-password');
    Route::post("change-password",[ChangePasswordController::class,'postChangePassword'])->name('post-change-password');
    
    Route::resource("users",UsersController::class);
    Route::get("users/{id}/delete",[UsersController::class,'destroy'])->name("users.delete");
    
    
    Route::resource("articles",ArticlesController::class);
    Route::get("articles/{id}/delete",[ArticlesController::class,'destroy'])->name("students-model.delete");

});


/*Auth Routes */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
