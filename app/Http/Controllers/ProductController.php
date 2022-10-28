<?php

namespace App\Http\Controllers;

use Faker\Provider\UserAgent;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;


class ProductController extends Controller
{
    public function addP(Request $request)
    {
        $request->validate([
            'prod_name' => 'required',
            'prod_price' => 'required',
            'prod_pic' => 'required|image|mimes:jpeg,png,jpg,bmp,gif,svg',
        ]);


        $user=session()->get('user');
        $product=new Product();
        $product->product_name=$request->get('prod_name');
        $product->product_price=$request->get('prod_price');
        $img=$request->file('prod_pic')->getClientOriginalName();
        $request->prod_pic->move(public_path('image'), $img);
        $product->product_picture=$img;
        $result=$user->product()->save($product);
        if ($result) {
            return redirect()->back()->with('success', 'Your Product has been added');
        } else {
            return redirect()->back()->with('fail', 'Something Fishy !!');
        }
    }


        public function showP(Request $request)
        {
            $user=$request->session()->get('user')['id'];
            $data=Product::where('user_id', $user)->get();
            return view('showP', ['data'=>$data]);
        }


        public function delete()
        {
            Product::find(request('id'))->delete();
            return redirect('showP')->with('success', 'Your Product Has Been Deleted');
        }

        public static function countP()
        {
            $user=session()->get('user')['id'];
            return Product::where('user_id', $user)->count();
        }

        public function edit($id)
        {
            $data=Product::find($id);
            return view('edit', ['data'=>$data]);
        }

        public function updateP(Request  $request,$id)
        {
            $product=Product::find($id);
            $product->product_name=$request->get('prod_name');
            $product->product_price=$request->get('prod_price');
            $result=$product->save();
            if ($result) {
                return redirect('showP')->with('success', 'Your Product has been Updated');
            }
        }
}
