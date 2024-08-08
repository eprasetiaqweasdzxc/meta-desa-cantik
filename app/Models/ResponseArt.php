<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ResponseArt extends Model
{
    use HasFactory;

    // protected $fillable = ['region_id'];
    public function response(): BelongsTo
    {
        return $this->belongsTo(Response::class);
    }
}
