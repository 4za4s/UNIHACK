<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function searchName(Request $request)
    {
        if (request()->search) {
            $search = User::where('name', 'like', '%' . request()->search . '%')->get();
            return view('search')->with('search', $search);
        }
        else {
            return view('welcome');
        }
    }
}
