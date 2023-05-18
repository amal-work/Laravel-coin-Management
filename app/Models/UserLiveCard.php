<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLiveCard extends Model
{
    use HasFactory;
    protected $table = 'user_live_cards';
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'card_info',
    ];
}
