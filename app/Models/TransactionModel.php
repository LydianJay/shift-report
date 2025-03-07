<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'tr_id';
    protected $table = 'transactions';
    public $timestamps = false;
    
    protected $fillable = [
        'tr_id',
        'upi_rrn',
        'amount',
        'created_at',
    ];
}
