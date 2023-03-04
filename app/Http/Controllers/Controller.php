<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function search(Request $request)
    {
        if ($request -> search)
        {
            $search = User::where('name', 'like', '%' . $request -> search . '%') -> get();
            return view('welcome')->with($search);
        }
        else
        {
            return view('welcome');
        }
    }
}
