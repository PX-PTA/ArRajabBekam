<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function SalesDetail(): HasMany
    {
        return $this->hasMany(SaleDetail::class);
    }
    public function LastSalesDetail(): HasMany
    {
        return $this->HasMany(SaleDetail::class)->latest();
    }
}
