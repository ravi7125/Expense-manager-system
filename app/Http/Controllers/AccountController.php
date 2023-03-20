<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Account;
class AccountController extends Controller
{
  //insert account data
    public function addbank(Request $request){     
        // $request->validate([
        //   'name'=>'required',
        //   'email'=>'required',
        //   'password'=>'required',
        // ]);
        $account = new Account();      
        $account->bankname=$request->bankname;
        $account->accountnumber=$request->accountnumber;
        $account->balance=$request->balance;
        $account->transfer=$request->transfer;
        $account->deduct=$request->deduct;
        $account->user_id=auth()->user()->id;
        $account->save();
        return redirect('show_account');
        // if($res){
        //    return back()->with('success','YOU HAVE REGISTERED SUCCESSFULY');
        // }else
        // {
        //     return back()->with('fail','somthing wrong');
        // }
     }
     //display account data
     function show(){

        $data = Account::all();

        return view('show_account',['data'=>$data]);
    }
     //Delete account
    function delete($id){

      $data=Account::find($id);
      $data->delete();
      return redirect()->back()->with("message",'Data Deleted successfully');
  }
     
     function updatee($id){
 
            $data = Account::find($id);
            return view('update',['data'=>$data]);
        }
          function updatedataa(Request $request){
            $data = Account::find($request->id);
            $data->bankname=$request->bankname;
            $data->accountnumber=$request->accountnumber;
            $data->balance=$request->balance;
            $data->transfer=$request->transfer;
            $data->deduct=$request->deduct;
            $data->save();
           
                      
            return redirect('show_account');
          }

}