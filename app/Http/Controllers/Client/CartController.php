<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ProductDetailInterface;
use App\Models\Product_detail;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Tag;

class CartController extends Controller
{ 
    private $productdetailRepo;
    //Goi ham khoi tao
    public function __construct(ProductDetailInterface $productdetailRepository)
    { 
        $this->productdetailRepo = $productdetailRepository;
        $categorys = Category::Where('isdelete',0)->get();
        $brands = Brand::Where('isdelete',0)->get();
        $tags = Tag::Where('isdelete',0)->get();
        view()->share(compact('categorys','brands','tags'));
    }
    public function index()
    {
        return view('client.cart.cart');
    }
    public function addToCart(Request $request)
    {   
    	$productdetail = Product_detail::where('product_id',$request->productid)->where('size',$request->size)->first(); 
        $product = Product::find($request->productid);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');  
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                $productdetail->id => [
                    "id" => $productdetail->id,
                    "name" => $product->name,
                    "slug" => $product->slug,
                    "quantity" => $request->quantity,
                    "price" => $productdetail->price,
                    "image" => $product->image,
                    "size" => $request->size,
                    "color" => $request->color
                ]
            ];
            session()->put('cart', $cart);  
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }  
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$productdetail->id])) {
            $cart[$productdetail->id]['quantity'] += $request->quantity;  
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart
        $cart[$productdetail->id] = [
            "id" => $productdetail->id,
            "name" => $product->name,
            "slug" => $product->slug,
            "quantity" => $request->quantity,
            "price" => $productdetail->price,
            "image" => $product->image,
            "size" => $request->size, 
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully'); 
        }
    }
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
