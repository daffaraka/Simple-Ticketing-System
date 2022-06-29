<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('admin.dashboard.users.users-index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.dashboard.users.users-create',compact('roles'));
    }
    
  
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('user.index')
                        ->with('success','User created successfully');
    }
    

    public function show($id)
    {
        $user = User::find($id);
        return view('admin.dashboard.user.user-show',compact('user'));
    }
    
  
    public function edit($id)
    {
        $this->data['user'] = User::find($id);
        $this->data['roles'] = Role::pluck('name','name')->all();
        $this->data['userRole'] = $this->data['user']->roles->pluck('name','name')->all();
    
        return view('admin.dashboard.user.user-edit',$this->data);
    }
    

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('user.index')
                        ->with('success','User updated successfully');
    }
    

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('user.index')->with('success','User deleted successfully');
    }
}
