<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuccessController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->session()->has('message') === false) {
            return redirect('/');
        }

        return view('success');
    }
}
