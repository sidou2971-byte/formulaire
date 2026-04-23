<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $request->validate([
        'rc_part1' => 'required',
        'rc_part2' => 'required|in:A,B',
        'rc_part3' => 'required',
        'rc_part4' => 'required',
        'rc_part5' => 'required',
        'password' => 'required',
    ]);
    
    $full_rc = $request->rc_part1 . ' ' . $request->rc_part2 . ' ' . $request->rc_part3 . '-' . $request->rc_part4 . '/' . $request->rc_part5;
    
    if ($request->rc_part2 === 'A') {
        $message = "Vous avez un compte dans la plateforme fonctionnement equipement";
        $message_ar = "لديك حساب في منصة سير المعدات";
    } else {
        $message = "Vous avez un compte dans plateforme revente en l'etat";
        $message_ar = "لديك حساب في منصة البيع على الحالة";
    }

    session([
        'operator' => [
            'rc' => $full_rc,
            'raison_sociale' => 'ENTREPRISE IMPORT EXPORT ALGERIE SARL',
            'nombre_licences' => 3,
            'licences' => ['LIC-2025-001', 'LIC-2025-042', 'LIC-2025-089']
        ]
    ]);
    
    return redirect()->route('dashboard')->with('success', $message)->with('success_ar', $message_ar);
})->name('login.post');

Route::get('/dashboard', function () {
    if (!session('operator')) {
        return redirect()->route('login');
    }
    return view('dashboard', ['operator' => session('operator')]);
})->name('dashboard');

Route::get('/formulaire/{id}', function ($id) {
    if (!session('operator')) {
        return redirect()->route('login');
    }
    return view('formulaire', ['operator' => session('operator'), 'licence_id' => $id]);
})->name('formulaire');
