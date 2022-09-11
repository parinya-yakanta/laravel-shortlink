<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortLink extends Model
{
    use HasFactory;

    public $table = 'short_links';

    protected $fillable = [
        'user_id',
        'code',
        'name',
        'link',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
