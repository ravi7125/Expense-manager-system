<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account_user extends Model
{
    use HasFactory;
    public $timestamps=false;

    public function account(){
        return $this->belongsTo(account::class);
    }
    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
}
