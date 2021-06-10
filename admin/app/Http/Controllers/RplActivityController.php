<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\RplActivity as RplActivityResource;
use App\Models\RplActivity;
use Illuminate\Support\Facades\Cache;

class RplActivityController extends Controller
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
            $rplActivities = RplActivityResource::collection(RplActivity::all());
            return view('rplActivity.rplActivity', compact('rplActivities'));
            
        }catch (Exception $e) {
            abort($e->getCode());
        } 
        
    }

    public function formAdd()
    {
        try{
            return view('rplActivity.addRplActivity');
            
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
                'photo' => 'required',
                'title' => 'required|max:25',
                'description' => 'required|max:255',
                'textIndication' => 'required|max:15',
                'status' => 'required'
            ]);
            $rplActivity = new RplActivity([
                'photo' => $request->photo,
                'title' => $request->title,
                'description' => $request->description,
                'textIndication' => $request->textIndication,
                'status' => $request->status,
            ]);
            $rplActivity->save();
            Cache::forget('rplActivity');
    
            return redirect('/admin/rplActivity')->with('success', 'RPL activity saved!');
            
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
            $rplActivity = new RplActivityResource(RplActivity::findOrFail($id));
            return view('rplActivity.editRplActivity', compact('rplActivity')); 
            
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
                'photo' => 'required',
                'title' => 'required|max:25',
                'description' => 'required|max:255',
                'textIndication' => 'required|max:15',
                'status' => 'required',
            ]);
    
            $rplActivity = RplActivity::findOrFail($id);
    
            $rplActivity->photo = $request->photo;
            $rplActivity->title = $request->title;
            $rplActivity->description = $request->description;
            $rplActivity->textIndication = $request->textIndication;
            $rplActivity->status = $request->status;
    
            $rplActivity->save();
            Cache::forget('rplActivity');

            // $rplActivityInfo = Cache::remember('rplActivity', 3600, function() use ($id) {
            //     return json_encode(RplActivity::find($id)->toArray());                                                                                                                                                              
            // });

            return redirect('/admin/rplActivity')->with('success', 'RPL activity updated!');
                                              
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
            $rplActivity = RplActivity::findOrFail($id);
            $rplActivity->delete();
            Cache::forget('rplActivity');

            return redirect('/admin/rplActivity')->with('success', 'RPL activity deleted!');
            
        }catch (Exception $e) {
            abort($e->getCode());
        } 
  
    }
}

