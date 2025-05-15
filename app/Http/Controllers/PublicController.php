<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Social;

class PublicController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function show(User $user)
    {
        if(Auth::user()->name != $user->name) {
            return view('welcome');
        } else {
            $links = $user->links;
            return view('show', compact('user', 'links'));
        }
    }
}
