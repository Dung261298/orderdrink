<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Repositories\Interfaces\TagInterface;
use App\Models\Tag;
use Session;
use Illuminate\Support\Facades\Auth;
use Str;
use Carbon\Carbon;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Khai bao Repository
    private $tagRepo;
    //Goi ham khoi tao
    public function __construct(TagInterface $tagRepository)
    {
        $this->tagRepo = $tagRepository;
        $this->middleware('auth');
    }
    public function index()
    {
        $tags = $this->tagRepo->getAll(); 
        return view('admin.tag.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $user = Auth::user();
        $tag = new Tag([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'isdelete' => false
        ]);
        $result = $this->tagRepo->addNew($tag);
        if ($result){
            return redirect('/admin/tag')->with('message','Create New successfully!');
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
        $tag = $this->tagRepo->getById($id); 
        return view('admin.tag.detail',compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = $this->tagRepo->getById($id); 
        return view('admin.tag.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        $tag = $this->tagRepo->getById($id);
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        $tag->updated_at = Carbon::now()->toDateTimeString();
        $result = $this->tagRepo->update($tag);
        return redirect('admin/tag')->with('message','Edit successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $tag = $this->tagRepo->getById($request->id); 
        $result = $this->tagRepo->delete($tag);
        if ($result) { 
            return back()->with('message','Delete success!');
        } else {
            return back()->with('err','Delete failse!');
        }
    }
}
