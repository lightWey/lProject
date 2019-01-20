<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recharge extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function adminUser()
    {
        return $this->belongsTo(User::class, 'admin', 'id');
    }
}
