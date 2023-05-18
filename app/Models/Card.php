<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $table = 'card_list';
    // public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'image',
        'type',
        'cvv',
        'name',
        'email',
        'phone',
        'card_number',
        'card_address',
        'exp_date',
        'category',
        'price',
        'country',
        'state',
        'city',
        'zip',
        'is_use',
    ];

    
}
