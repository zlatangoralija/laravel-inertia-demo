<?php

use App\Http\Controllers\LoginController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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


Route::get('/login', [LoginController::class, 'auth'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function(){
    Route::get('/', function () {
        return Inertia::render('Home', [
            'time' => \Carbon\Carbon::now()->toTimeString(),
        ]);
    });

    Route::get('/users', function (Request $request) {
        return Inertia::render('Users/Index', [
            'users' => \App\Models\User::query()
                ->when($request->input('search'), function ($query) use ($request){
                    $query->where('name', 'LIKE', '%' . $request->input('search') . '%');
                })
                ->paginate(15)
                ->withQueryString()
                ->through(fn ($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                ]),
            'filters' => $request->only('search')
        ]);
    });

    Route::get('/users/create', function () {
        return Inertia::render('Users/Create');
    });

    Route::post('/users/', function (Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $user = User::create($validated);

        return redirect('/users');
    });

    Route::get('/settings', function () {
        return Inertia::render('Settings');
    });
});

//Resume: Episode 19 - 2:08, validation messages
