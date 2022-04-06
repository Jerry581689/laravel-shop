<?php

namespace App\Http\Controllers;

use App\ProductModel;
use App\CartModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
{
    public function index()
    {
        $products = ProductModel::all();
        return view('shop', [
            'products' => $products,
        ]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required||max:255',
            'price' => 'required|numeric',
            'content' => 'required',
            'picture' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }
        //return response()->json(['success' => 'Added new records.']);


        $result = ProductModel::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'content' => $request->input('content'),
            'picture' => $request->input('picture'),
        ]);

        if ($result) {
            return response()->json([
                'states' => '新增成功',
            ]);
        } else {
            return response()->json([
                'states' => '新增失敗',
            ]);
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'price' => 'required|numeric',
        ]);

        if (!$validator->passes()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        $result = ProductModel::where('id', $request->input('id'))->update(['price' => $request->input('price')]);

        if ($result) {
            return response()->json([
                'success' => '修改成功',
            ]);
        } else {
            return response()->json([
                'failed' => '修改失敗',
            ]);
        }
    }

    public function destory(Request $request)
    {
        $id = $request->input('id');
        $result = ProductModel::where('id', $id)->delete();

        if ($result) {
            return response()->json([
                'states' => '刪除成功',
            ]);
        } else {
            return response()->json([
                'states' => '刪除失敗',
            ]);
        }
    }
}
