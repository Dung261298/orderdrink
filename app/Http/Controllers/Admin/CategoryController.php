<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Repositories\Interfaces\CategoryInterface;
use App\Models\Category;
use Session;
use Illuminate\Support\Facades\Auth;
use Str;
use Carbon\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Khai bao Repository
    private $categoryRepo;
    //Goi ham khoi tao
    public function __construct(CategoryInterface $categoryRepository)
    {
        $this->categoryRepo = $categoryRepository;
        $this->middleware('auth');
    }
    public function index()
    {
        $categories = $this->categoryRepo->getAll(); 
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $user = Auth::user();
        $request->validated();
        $category = new Category([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'isdelete' => false
        ]);
        $result = $this->categoryRepo->addNew($category);
        if ($result){
            return redirect('/admin/category')->with('message','Create New successfully!');
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
        $category = $this->categoryRepo->getById($id); 
        return view('admin.category.detail',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepo->getById($id); 
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $request->validated();
        $category = $this->categoryRepo->getById($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->updated_at = Carbon::now()->toDateTimeString();
        $category->description = $request->description;
        $result = $this->categoryRepo->update($category);
        return redirect('admin/category')->with('message','Edit successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category = $this->categoryRepo->getById($request->id); 
        $result = $this->categoryRepo->delete($category);
        if ($result) { 
            return back()->with('message','Delete success!');
        } else {
            return back()->with('err','Delete failse!');
        }
    }
}
