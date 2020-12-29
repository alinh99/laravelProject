<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Roomm;
use Session ;

class PageController extends Controller
{
    //
    public function getIndex(){
        $slide = Slide::all();
        $room = Roomm::all();
        $new_product = Product::where('new',1)->paginate(8);
        $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(4);
        $new_room = Roomm::all();
        return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai', 'room', 'new_room'));
    }

    public function getLoaiSp($type){
        // lay san pham hien thi theo loai
        $sp_theoloai=Product::where('id_type',$type)->limit(3)->get();

        //Lay san pham hien thi khac (<>) loai
        $sp_khac = Product::where('id_type','<>',$type)->limit(3)->get();

        //Lay san pham hien thi theo loai typeproduct cho menu ben trai
        $loai = ProductType::all();

        //Lay ten loai san pham moi khi chung ta chon danh muc loai san pham(phan menu ben trai)
        $loai_sp = ProductType::where('id',$type)->first();

        return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));

    }

    public function getChiTiet(Request $req){
        // lay san pham chi tiet, nghia la chung ta kich chuot vao 1 san pham thi no cho chi tiet san pham do theo id
        $sanpham = Product::where('id',$req->id)->first();

        // lay san pham lien quan, nghia la san pham tuong tu
        $sanpham_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(6);

        // lay san pham ban chay la san pham co truong new = 1
        $sanpham_banchay = Product::where('promotion_price','=',0)->paginate(3);

        // lay san pham moi nhat la san pham moi cap nhat
        $sp_new = Product::select('id','name', 'id_type', 'description', 'unit_price', 'promotion_price', 'image', 'unit', 'new', 'created_at', 'updated_at')->where('new', '>', 0)->orderBy('updated_at', 'ASC')->paginate(3);
        return view('page.chitiet_sanpham',compact('sanpham','sanpham_tuongtu', 'sanpham_banchay', 'sp_new'));
    }

    public function getLienHe(){
        return view('page.lienhe');
    }

    public function getGioiThieu(){
        return view('page.about');
    }

    public function getAddToCart(Request $request, $id){
        $product = Product::find($id);

        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
        Session::put('cart',$cart);

        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
					
    public function getIndexAdmin(){
        $new_rooms = Roomm::all();
        return view('Admin.admin')->with(['rooms'=>$new_rooms]);
    }

    public function getAdminAdd(){
        return view('Admin.formAdd');
    }

    public function postAdminAdd(Request $request){

        $room = new Roomm() ;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $fileName=$file->getClientOriginalName('image');
            $file->move('source/image/product',$fileName);
        }
        $file_name=null;
        if($request->file('image')!=null){
            $file_name=$request->file('image')->getClientOriginalName();
        }
        $room->name = $request->name;
        $room->image = $file_name;
        $room->id_type = $request->id_type;
        $room->price = $request->price;
        $room->number = $request->number;
        $room->area = $request->area;
        $room->save();
        return $this->getIndexAdmin();
    }
}
