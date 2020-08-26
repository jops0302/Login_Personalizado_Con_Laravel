<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImpersonationsController extends Controller
{

   public function __construct()
   {
       $this->middleware('auth');
   }
    
    public function store(){

        if(auth()->user()->canImpersonate()){

            session(['impersonator_id' => auth()->id()]);

            auth()->loginUsingId( request('user_id') );
    
            return back()->with('flash', 'Estas personificando al usuario con el id ' .request('user_id'));
        }

        return back()->with('flash', 'Accion no permitida');


    }

    public function destroy(){
        auth()->loginUsingId(session('impersonator_id'));

        session()->forget('impersonator_id');

        return back()->with('flash', 'Has vuelto a ser tu' . auth()->user()->name);
    }
}
