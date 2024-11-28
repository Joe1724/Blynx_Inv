<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleAmount
{
    // Optional: You can define properties for unit price and quantity, though they're not tied to a database.
    public $unit_price;
    public $quantity;
    public $total_price;

    // Constructor to initialize unit_price and quantity
    public function __construct($unit_price, $quantity)
    {
        $this->unit_price = $unit_price;
        $this->quantity = $quantity;
        $this->total_price = $this->calculateTotalPrice();
    }

    // Method to calculate total price based on unit price and quantity
    public function calculateTotalPrice()
    {
        return $this->unit_price * $this->quantity;
    }

    // Optional: Accessor for total price (if needed)
    public function getTotalPriceAttribute()
    {
        return $this->unit_price * $this->quantity;
    }
}
