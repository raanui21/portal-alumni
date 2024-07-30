<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Mengambil data user yang sedang login
        return view('frontoffice.profile.index', compact('user'));
    }
}
