<?php

namespace App\Http\Controllers;

use App\User;
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
        $sum = $request->get('sum', null);
        $userId = Auth::user()->id;
        $currentBalance = Auth::user()->balance;
        foreach ($products as $product)
        {
            $query = (new BoughtProduct())->fill([
               'id_product' => $product['id'],
                'id_user' => $userId,
                'buy_time' => date("Y-m-d H:i:s"),
                'status' => 1
            ])->save();
        }
        (new User())->find($userId)->fill([
            'balance' => $currentBalance - $sum
        ])->update();
        return(['status' => true]);
    }

    public function getMyProducts(Request $request)
    {
        $id = $request->get('id',null);
        $status = $request->get('status',null);
        $query = BoughtProduct::query()->join('rent_products','rent_products.id','=','bought_products.id_product');
        $query = $query->where('id_user','=',"$id");
        $query = $query->where('status','=',"$status");
        return(['status'=>true,'myProducts'=> $query->get()]);
    }
}
