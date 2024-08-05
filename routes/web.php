<?php

use App\Http\Controllers\LoginController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
    $categories = DB::table('categories')->get();
    $phones = DB::table('phones')->latest()->take(4)->get();
    $phones1 = DB::table('phones')->get();
    return view('trangchu', compact('categories', 'phones', 'phones1'));
})->name('trangchu');

Route::get('/phones/category/{category}', function ($category) {
    $categoryName = DB::table('categories')->where('id', $category)->value('name');
    $phones = DB::table('phones')
        ->where('cate_id', $category)
        ->get();
    return view('category', compact('phones', 'categoryName'));
})->name('dm');

Route::get('/phone/{id}', function ($id) {
    $phone = DB::table('phones')
        ->join('categories', 'phones.cate_id', '=', 'categories.id')
        ->where('phones.id', $id)
        ->first();
    $relatedProducts = DB::table('phones')->where('cate_id', $phone->cate_id)
        ->where('id', '!=', $id)
        ->latest()
        ->take(4)
        ->get();
    return view('show', compact('phone', 'relatedProducts'));
})->name('show');
Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/user', [LoginController::class, 'all'])->name('user.all');
    Route::get('/user/edit', [LoginController::class, 'edit'])->name('user.edit');
    Route::post('/user/update', [LoginController::class, 'update'])->name('user.update');
    Route::get('/password/change', [LoginController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('/password/change', [LoginController::class, 'changePassword'])->name('password.update');

    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/phones', [LoginController::class, 'index'])->name('phone.index');
    Route::get('/create/phone', [LoginController::class, 'create'])->name('create.phone');
    Route::post('/create/phone', [LoginController::class, 'store'])->name('store.phone');
    Route::get('/phone/edit/{phone}', [LoginController::class, 'editp'])->name('phone.edit');
    Route::put('/phone/edit/{phone}', [LoginController::class, 'updatep'])->name('phone.update');
    Route::delete('/phone/delete/{phone}', [LoginController::class, 'destroy'])->name('phone.destroy');

    Route::get('/categories', [LoginController::class, 'cate'])->name('cate');
    Route::get('/create/category', [LoginController::class, 'createc'])->name('create.cate');
    Route::post('/create/category', [LoginController::class, 'storec'])->name('store.cate');
    Route::get('/category/edit/{category}', [LoginController::class, 'editc'])->name('category.edit');
    Route::put('/category/edit/{category}', [LoginController::class, 'updatec'])->name('category.update');
    Route::delete('/category/delete/{category}', [LoginController::class, 'destroyc'])->name('category.destroy');

    Route::get('/admin/users', [LoginController::class, 'alluadmin'])->name('admin.users.index');
    Route::post('/admin/users/{id}/toggle', [LoginController::class, 'toggleActivation'])->name('admin.users.toggle');
    Route::get('/admin/users/create', [LoginController::class, 'createu'])->name('admin.users.createu');
    Route::post('/admin/users/create', [LoginController::class, 'storeu'])->name('admin.users.storeu');

    Route::get('admin/user/edit/{user}', [LoginController::class, 'editu'])->name('user.editu');
    Route::put('admin/user/edit/{user}', [LoginController::class, 'updateu'])->name('user.updateu');
    Route::delete('admin/user/delete/{user}', [LoginController::class, 'destroyu'])->name('user.destroyu');

    Route::get('admin/password/change', [LoginController::class, 'showChangePasswordForma'])->name('admin.password.change');
    Route::post('admin/password/change', [LoginController::class, 'changePassworda'])->name('admin.password.update');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'postRegister'])->name('postRegister');
