<?php

namespace App\Http\Controllers;

use App\Http\Controllers\becomeRevisor;
use App\Mail\BecomeRevisor as MailBecomeRevisor;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
   public function index (){
      
      $product_to_check = Product::where('is_accepted', null)->first();
      return view ('revisor.index', compact('product_to_check'));
   }
   
   public function acceptProduct (Product $product)
   {
      $product->setAccepted(true);
      return redirect()->back()->with('message', 'Prodotto accettato!');
   }
   
   public function rejectProduct (Product $product)
   {
      $product->setAccepted(false);
      return redirect()->back()->with('message', 'Prodotto rifiutato');
   }

   public function becomeRevisor(Request $request)
   {
  
   $messaggio = $request->body;

      

      Mail::to('admin@presto.it')->send(new MailBecomeRevisor(Auth::user(),$messaggio));
      return redirect()->back()->with('message', 'La tua Richiesta è stata inoltrata!');
   }

   public function makeRevisor(User $user)
   {
      Artisan::call('presto:makeUserRevisor', ["email"=>$user->email]);
      return redirect('/')->with('message', 'Complimenti sei un Revisore!');
   } 

   public function emailRevisor(){

      return view ('mail.revisor');
   }
}

