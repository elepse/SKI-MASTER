<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RentProduct;

class RentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public  function search(Request $request)
    {
        $name = $request->get('name',null);

        $query = (new RentProduct())->newQuery();

        if ($name != null){

        $query = $query->where('name','like',"%$name%");

        }

        return(['status' => true,'products' => $query->get()]);
    }
}
