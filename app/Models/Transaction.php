<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'type',
        'category',
        'amount',
        'note',
    ];

    //transaction data....
    public function account(){
        return $this->belongsTo(account::class,'account_id');
    }
    public function account_users()
    {
        return $this->belongsTo(Account_user::class,'account_users_id');
    }

   
}
