<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $users = UserResource::collection(User::all());
            return view('admin.adminManagement', compact('users'));
            
        }catch (Exception $e) {
            abort($e->getCode());
        } 
        
    }

    public function formAdd()
    {
        try{
            return view('admin.addAdmin');
            
        }catch (Exception $e) {
            abort($e->getCode());
        } 
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'role' => 'required',
                'status' => 'required'
            ]);
            $user = new User([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'status' => $request->status
            ]);
            
            $user->save();
            // Cache::forget('feature');
    
            return redirect('/admin/adminManagement')->with('success', 'Admin saved!');
            
        }catch (Exception $e) {
            abort($e->getCode());
        } 
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $user = new UserResource(User::findOrFail($id));
            return view('admin.editAdmin', compact('user')); 
            
        }catch (Exception $e) {
            abort($e->getCode());
        } 
        
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
        try{
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'role' => 'required',
                'status' => 'required'
            ]);
    
            $user = User::findOrFail($id);
    
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->status = $request->status;
    
            $user->save();
            // Cache::forget('feature');
    
            return redirect('/admin/adminManagement')->with('success', 'Admin updated!');
            
        }catch (Exception $e) {
            abort($e->getCode());
        } 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $user = User::findOrFail($id);
            $user->delete();
            // Cache::forget('feature');

            return redirect('/admin/adminManagement')->with('success', 'Admin deleted!');
            
        }catch (Exception $e) {
            abort($e->getCode());
        } 
         
    }
}
