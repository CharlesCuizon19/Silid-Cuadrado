<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'title',
        'short_description',
        'overview',
        'offer',
        'icon',
        'thumbnail'
    ];

    public function images()
    {
        return $this->hasMany(ServiceImage::class, 'service_id', 'id');
    }
}
