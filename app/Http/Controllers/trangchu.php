<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\product;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class trangchu extends Controller
{
    public function index()
    {
        $category=category::all ();
        return view('trangchu',compact('category'));
    } 

    public function sanpham($id)
    {   $category=category::all ();
        $product=product::where('Id_category',$id)->where('Trangthai',1)->where('id_user','!=',Auth::id())->get();
        return view('sanpham',compact(['product','category']));
    } 

    public function themsanpham(Request $rq)
    {
        $ten=$rq->ten;
        $gia=$rq->gia;
        $loai=$rq->loaisp;
        $sl=$rq->sl;
        $tt=1;
        if($rq->hasFile('hinh'))
		{
			$hinh=($rq->file('hinh'));
			$name=$hinh->getClientOriginalName();
			$tenh=str::random(4)."_".$name;      
			$hinh->move("frontend",$tenh);
        }
        DB::table('product')->insert(['Ten_cproduct'=>$ten,'price'=>$gia,'quantity'=>$sl,'image'=>$tenh,'Trangthai'=>1,'Id_category'=>$loai,'id_user'=>Auth::id()]);
        return redirect('/home/trangchu');
    }
    

    public function suathongtin(Request $rq)
    {
        User::where('id',Auth::id())->update(['name'=>$rq->tenUS]);
        return redirect('/home/trangchu');

        // dd($rq->tenUS);
    }
}
