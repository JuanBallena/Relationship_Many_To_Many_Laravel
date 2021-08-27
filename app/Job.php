<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public $timestamps = false;

    public function seasons() {
        return $this->belongsToMany(Season::class, 'assign_seasons');
    }
}
