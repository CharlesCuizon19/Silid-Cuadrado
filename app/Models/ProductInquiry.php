<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInquiry extends Model
{
    use HasFactory;

    protected $table = 'product_inquiries';

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'product_id',
        'full_name',
        'email',
        'phone',
        'message',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
