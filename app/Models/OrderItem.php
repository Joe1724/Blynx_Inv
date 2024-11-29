<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = "order_items";
    protected $primaryKey = "id";
    public $timestamps = true;
    public $increments = true;

    protected $fillable = ['quantity', 'unit_price', 'category_id', 'product_id'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
     public function getProductNameAttribute(): ?string
    {
<<<<<<< HEAD
        // Use the relationship to safely get the product name
        return $this->product?->name;
=======
        return $this->belongsTo(Order::class, 'order_id', 'id');

    }
    public static function revenueLast30Days(): float
    {
        return self::where('created_at', '>=', Carbon::now()->subDays(30))
            ->sum(\DB::raw('quantity * unit_price'));
>>>>>>> c63a4d71ec35c4542514ecb6b9eae7ef56922b08
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // public function order(): BelongsTo
    // {
    //     return $this->belongsTo(Order::class, 'order_id', 'id');
    // }
}
