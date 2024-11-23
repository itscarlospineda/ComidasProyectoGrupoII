<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\RewardController;

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

// Rutas para Invitados o Usuarios sin Sesión Abierta
Route::middleware(['role:guest'])->group(function () {
    Route::get('/', [Controller::class, 'index'])->name('index');

    Route::get('/posts/{id}', [PostsController::class, 'read'])->name('posts.read');

    Route::get("/product/{dishId}",[ProductController::class, 'viewProduct'])->name("viewproduct");

    Route::get('/foods', [FoodController::class, "foods"])->name("foods");

    Route::get('/aboutus', [AboutusController::class, "aboutus"])->name("aboutus");

    Route::get('/admin/landing', function () {
        return view('landingadmin');
    });
});


//Rutas de Autenticación de Bootstrap/Laravel
Auth::routes();


// Rutas para Usuarios Autenticados
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::get('/userprofile/{id}', [ProfileController::class, 'edit'])->name('editusers.show');

    Route::get('/profile/upload', [ProfileController::class, 'showUploadForm'])->name('profile.upload.form');
    Route::post('/profile/{id}/upload', [ProfileController::class, 'uploadProfilePicture'])->name('profile.upload');
    Route::get('/profile/{UserId}/purchases',[ProfileController::class, 'purchases'])->name('purchases');


    Route::get("/rewards",[RewardController::class, 'rewards'])->name('rewards');
    Route::get("/rewards/claim/{rewardId}",[RewardController::class, 'claimreward'])->name('claimreward');
    Route::post("/rewards/claim/{rewardId}",[RewardController::class, 'savereward'])->name('savereward');

    Route::post("/product/{dishId}",[OrderController::class, "newOrder"])->name("newOrder");

    Route::get("/thanks/{orderId}",[OrderController::class, "thanks"])->name("thanks");

    Route::get("/thanksRewards/{claimId}",[RewardController::class, "thanksReward"])->name("thanksReward");

});


// Rutas para Empleados o Administradores
Route::middleware(['auth', 'role:admin'])->group(function () {
    //Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    /*Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::get('/userprofile/{id}', [ProfileController::class, 'edit'])->name('editusers.show');*/
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name("adminDashboard");
    Route::get("/admin/orders",[AdminController::class,"orders"])->name("adminOrders");
    Route::post("/admin/orders/{orderId}/ok",[AdminController::class,"okorder"])->name("okorder");
    Route::post("/admin/orders/{orderId}/cancel",[AdminController::class,"cancelorder"])->name("cancelorder");
    Route::get("/admin/record",[AdminController::class,"adminrecord"])->name("adminrecord");
    
    Route::get("/admin/users",[AdminController::class,"users"])->name("adminusers");
    Route::get("admin/users/profile/{UserId}",[AdminController::class,"usersProfile"])->name("AdminUsersProfile");

});


// Ruta para Restricciones de Contenido por Rol
Route::get('/not-found', function () {
    return view('unauthorized');
});


/*
Route::get('/', [Controller::class, 'index'])->name('index');
Auth::routes();


Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
Route::get('/userprofile/{id}', [ProfileController::class, 'edit'])->name('editusers.show');

Route::get('/profile/upload', [ProfileController::class, 'showUploadForm'])->name('profile.upload.form');
Route::post('/profile/{id}/upload', [ProfileController::class, 'uploadProfilePicture'])->name('profile.upload');
Route::get('/profile/{UserId}/purchases',[ProfileController::class, 'purchases'])->name('purchases');
Route::get('/posts/{id}', [PostsController::class, 'read'])->name('posts.read');

Route::get("/rewards",[RewardController::class, 'rewards'])->name('rewards');
Route::get("/rewards/claim/{rewardId}",[RewardController::class, 'claimreward'])->name('claimreward');
Route::post("/rewards/claim/{rewardId}",[RewardController::class, 'savereward'])->name('savereward');

Route::get("/product/{dishId}",[ProductController::class, 'viewProduct'])->name("viewproduct");
Route::post("/product/{dishId}",[OrderController::class, "newOrder"])->name("newOrder");

Route::get("/thanks/{orderId}",[OrderController::class, "thanks"])->name("thanks");

Route::get("/thanksRewards/{claimId}",[RewardController::class, "thanksReward"])->name("thanksReward");

Route::get('/aboutus', [AboutusController::class, "aboutus"])->name("aboutus");
Route::get("/admin/orders",[AdminController::class,"orders"])->name("adminOrders");
Route::post("/admin/orders/{orderId}/ok",[AdminController::class,"okorder"])->name("okorder");
Route::post("/admin/orders/{orderId}/cancel",[AdminController::class,"cancelorder"])->name("cancelorder");
Route::get("/admin/record",[AdminController::class,"adminrecord"])->name("adminrecord");

Route::get('/foods', [FoodController::class, "foods"])->name("foods");
*/
