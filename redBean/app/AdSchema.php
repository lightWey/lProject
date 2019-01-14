<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdSchema extends Model
{
    protected $guarded = [];

    public function stat()
    {
        return $this->hasMany(AdStat::class);
    }

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}
