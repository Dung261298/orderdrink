<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Repositories\Interfaces\ProductInterface;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Tag;
use Session;
use Illuminate\Support\Facades\Auth;
use Str;
use Carbon\Carbon;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Khai bao Repository
    private $productRepo;
    //Goi ham khoi tao
    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepo = $productRepository;
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $products = $this->productRepo->getAll(); 
        if ($request->searchname) {
            $products = Product::orderBy('created_at', 'desc')->where('isdelete',false)->where('name','like','%'.$request->searchname.'%')->get(); 
        } 
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = Brand::pluck('name','id')->toArray();
        $category = Category::pluck('name','id')->toArray();
        $tags = Tag::pluck('name','id')->toArray();
        return view('admin.product.create',compact('brand','category','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $request->validated();
        $nameimage=$request->logo->getClientOriginalName();
        $request->logo->move('imagesProduct', $nameimage); 
        $product = new Product([
            'product_code' => Str::random(10),
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'image' => $nameimage,
            'promotion' =>$request->promotion,
            'quantity' =>$request->quantity,
            'category_id' =>$request->category_id,
            'brand_id' =>$request->brand_id,
            'isdelete' => false,
            'isdisplay' => false
        ]);
        
        $result = $this->productRepo->addNew($product);
        $tag_list = $request->tags;
        $product->tag()->attach($tag_list);
        if ($result){
            return redirect('/admin/product')->with('message','Create New successfully!');
        }else{
            return back()->with('err','Save error!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->productRepo->getById($id); 
        return view('admin.product.detail',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $brand = Brand::pluck('name','id')->toArray();
        $category = Category::pluck('name','id')->toArray();
        $tags = Tag::pluck('name', 'id')->toArray();
        return view('admin.product.edit',compact('brand','category','product','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->hasFile('logo')){
            $imagename=$request->logo->getClientOriginalName();
            $request->logo->move('imagesProduct', $imagename);
        }else{
            $imagename = $request->image;
        }
        $product = $this->productRepo->getById($id);
        $product->product_code = $request->product_code;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->description = $request->description;
        $product->image = $imagename;
        $product->promotion = $request->promotion;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->isdisplay = $request->isdisplay;
        $product->updated_at = Carbon::now()->toDateTimeString(); 
        $result = $this->productRepo->update($product);
        $tag_list = $request->tags;
        $product->tag()->sync($tag_list);
        return redirect('admin/product')->with('message','Edit successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product = $this->productRepo->getById($request->id); 
        $result = $this->productRepo->delete($product);
        if ($result) { 
            return back()->with('message','Delete success!');
        } else {
            return back()->with('err','Delete failse!');
        }
    }
}
