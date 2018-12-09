<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RentProduct;
use Illuminate\Support\Facades\Auth;
use App\BoughtProduct;

class RentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function search(Request $request)
    {
        $name = $request->get('name', null);

        $query = (new RentProduct())->newQuery();

        if ($name != null) {

            $query = $query->where('name', 'like', "%$name%");

        }

        return (['status' => true, 'products' => $query->get()]);
    }

    public function buyCart(Request $request)
    {
        $products = $request->get('products',null);
        $userId = Auth::user()->id;

        foreach ($products as $product)
        {
            $query = (new BoughtProduct())->fill([
               'id_product' => $products['id'],
                'id_user' => $userId,
                'buy_time' => date("Y-m-d H:i:s"),
                'end_time' => date('d.m.Y H:i:s', strtotime("+3 hours"))
            ]);
        }
    }
}
