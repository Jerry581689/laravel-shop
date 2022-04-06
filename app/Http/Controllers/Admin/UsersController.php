<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\ProductModel;

class UsersController extends Controller
{
    public function index()
    {
        $products = ProductModel::all();
        return view('admin/admin', [
            'products' => $products,
        ]);
        //$users = User::orderBy('created_at', 'desc')->get();
        //return view('admin.users.index')->withUsers($users);
    }
}
