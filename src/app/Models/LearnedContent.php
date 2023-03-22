<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearnedContent extends Model
{
    use HasFactory;

    public function contents(){
        return $this->belongsTo('App\Models\Content');
    }
    
    public function records(){
        return $this->belongsTo('App\Models\Record');
    }
}
