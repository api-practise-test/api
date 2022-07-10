<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $table = 'phones';
    protected $fillable = ['phone', 'description', 'price', 'brand_id', 'image'];
    protected $primaryKey = 'id';

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

}
