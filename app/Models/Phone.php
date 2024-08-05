<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Phone extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'price',
        'quantity',
        'description',
        'cate_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'cate_id');
    }
}
