<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dog;
use App\Http\Controllers\Admin\Litter;
use App\Http\Controllers\Admin\Puppy;
use App\Http\Controllers\Admin\Photo;


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

Route::group(['prefix' => '{locale}', 'where' => ['locale' => '[a-zA-Z]{2}'], 'middleware' => 'setlocale'], function () {
    Route::get('/', [\App\Http\Controllers\SiteController::class,'__invoke'])->name('main');
});

Route::group(['prefix' => '', 'middleware' => 'detectlocale'], function () {
    Route::get('/', function () {
        return redirect(app()->getLocale());
    });
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', [\App\Http\Controllers\Admin\IndexController::class, '__invoke'])->name('admin');

    Route::group(['namespace' => 'Dog', 'prefix' => 'dog'], function () {
        Route::get('/', [Dog\IndexController::class, '__invoke'])->name('admin.dogs');
        Route::get('/create', function () {
            return view('admin.dogs.create');
        })->name('admin.dog.create');
        Route::post('/create', [Dog\StoreController::class, '__invoke'])->name('admin.dog.create');
        Route::get('/{dog}', [Dog\ShowController::class, '__invoke'])->name('admin.dog.show');
        Route::get('/{dog}/update', [Dog\EditController::class, '__invoke'])->name('admin.dog.edit');
        Route::patch('/{dog}/update', [Dog\UpdateController::class, '__invoke'])->name('admin.dog.update');
        Route::patch('/{dog}/update_show_on_site', [Dog\UpdateShowOnSiteController::class, '__invoke'])->name('admin.dog.update_show_on_site');
    });

    Route::group(['namespace' => 'Litter', 'prefix' => 'litter'], function () {
        Route::get('/', [Litter\IndexController::class, '__invoke'])->name('admin.litters');
        Route::get('/create', [Litter\CreateController::class, '__invoke'])->name('admin.litter.create');
        Route::post('/create', [Litter\StoreController::class, '__invoke'])->name('admin.litter.store');
        Route::get('/{litter}', [Litter\ShowController::class, '__invoke'])->name('admin.litter.show');
        Route::get('/{litter}/update', [Litter\EditController::class, '__invoke'])->name('admin.litter.edit');
        Route::patch('/{litter}/update', [Litter\UpdateController::class, '__invoke'])->name('admin.litter.update');
        Route::patch('/{litter}/update_show_on_site', [Litter\UpdateShowOnSiteController::class, '__invoke'])->name('admin.litter.update_show_on_site');
    });

    Route::group(['namespace' => 'Puppy', 'prefix' => 'puppy'], function () {
        Route::get('/', [Puppy\IndexController::class, '__invoke'])->name('admin.puppies');
        Route::get('/create', [Puppy\CreateController::class, '__invoke'])->name('admin.puppy.create');
        Route::post('/store', [Puppy\StoreController::class, '__invoke'])->name('admin.puppy.store');
        Route::get('/{puppy}', [Puppy\ShowController::class, '__invoke'])->name('admin.puppy.show');
        Route::get('/{puppy}/update', [Puppy\EditController::class, '__invoke'])->name('admin.puppy.edit');
        Route::patch('/{puppy}/update', [Puppy\UpdateController::class, '__invoke'])->name('admin.puppy.update');
        Route::delete('/puppy_image/{puppy_image}', [Puppy\DestroyPuppyImageController::class, '__invoke'])->name('admin.puppy_image.destroy');
        Route::patch('/{puppy}/update_show_on_site', [Puppy\UpdateShowOnSiteController::class, '__invoke'])->name('admin.puppy.update_show_on_site');
        Route::patch('/{puppy}/available', [Puppy\UpdateAvailableController::class, '__invoke'])->name('admin.puppy.available');
    });
    Route::group(['namespace' => 'Photo', 'prefix' => 'photo'], function () {
        Route::get('/', [Photo\IndexController::class, '__invoke'])->name('admin.photo');
        Route::get('/create', function () {
            return view('admin.photos.create');
        })->name('admin.photo.create');
        Route::post('/store', [Photo\StoreController::class, '__invoke'])->name('admin.photo.store');
        Route::patch('/{photo}/update_show_on_site', [Photo\UpdateShowOnSiteController::class, '__invoke'])->name('admin.photo.update_show_on_site');
        Route::patch('/{photo}/change_order/{new_order_number}', [Photo\ChangeOrderController::class, '__invoke'])->name('admin.photo.change_order');
    });

});

\Illuminate\Support\Facades\Auth::routes();
Route::redirect('/register', '/login');
