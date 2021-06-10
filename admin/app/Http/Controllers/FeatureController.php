<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Feature as FeatureResource;
use App\Models\Feature;
use Illuminate\Support\Facades\Cache;

class FeatureController extends Controller
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
            $features = FeatureResource::collection(Feature::all());
            return view('featured.featured', compact('features'));
            
        }catch (Exception $e) {
            abort($e->getCode());
        } 
        
    }

    public function formAdd()
    {
        try{
            return view('featured.addFeatured');
            
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
                'logo' => 'required',
                'title' => 'required|max:35',
                'description' => 'required|max:255',
                'textIndication' => 'required|max:15',
                'status' => 'required'
            ]);
            $feature = new Feature([
                'photo' => $request->photo,
                'logo' => $request->logo,
                'title' => $request->title,
                'description' => $request->description,
                'textIndication' => $request->textIndication,
                'status' => $request->status,
            ]);
            
            $feature->save();
            Cache::forget('feature');
    
            return redirect('/admin/featured')->with('success', 'Feature saved!');
            
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
            $feature = new FeatureResource(Feature::findOrFail($id));
            return view('featured.editFeatured', compact('feature')); 
            
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
                'logo' => 'required',
                'title' => 'required|max:35',
                'description' => 'required|max:255',
                'textIndication' => 'required|max:15',
                'status' => 'required',
            ]);
    
            $feature = Feature::findOrFail($id);
    
            $feature->photo = $request->photo;
            $feature->logo = $request->logo;
            $feature->title = $request->title;
            $feature->description = $request->description;
            $feature->textIndication = $request->textIndication;
            $feature->status = $request->status;
    
            $feature->save();
            Cache::forget('feature');
    
            return redirect('/admin/featured')->with('success', 'Feature updated!');
            
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
            $feature = Feature::findOrFail($id);
            $feature->delete();
            Cache::forget('feature');

            return redirect('/admin/featured')->with('success', 'Feature deleted!');
            
        }catch (Exception $e) {
            abort($e->getCode());
        } 
    
    }
}
