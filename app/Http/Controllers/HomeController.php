<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        return view('home', [
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'max:255',
            'phone' => 'numeric',
        ]);

        if (!$validator->passes()) {
            return response()->json(['ERROR' => $validator->errors()->all()]);
        }

        $result= DB::table('users')->where('id', Auth::id())->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            ]);

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

}
