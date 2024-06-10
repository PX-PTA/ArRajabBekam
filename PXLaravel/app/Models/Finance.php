<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Finance extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function medicalCheckup(): BelongsTo
    {
        return $this->belongsTo(MedicalRecord::class);
    }
}
