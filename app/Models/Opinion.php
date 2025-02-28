<?php

namespace App\Models;

use App\Models\User;
use App\Models\Place_rando;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Opinion extends Model
{
    use HasFactory;
    protected $fillable = ['title_opinion', 'content_opinion', 'note_opinion', 'user_id','place_rando_id'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function place_rando()
    {
        return $this->belongsTo(Place_rando::class);
    }
}
