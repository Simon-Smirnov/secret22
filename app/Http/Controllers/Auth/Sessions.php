<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\Sessions\Store as StoreRequest;

class Sessions extends Controller
{
    public function create()
    {
        return view('auth.sessions.create');
    }

    public function store(StoreRequest $request) {
        $request->tryAuthUser();
        $request->session()->regenerate();
        return redirect()->intended('cars.index');
    }

}
