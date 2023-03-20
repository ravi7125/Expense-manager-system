<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account_User;
class AccountUserController extends Controller
{
    public function adduser(Request $request,$account_id){
       
        // $request->validate([
        //   'name'=>'required',
        //   'email'=>'required',
        //   'password'=>'required',
        // ]);
        $account_user = new Account_user();
        $account_user->name=$request->name;
        $account_user->email=$request->email;
        $account_user->phone_number=$request->phone_number;
        $account_user->users_id=auth()->user()->id;
        $account_user->accounts_id=$request->account_id;

        $account_user->save();
        return redirect('show_account_user/'.$account_id);
    }
    function show_user($account_id){

        $data = Account_user::where('accounts_id',$account_id)->get();

        return view('show_account_user',['data'=>$data ,'account_id'=>$account_id ]);
    }

    public function delete_account_user($id){

        $data=Account_user::find($id);
        $data->delete();
        return redirect()->back()->with("message",'Data Deleted successfully');
    }
     
     function update_account_user($id){
 
            $data = Account_user::find($id);
            return view('update_account_user',['data'=>$data]);
        }
          function updatedata_account_user(Request $request){
            $data = Account_user::find($request->id);
            $data->name=$request->name;
            $data->email=$request->email;
            $data->phone_number=$request->phone_number;
          
            $data->save();
           
            return redirect('show_account_user/{id}');       
       
          }
}