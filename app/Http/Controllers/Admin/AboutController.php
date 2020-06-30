<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AboutRequest;
use App\Repositories\Interfaces\AboutInterface;
use App\Models\About;
use Carbon\Carbon;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    //Khai bao Repository
    private $aboutRepo;
    //Goi ham khoi tao
    public function __construct(AboutInterface $aboutRepository)
    {
        $this->aboutRepo = $aboutRepository;
        $this->middleware('auth');
    }
    public function index()
    {
        $abouts = About::orderBy('created_at', 'desc')->where('isdelete',false)->get();
        return view('admin.about.index',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AboutRequest $request)
    {
        $request->validated();
        $nameimage=$request->logo->getClientOriginalName();
        $request->logo->move('images', $nameimage); 
        $about = new About([
            'title' => $request->title,
            'name' => $request->name,
            'phone' => $request->phone,
            'content' => $request->content,
            'email' => $request->email,
            'logo' => $nameimage,
            'address' => $request->address,
            'timeopen' => $request->timeopen,
            'timeclose' => $request->timeclose,
            'isdelete' => false,
            'isdisplay' => false,
        ]);
        $result = $this->aboutRepo->addNew($about);
        if ($result){
            return redirect('/admin/about')->with('message','Create New successfully!');
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
        $about = $this->aboutRepo->getById($id); 
        return view('admin.about.detail',compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $about = $this->aboutRepo->getById($id); 
        return view('admin.about.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AboutRequest $request, $id)
    { 
        if($request->hasFile('logo')){
            $imagename=$request->logo->getClientOriginalName();
            $request->logo->move('images', $imagename);
        }else{
            $imagename = $request->image;
        }
        $about = $this->aboutRepo->getById($id);
        $about->title = $request->title;
        $about->name = $request->name;
        $about->phone = $request->phone;
        $about->content = $request->content;
        $about->email = $request->email;
        $about->logo = $imagename;
        $about->address = $request->address;
        $about->timeopen = $request->timeopen;
        $about->timeclose = $request->timeclose;
        $about->updated_at = Carbon::now()->toDateTimeString(); 
        $result = $this->aboutRepo->update($about);
        return redirect('admin/about')->with('message','Edit successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    { 
        $about = $this->aboutRepo->getById($request->id); 
        $result = $this->aboutRepo->delete($about);
        if ($result) { 
            return back()->with('message','Delete success!');
        } else {
            return back()->with('err','Delete failse!');
        }
    }
}
