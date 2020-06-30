<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Repositories\Interfaces\RoleInterface;
use App\Models\Permission;
use App\Models\Role;
use Session;
use Illuminate\Support\Facades\Auth;
use Str;
use Carbon\Carbon;
use Mockery\Exception;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $roleRepo;
    //Goi ham khoi tao
    public function __construct(RoleInterface $roleRepository)
    {
        $this->roleRepo = $roleRepository;
        $this->middleware('auth');
    }
    public function index()
    {
        $roles = $this->roleRepo->getAll(); 
        return view('admin.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::pluck('label', 'id')->toArray();
        return view('admin.role.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $role = new Role([
            'name' => $request->name,
            'label' => $request->label
        ]);
        
        $result = $this->roleRepo->addNew($role);
        $permission_list = $request->permissions;
        $role->permission()->attach($permission_list);

        if ($result){
            return redirect('/admin/role')->with('message','Create New successfully!');
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
        $role = $this->roleRepo->getById($id); 
        return view('admin.role.detail',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::with('permission')->findOrFail($id);
         $permissions = Permission::pluck('label', 'id')->toArray();
        return view('admin.role.edit',compact('role','permissions'));
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
        $role = $this->roleRepo->getById($id);
        $role->name = $request->name;
        $role->label = $request->label;
        $role->updated_at = Carbon::now()->toDateTimeString(); 
        $result = $this->roleRepo->update($role);
        $permission_list = $request->permissions;
        $role->permission()->sync($permission_list);
        return redirect('admin/role')->with('message','Edit successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $role = $this->roleRepo->getById($request->id); 
        $result = $this->roleRepo->delete($role);
        if ($result) { 
            return back()->with('message','Delete success!');
        } else {
            return back()->with('err','Delete failse!');
        }
    }
}
