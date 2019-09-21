<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return new UserResource(auth()->user());
    }
}
