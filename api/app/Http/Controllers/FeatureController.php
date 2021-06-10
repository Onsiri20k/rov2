<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;
use Illuminate\Support\Facades\Cache;

class FeatureController extends Controller
{
    
    public function index()
    {
        try{
            
            $featureInfo = Cache::remember('feature', 3600, function() {
                return Feature::select('photo','logo','title','description','textIndication')
                    ->orderBy('id', 'desc')
                    ->where('status', 'active')
                    ->limit(5)
                    ->get()
                    ->toArray();                                
            });
            
            return response()->json([
                'data'    => $featureInfo
            ], 200);
            
        }catch (Exception $e) {
            return response()->json([
                'error'    => $e->getCode(),
                'message'  => $e->getMessage()
            ], 503);
        } 
        
    }
      
}
