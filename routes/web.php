<?php

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
    $user = User::create($request->input());

    return redirect('/users');
});

Route::get('/settings', function () {
    return Inertia::render('Settings');
});

Route::post('/logout', function () {
    dd('log out', request('foo'));
});

//Resume: Episode 18, filtering
