<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;



    // Google login
    public function redirectToGoogle()
    {
        try{
            return Socialite::driver('google')->redirect();
            
        }catch (Exception $e) {
            abort($e->getCode());
        } 
    }

    // Google callback
    public function handleGoogleCallback()
    {

        try{
            $user = Socialite::driver('google')->stateless()->user();
            
            $finduser = User::where('email', $user->email)
                ->where('status', 'active')
                ->first();

            if($finduser){
                Auth::login($finduser);
                return redirect('/admin/featured')->with('name',$finduser->name);
            }
            else{
                return redirect('/admin');
            }
            
        }catch (Exception $e) {
            abort($e->getCode());
        } 
    } 
    
    //logout
    public function logout(Request $request) {
        try{
            Auth::logout();
            return redirect('/admin');
            
        }catch (Exception $e) {
            abort($e->getCode());
        } 
        
      }

}
