<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Repositories\Interfaces\UserInterface;
use App\Models\User;
use App\Models\Role;
use Session;
use Illuminate\Support\Facades\Auth;
use Str;
use Carbon\Carbon;
use Mockery\Exception;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $userRepo;
    //Goi ham khoi tao
    public function __construct(UserInterface $userRepository)
    {
        $this->userRepo = $userRepository;
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::where('level','=','Admin')->get(); 
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id')->toArray();
        return view('admin.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $request->validated();
        $nameimage=$request->image->getClientOriginalName();
        $request->image->move('imagesUser', $nameimage); 
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'image' => $nameimage,
            'password' =>bcrypt($request->password),
            'level' => 'Admin'
        ]);
        
        $result = $this->userRepo->addNew($user);
        $role_list = $request->roles;
        $user->role()->attach($role_list);

        if ($result){
            return redirect('/admin/user')->with('message','Create New successfully!');
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
        $user = $this->userRepo->getById($id); 
        return view('admin.user.detail',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('role')->findOrFail($id);
         $roles = Role::pluck('name', 'id')->toArray();
        return view('admin.user.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $request->validated();
        if($request->hasFile('logo')){
            $imagename=$request->image->getClientOriginalName();
            $request->image->move('imagesUser', $imagename);
        }else{
            $imagename = $request->image;
        }
        $user = $this->userRepo->getById($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->image = $imagename;
        $user->level = 'Admin';
        $user->password = bcrypt($request->password);
        $user->updated_at = Carbon::now()->toDateTimeString(); 
        $result = $this->userRepo->update($user);
        $role_list = $request->roles;
        $user->role()->sync($role_list);
        return redirect('admin/user')->with('message','Edit successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = $this->userRepo->getById($request->id); 
        $result = $this->userRepo->delete($user);
        if ($result) { 
            return back()->with('message','Delete success!');
        } else {
            return back()->with('err','Delete failse!');
        }
    }
}
