<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeatureTitle extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'feature_titles';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'subtitle',
        'language_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}