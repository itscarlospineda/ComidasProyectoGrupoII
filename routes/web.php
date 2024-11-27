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
    Route::get('/aboutus', [AboutusController::class, "aboutus"])->name("aboutus");

    Route::get('/', [Controller::class, 'index'])->name('index');

    Route::get("/product/{dishId}",[ProductController::class, 'viewProduct'])->name("viewproduct"); 

    Route::get('/posts/{id}', [PostsController::class, 'read'])->name('posts.read');

    Route::get('/foods', [FoodController::class, "foods"])->name("foods"); //Vista de las comidas

});


//Rutas de Autenticación de Bootstrap/Laravel
Auth::routes();


// Rutas para Usuarios Autenticados
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::get('/userprofile/{id}', [ProfileController::class, 'edit'])->name('editusers.show');
    Route::put('/userprofile/{id}', [ProfileController::class, 'updateProfile'])->name('editusers.edit');
    
    Route::get('/profile/upload', [ProfileController::class, 'showUploadForm'])->name('profile.upload.form');
    Route::post('/profile/{id}/upload', [ProfileController::class, 'uploadProfilePicture'])->name('profile.upload');
    Route::get('/profile/{UserId}/purchases',[ProfileController::class, 'purchases'])->name('purchases');
    
    
    Route::get("/rewards",[RewardController::class, 'rewards'])->name('rewards');
    /*Route::get("/rewards/create",[RewardController::class, 'create'])->name('rewards.create');*/
    Route::get("/rewards/claim/{rewardId}",[RewardController::class, 'claimreward'])->name('claimreward');
    Route::post("/rewards/claim/{rewardId}",[RewardController::class, 'savereward'])->name('savereward');
    
    Route::post("/payment",[OrderController::class, "payment"])->name("payment");
    Route::get("success",[OrderController::class, "success"])->name("success");
    Route::get("cancel",[OrderController::class, "cancel"])->name("cancel");
    
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



    Route::get('/admin/foods/create', [FoodController::class, "create"])->name("foods.create"); //Vista creacion de comida
    Route::post('/admin/foods/store', [FoodController::class, "store"])->name("foods.store"); //Guardar comida
    Route::get("/admin/foods/view",[FoodController::class, 'view'])->name("foods.view"); //Vista (admin) de las comidas
    Route::get('/admin/foods/{id}/edit', [FoodController::class, 'edit'])->name('foods.edit'); //Vista de edicion de las comidas
    Route::put('/admin/foods/{id}', [FoodController::class, 'update'])->name('foods.update'); //Guardar cambios



    Route::get('/admin/posts/create', [PostsController::class, 'create'])->name('posts.create');
    Route::post('/admin/posts/store', [PostsController::class, 'store'])->name('posts.store');
    Route::get('/admin/posts/view', [PostsController::class, 'view'])->name('posts.view');
    Route::get('/admin/posts/{id}/edit', [PostsController::class, 'edit'])->name('posts.edit');
    Route::put('/admin/posts/{id}', [PostsController::class, 'update'])->name('posts.update');


    Route::get('/admin/rewards/create', [RewardController::class, 'create'])->name('rewards.create');
    Route::post('/admin/rewards/store', [RewardController::class, 'store'])->name('rewards.store');
    Route::get('/admin/rewards/view', [RewardController::class, 'view'])->name('rewards.view');
    Route::get('/admin/rewards/{id}/edit', [RewardController::class, 'edit'])->name('rewards.edit');
    Route::put('/admin/rewards/{id}', [RewardController::class, 'update'])->name('rewards.update');
    Route::get('/admin/rewards/{id}', [RewardController::class, 'read'])->name('rewards.read');
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
