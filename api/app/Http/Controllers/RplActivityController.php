<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RplActivity;
use Illuminate\Support\Facades\Cache;

class RplActivityController extends Controller
{
    
    public function index()
    {
        try{
            
            $rplActivityInfo = Cache::remember('rplActivity', 3600, function() {
                return RplActivity::select('photo','title','description','textIndication')
                    ->orderBy('id', 'desc')
                    ->where('status', 'active')
                    ->limit(3)
                    ->get()
                    ->toArray();            
            });
    
            return response()->json([
                'data'    => $rplActivityInfo
            ], 200);
            
        }catch (Exception $e) {
            return response()->json([
                'error'    => $e->getCode(),
                'message'  => $e->getMessage()
            ], 503);
        } 
        
    }

}
