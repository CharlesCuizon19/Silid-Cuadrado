<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'overview',
        'additional_information',
        'thumbnail',
    ];

    public function images()
    {
        return $this->hasMany(ProductImages::class);
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function inquiries()
    {
        return $this->hasMany(ProductInquiry::class);
    }
}
