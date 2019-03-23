<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consume extends Model
{
    protected $guarded = [];
    const CREATED_AT = NULL;
    const UPDATED_AT = NULL;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
