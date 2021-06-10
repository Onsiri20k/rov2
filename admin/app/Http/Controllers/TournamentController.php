<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Tournament as TournamentResource;
use App\Models\Tournament;
use Illuminate\Support\Facades\Cache;

class TournamentController extends Controller
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
            $tournaments = TournamentResource::collection(Tournament::all());
            return view('tournament.tournament', compact('tournaments'));
            
        }catch (Exception $e) {
            abort($e->getCode());
        } 
        
    }

    public function formAdd()
    {
        try{
            return view('tournament.addTournament');
            
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
            $tournament = new Tournament([
                'photo' => $request->photo,
                'title' => $request->title,
                'description' => $request->description,
                'textIndication' => $request->textIndication,
                'status' => $request->status,
            ]);
            $tournament->save();
            Cache::forget('tournament');
    
            return redirect('/admin/tournament')->with('success', 'Tournament saved!');
            
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
            $tournament = new TournamentResource(Tournament::findOrFail($id));
            return view('tournament.editTournament', compact('tournament')); 
            
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
    
            $tournament = Tournament::findOrFail($id);
    
            $tournament->photo = $request->photo;
            $tournament->title = $request->title;
            $tournament->description = $request->description;
            $tournament->textIndication = $request->textIndication;
            $tournament->status = $request->status;
    
            $tournament->save();
            Cache::forget('tournament');
    
            return redirect('/admin/tournament')->with('success', 'Tournament updated!');
            
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
            $tournament = Tournament::findOrFail($id);
            $tournament->delete();
            Cache::forget('tournament');

            return redirect('/admin/tournament')->with('success', 'Tournament deleted!');
            
        }catch (Exception $e) {
            abort($e->getCode());
        } 

    }
}
