<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $postcode = Auth::user()->postcode;
        } else {
            $postcode = "";
        }

        return view('homepage', compact('postcode'));
    }
}
