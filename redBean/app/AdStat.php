<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdStat extends Model
{
    protected $guarded = [];
    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }

    public function schema()
    {
        return $this->belongsTo(AdSchema::class);
    }

}
