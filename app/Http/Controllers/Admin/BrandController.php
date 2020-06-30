<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Repositories\Interfaces\BrandInterface;
use App\Models\Brand;
use Session;
use Illuminate\Support\Facades\Auth;
use Str;
use Carbon\Carbon;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Khai bao Repository
    private $brandRepo;
    //Goi ham khoi tao
    public function __construct(BrandInterface $brandRepository)
    {
        $this->brandRepo = $brandRepository;
        $this->middleware('auth');
    }
    public function index()
    {
        $brands = $this->brandRepo->getAll(); 
        return view('admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        $request->validated();
        $user = Auth::user();
        $nameimage=$request->logo->getClientOriginalName();
        $request->logo->move('imagesBrand', $nameimage);
        $brand = new Brand([
            'name' => $request->name,
            'logo' => $nameimage,
            'address' => $request->address,
            'phone_no' => $request->phone_no,
            'slug' => Str::slug($request->name),
            'isdelete' => false
        ]);
        $result = $this->brandRepo->addNew($brand);
        if ($result){
            return redirect('/admin/brand')->with('message','Create New successfully!');
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
        $brand = $this->brandRepo->getById($id); 
        return view('admin.brand.detail',compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = $this->brandRepo->getById($id); 
        return view('admin.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, $id)
    {
        if($request->hasFile('logo')){
            $imagename=$request->logo->getClientOriginalName();
            $request->logo->move('imagesBrand', $imagename);
        }else{
            $imagename = $request->image;
        }
        $brand = $this->brandRepo->getById($id);
        $brand->name = $request->name;
        $brand->phone_no = $request->phone_no;
        $brand->logo = $imagename;
        $brand->address = $request->address;
        $brand->slug = Str::slug($request->name);
        $brand->updated_at = Carbon::now()->toDateTimeString();
        $result = $this->brandRepo->update($brand);
        return redirect('admin/brand')->with('message','Edit successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $brand = $this->brandRepo->getById($request->id); 
        $brand->isdelete = true;
        $result = $this->brandRepo->update($brand);
        if ($result) { 
            return back()->with('message','Delete success!');
        } else {
            return back()->with('err','Delete failse!');
        }
    }
}
