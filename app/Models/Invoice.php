<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = "invoices";
    protected $primaryKey = "id";
    public $timestamps = true;

    protected $fillable = [
        'order_id',
        'total_price',
        'invoice_date',
        'invoice_number'
    ];

    // Relationship to Order
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
