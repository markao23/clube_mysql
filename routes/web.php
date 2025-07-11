<?php

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    
    // VERIFIQUE ESTA LINHA COM ATENÇÃO MÁXIMA
    $totalCaixa = DB::table('vendas')->sum('valor_total'); // <-- Deve ser 'valor_total'

    $novosUsuarios = DB::table('users')->where('created_at', '>=', now()->subDays(30))->count();
    $totalProdutos = DB::table('produtos')->count();

    return view('dashboard', [
        'totalCaixa' => $totalCaixa,
        'novosUsuarios' => $novosUsuarios,
        'totalProdutos' => $totalProdutos,
    ]);
});
