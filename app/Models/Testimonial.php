<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Testimonial extends Model
{
    use HasFactory;
    protected $table = 'testimonials';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'tagline', 'score', 'content', 'is_del', 'created_at', 'updated_at'];
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}
