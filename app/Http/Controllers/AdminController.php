<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/dashBoard');
    }

    public function getUsers(Request $request)
    {
        $name = $request->get('name',null);
        $email = $request->get('email',null);


    }
}
