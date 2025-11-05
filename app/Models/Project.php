<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'category_id',
        'project_title',
        'overview',
        'scope_work',
        'project_image',
    ];

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function category()
    {
        return $this->belongsTo(ProjectCategory::class, 'category_id');
    }
}
