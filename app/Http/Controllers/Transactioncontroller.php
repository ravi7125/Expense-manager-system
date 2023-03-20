<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use App\Models\Transaction;
use App\Models\Account;
use App\Models\Account_user;


class TransactionController extends Controller
{
    public function index($account_id)
    {
        $transaction = Transaction::where('account_id',$account_id)->get();  
        $transaction = Transaction::with('account_users')->get();  
        $transaction = Transaction::with('account')->get();  
        $account_user = $this->getUsers();
        $account = $this->getAccounts();
        $transaction = Transaction::where('account_id',$account_id)->orderByDesc('created_at')->get();
        return view('transactionshow' ,  ['transactions'=> $transaction, 'account_id'=>$account_id ], compact('account_user', 'account')); 
        
    }

    public function showTransaction($account_id)
    {
        // $transactions = Transaction::all();
        $transaction = Transaction::whereIn('account_id', $account_id)->orderByDesc('created_at')->get();
        return view('transactionshow', ['transactions'=> $transaction, 'account_id'=>$account_id ], compact('transaction'));
    }
     //Get account data
    protected function getAccounts()
    {
        return Account::all();
    }
    //Get account user data
    protected function getUsers()
    {
        return Account_user::all();
    }
    public function create(Request $req)
    
    { 
      $account_user = Account_user::all();
      return view('transactionshow' ,  ['transactions'=> $transaction, 'account_id'=>$account_id ], compact('account_user'));
        
    }
      public function store(Request $request,$account_id)
    {
        // Create a new Transaction instance
        $transaction = new Transaction;
        // Set the transaction properties
        $transaction->account_id = $request->input('account_id');
        $transaction->account_users_id = $request->input('user_id');
        $transaction->type = $request->input('type');
        $transaction->user_id = Auth::id();
        $transaction->category = $request->input('category');
        $transaction->amount = $request->input('amount');
        $transaction->note = $request->input('note');
        
    
        // Retrieve the account model 
        $account = Account::find($transaction->account_id);
        $account->increment('transfer');
    
        // Perform to transaction type
        
        if($request->type == 'income')
        {
            $account->balance += $transaction->amount;
        }
        elseif($request->type == 'expense'|| $request->type == 'transfer' )
        {
            $account->deduct = $account->deduct + $transaction->amount;
            $account->balance -= $transaction->amount;
        }
        
        // Save the transaction and update the account balance
        DB::transaction(function () use ($transaction, $account) {
            $account->save();
            $transaction->save();
        });
    
        // Redirect the user back to the transactionshow page
        return redirect()->back()->with('status', 'Transaction Created Successfully');
        }
        function destroy(Request $request, $id){

            $transaction=Transaction::find($id);
            $account = Account::find($transaction->account_id);
            $account->decrement('transfer');
            if($request->type === 'income')
            {
                $account->balance += $transaction->amount;
            }
            else{
            $account->balance -= $transaction->amount;
            }
        //    $accounts->save();
           DB::transaction(function () use ($transaction, $account) {
            $account->save();
            $transaction->save();
        });
                 $transaction->delete();
                 return redirect()->back()->with('status', 'Transaction Deleted Successfully');
        }
    
         public function show()
        {
    // $transactions = Transaction::all();
           $transactions = Transaction::orderByDesc('created_at')->get();
           return view('index', compact('transactions'));
    
  
        }
         function updateid($id){
           $transaction= Transaction::find($id);
           return view('updatetransaction',['transaction'=>$transaction]);
        }

        function update(Request $request){
        $transaction =Transaction::find($request->id);
        $transaction->type = 'income';
        $transaction->category = $request->input('category');
        $transaction->amount = $request->input('amount');
        $transaction->note = $request->input('note');

        $account = Account::find($transaction->account_id);
        if($request->type === 'income')
        {
            $account->balance += $transaction->amount;
        }
        else{
        $account->balance -= $transaction->amount;
        }
        DB::transaction(function () use ($transaction, $account) {
            $account->update();
            $transaction->update();
        });          
        return redirect('transactionshow/{id}');
    }  
}
    









     