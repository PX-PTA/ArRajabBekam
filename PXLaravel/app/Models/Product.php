<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function Inventory(): HasMany
    {
        return $this->hasMany(ProductInventory::class);
    }
    public function LastInventory(): HasMany
    {
        return $this->HasMany(ProductInventory::class)->latest();
    }
    public function salesDetail(): HasMany
    {
        return $this->hasMany(SaleDetail::class);
    }
    public function LastsalesDetail(): HasMany
    {
        return $this->HasMany(SaleDetail::class)->latest();
    }
}
