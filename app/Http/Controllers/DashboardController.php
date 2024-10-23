<?php

namespace App\Http\Controllers;

use Auth;

class DashboardController extends Controller
{
    public function index() {
        $user = Auth::user();// Fetch all users (or use ->select('name') to get only names)
        return view('welcome', compact('user'));
        // return $user->name;
    }
}
