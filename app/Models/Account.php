<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = [
        'bankname',
        'accountnumber',
    ];

    public $timestamps=false;

    public function transfer($destinationAccount, $amount)
{
    $this->balance -= $amount;
    $destinationAccount->balance += $amount;
    $this->save();
    $destinationAccount->save();
}

//transaction data.....
public function account_users(){
    return $this->hasMany(Account_user::class);
}
public function transaction(){
    return $this->hasMany(Transaction::class);
}
}
