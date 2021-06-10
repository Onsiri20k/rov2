<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament;
use Illuminate\Support\Facades\Cache;

class TournamentController extends Controller
{
    
    public function index()
    {
        try{

            $tournamentInfo = Cache::remember('tournament', 3600, function() {
                return Tournament::select('photo','title','description','textIndication')
                    ->orderBy('id', 'desc')
                    ->where('status', 'active')
                    ->limit(3)
                    ->get()
                    ->toArray();                   
            });
    
            return response()->json([
                'data'    => $tournamentInfo
            ], 200);
            
        }catch (Exception $e) {
            return response()->json([
                'error'    => $e->getCode(),
                'message'  => $e->getMessage()
            ], 503);
        } 
        
    }

}
