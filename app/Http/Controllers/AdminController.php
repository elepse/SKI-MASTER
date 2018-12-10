<?php

namespace App\Http\Controllers;

use App\RentProduct;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Image;
use App\BoughtProduct;
use Nexmo\Message\Query;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->role == 1) {
            return view('admin/dashBoard');
        } else {
            return redirect(route('rent'));
        }
    }

    public function products()
    {
        if (Auth::user()->role == 1) {
            return view('admin/products');
        } else {
            return redirect(route('rent'));
        }
    }

    public function getUsers(Request $request)
    {
        $name = $request->get('name', null);
        $email = $request->get('email', null);

        $query = (new User())->newQuery();

        if ($name != null) {
            $query = $query->where('name', 'like', "%$name%");
        }

        if ($email != null) {
            $query = $query->where('email', 'like', "%$email%");
        }

        return (['status' => true, 'users' => $query->get()]);
    }

    public function getBalanceUser(Request $request)
    {
        $id = $request->get('id', null);
        $query = (new User())->newQuery();
        $query = $query->where('id', '=', "$id");
        return (['status' => true, 'user' => $query->first()]);
    }

    public function addBalanceUser(Request $request)
    {
        $id = $request->get('id', null);
        $addBalance = $request->get('addBalance', 'null');

        $query = (new User());
        $query = $query->newQuery();
        $user = $query->where('id', '=', "$id")->first();
        $currentBalance = $user->balance;
        $status = $query->find($id)->fill([
            'balance' => $currentBalance + $addBalance
        ])->save();
        return (['status' => $status]);
    }

    public function getProducts(Request $request)
    {
        $name = $request->get('name', null);

        $query = (new RentProduct())->newQuery();
        if ($name != null) {
            $query = $query->where('name', 'like', "%$name%");
        }
        return (['status' => true, 'products' => $query->get()]);
    }

    public function addProduct(Request $request)
    {
        $name = $request->get('name');
        $price = $request->get('price');
        $path = 'http://127.0.0.1:8000/img/imageProducts/default.png';
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize('200', '200')->save(public_path('/img/imageProducts/' . $filename));
            $path = (asset("/img/imageProducts/" . $filename));
        }

        (new RentProduct())->fill([
            'name' => $name,
            'price' => $price,
            'image' => $path,
            'create_at' => date("Y-m-d H:i:s"),
            'edit_at' => date("Y-m-d H:i:s")
        ])->save();

        return redirect()->route('products');
    }

    public function getProduct(Request $request)
    {
        $id = $request->get('id', null);

        $query = (new RentProduct())->newQuery();
        $query = $query->where('id', '=', "$id");

        return (['status' => true, 'product' => $query->first()]);
    }

    public function editProduct(Request $request)
    {
        $name = $request->get('name');
        $price = $request->get('price');
        $id = $request->get('id');
        $path = 'http://127.0.0.1:8000/img/imageProducts/default.png';
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize('200', '200')->save(public_path('/img/imageProducts/' . $filename));
            $path = (asset("/img/imageProducts/" . $filename));
        }
        $query = (new RentProduct())->find($id)->fill([
            'name' => $name,
            'price' => $price,
            'image' => $path,
            'edit_at' => date("Y-m-d H:i:s")
        ])->save();

        return redirect()->route('products');
    }

    public function deleteProduct(Request $request)
    {
        $id = $request->get('id', 'null');

        $query = (new RentProduct())->find($id)->delete();
        return (['status' => $query]);
    }

    public function getRentInfo(Request $request){
        $id = $request->get('id',null);

        $query = BoughtProduct::query()->join('rent_products','rent_products.id','=','bought_products.id_product');
        $query = $query->where('id_user','=',"$id");

        return['status'=>true,'products'=>$query->get()];
    }

    public function endTime(Request $request){
        $id = $request->get('id',null);

        (new BoughtProduct())->newQuery()->where('id_purchase','=',"$id")->update(array('end_time'=> date("Y-m-d H:i:s"),'status'=> 2));
        return(['status'=>true]);
    }

}
