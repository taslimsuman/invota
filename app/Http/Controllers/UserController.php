<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Gate;
Use Auth;

class UserController extends Controller
{
    public function __construct(){

        $this->middleware(function ($request, $next) {
        
        if(!Gate::allows('isAdmin')){

            abort(404,"Sorry, You do not have access");
        }

        return $next($request);
    });
        
    }

   

    public function index()
    {

       

        $users = User::all();
        
        return view('admin.users.index',compact('users'));
    }

   
    public function create()
    {
        return view('admin.users.create');
    }

    
    public function store(Request $request)
    {
        
        

        $this->validate($request,[
            'name' => 'required|max:32',
            'username'=>'required|unique:users|max:12',
            'email'=>'required|unique:users|max:32',
            'password'=> 'required|max:32',
            'role_id'=>'required',


            ]);
        $data = new user;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->user_role = $request->user_role;
        $data->status = $request->status;

        $data->save();

        return redirect()->route('user.index')->with('success','User added successfully');


    }

    
    public function show($id)
    {
        $user = User::find($id);

        return view('admin.users.show',compact('user'));
       

    }

   
    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.users.edit',compact('user'));
    }

    
     
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|max:32',
            'username'=>'required|max:12',
            'email'=>'required|email|max:32',
            'user_role'=>'required',

            ]);

        $data = User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->user_role = $request->user_role;
        $data->status = $request->status?$request->status:0;

        $data->save();

        return redirect()->route('user.index')->with('success','User data updated successfully');


    }

   
    public function deleteuser(Request $r)
    {
        
        User::find($r->userid)->delete();

        return redirect()->route('user.index')->with('success','User has been deleted');
    }

    public function chageuserpass(Request $r){

        if($r->has('user_id') && $r->has('new_pass')){

            $user = User::find($r->user_id);

            if(isset($user)){

                $user->password = bcrypt($r->new_pass);

                $user->save();

                return back()->with('success','Password has been reset');
            }
        }

    }

}
