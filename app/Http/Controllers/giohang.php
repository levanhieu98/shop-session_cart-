<?php

namespace App\Http\Controllers;

use App\category;
use App\product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class giohang extends Controller
{
    public function luugiohang(Request $rq)
    {
       
        $category = category::all();
        // $rq->session()->forget('giohang');
        $product = product::where('Id_product', $rq->idsp)->get();
        // dd( $rq->idsp);
        $cart = $rq->session()->get('giohang', []); //kiem gio hang chua co thi khoi tao mang rong

        $flag = false;

        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['id'] == $rq->idsp) {
                $cart[$i]['qty'] += 1;
                $flag = true;
            }
        }
        if ($flag == false) {
            $cart[] = array(
                "id" => $product[0]->Id_product,
                "img" => $product[0]->image,
                "name_product" => $product[0]->Ten_cproduct,
                "price" => $product[0]->price,
                "qty" => 1,
            );
        }
        //them moi vao session
        $rq->session()->put('giohang', $cart);
    
        //Tính tổng tiền giỏ hàng
        $tt = 0;
        // for ($i = 0; $i < count($cart); $i++) {
        //     $tt += $cart[$i]['price'] * $cart[$i]['qty'];
        // }
        foreach($cart as $pr)
        {
            $tt += $pr['price'] *$pr['qty'];
        }
        $rq->session()->put('tt', $tt);

        $rq->session()->flash('success', 'Thêm vào giỏ hàng thành công');


        return response()->json( $product = product::where('Id_product', $rq->idsp)->get());
        // return redirect('/home/trangchu');
    }

    public function xoasp(Request $rq, $id)
    {
        $tt = 0;
        $cart = $rq->session()->get('giohang', []);
        // for ($i = 0; $i < count($cart); $i++) {
        //     if ($cart[$i]['id'] == $id) 
        //     {
        //         $tt = $rq->session()->get('tt') - $cart[$i]['price'] * $cart[$i]['qty']; //lay tong gia tien - gia tien san pham da xoa
        //         unset($cart[$i]);
        //     }
        // }
        foreach ($cart as $key => $value) {
            if ($value['id'] == $id) {
                $tt = $rq->session()->get('tt') - $value['price'] * $value['qty'];  //lay tong gia tien - gia tien san pham da xoa      
                unset($cart[$key]);
            }
        }

        $rq->session()->put('tt', $tt); // them lai vao sestion
        $rq->session()->put('giohang', $cart); // them lai vao sestion

        return redirect('/home/xemgiohang');
    }


    public function thanhtoan()
    {
        $category = category::all();
        return view('thanhtoan', compact('category'));
    }

    public function luugiohangDB(Request $rq)
    {
        $cart = $rq->session()->get('giohang');
        for ($i = 0; $i < count($cart); $i++) {
            $idbill = DB::table('bill')->insertGetId([
                'Name' => $rq->customerName,
                'Date' => now(),
                'Addrees' => $rq->customerAddree,
                'Totalprice' => $rq->session()->get('tt'),
                'Trangthai' => 1,
                'id' => Auth::id(),
            ]);
            DB::table('totalbill')->insert(['Name_product' => $cart[$i]['name_product'], 'price' => $cart[$i]['price'], 'quantity' => $cart[$i]['qty'], 'Id_bill' => $idbill]);
        }
        $rq->session()->forget('giohang');
        return redirect('/home/trangchu');
    }

    public function sanphamdamua()
    {
        $category = category::all();
        $spm = DB::table('bill')
            ->join('totalbill', 'bill.Id_bill', '=', 'totalbill.Id_bill')->where('bill.id', Auth::id())
            ->select('bill.Date', 'totalbill.Name_product', 'totalbill.price', 'totalbill.quantity')
            ->get();
        //   dd($spm);
        return view('sanphamdamua', compact(['category', 'spm']));
    }

    public function donhangdattruoc()
    {
        $category = category::all();
        $oderbill = DB::select("SELECT
        *
    FROM
        bill
        INNER JOIN
        totalbill
        ON 
            bill.Id_bill = totalbill.Id_bill and bill.id!=" . Auth::id() . " WHERE totalbill.Name_product in(
    SELECT
        product.Ten_cproduct
    FROM
        users
        INNER JOIN
        product
        ON 
            users.id = product.id_user and product.id_user=" . Auth::id() . ")");
        // dd($oderbill);
        return view('xemdonhangdattruoc', compact(['category', 'oderbill']));
    }

    public function xemgiohang()
    {   $category = category::all();
        return view('hienthigiohang',compact('category'));
    }
}
