<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ProductDetailInterface;
use App\Models\Product;
use App\Models\Product_detail;
use Session;
use Illuminate\Support\Facades\Auth;
use Str;
use Carbon\Carbon;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Khai bao Repository
    private $product_detailRepo;
    //Goi ham khoi tao
    public function __construct(ProductDetailInterface $product_detailRepository)
    {
        $this->product_detailRepo = $product_detailRepository;
        $this->middleware('auth');
    }
    public function index()
    {
        $product_details = $this->product_detailRepo->getAll(); 
        return view('admin.product_detail.index',compact('product_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::pluck('name','id')->toArray();
        return view('admin.product_detail.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_detail = new Product_detail([
            'product_id' =>$request->product_id,
            'size' => $request->size,
            'price' =>$request->price,
            'isdelete' => false
        ]);
        
        $result = $this->product_detailRepo->addNew($product_detail);
        if ($result){
            return redirect('/admin/product_detail')->with('message','Create New successfully!');
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
        $product_detail = $this->product_detailRepo->getById($id); 
        return view('admin.product_detail.detail',compact('product_detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_detail = Product_detail::findOrFail($id);
        $product = Product::pluck('name','id')->toArray();
        return view('admin.product_detail.edit',compact('product_detail','product'));
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
        $product_detail = $this->product_detailRepo->getById($id);
        $product_detail->product_id = $request->product_id;
        $product_detail->size = $request->size;
        $product_detail->price = $request->price;
        $product_detail->updated_at = Carbon::now()->toDateTimeString(); 
        $result = $this->product_detailRepo->update($product_detail);
        return redirect('admin/product_detail')->with('message','Edit successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product_detail = $this->product_detailRepo->getById($request->id); 
        $result = $this->product_detailRepo->delete($product_detail);
        if ($result) { 
            return back()->with('message','Delete success!');
        } else {
            return back()->with('err','Delete failse!');
        }
    }
}
