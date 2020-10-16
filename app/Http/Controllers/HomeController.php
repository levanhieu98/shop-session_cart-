<?php

namespace App\Http\Controllers;

use App\product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $product=product::all();
        return view('home',compact('product'));
    }

    public function khoasanpham($id)
    {
        product::where('Id_product',$id)->update(['Trangthai'=>0]);
        return redirect('/home');
    }

    public function mosanpham($id)
    {
        product::where('Id_product',$id)->update(['Trangthai'=>1]);
        return redirect('/home');
    }

    public function danhsachkhachhang()
    {
        $us=User::where('role',0)->get();
        return view('danhsachkhachhang',compact('us'));
    }

    public function sanphamkhachhangban($id)
    {
        $pro=product::where('id_user',$id)->where('Trangthai',1)->get();
        return view('sanphamkhachhangban',compact('pro'));
    }

    public function khoasanphamKH($id,$idsp)
    {
        product::where('id_user',$id)->where('Id_product',$idsp)->update(['Trangthai'=>0]);
        // return redirect('/nhsachdakhachhang') ;
        return redirect()->route('sanphamkhachhangban', ['id' => $id]);
      
    }

    public function sanphamkhachhangmua($id)
    {
        $spm = DB::table('bill')
        ->join('totalbill', 'bill.Id_bill', '=', 'totalbill.Id_bill')->where('bill.id',$id )
        ->select('bill.Date', 'totalbill.Name_product', 'totalbill.price', 'totalbill.quantity')
        ->get();
        return view('sanphamnguoimua',compact('spm'));
    }
}
