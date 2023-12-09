<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\Sessions\Store as StoreRequest;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class Sessions extends Controller
{
    public function create()
    {
        return view('auth.sessions.create');
    }

    public function store(StoreRequest $request) {
        $request->tryAuthUser();
        $request->session()->regenerate();
        return redirect()->intended(RouteServiceProvider::CARS);
    }

    public function destroy(Request $request) {

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('cars.index');
    }
}
