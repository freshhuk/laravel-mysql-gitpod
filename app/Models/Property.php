<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public function client()
{
    return $this->belongsTo(Client::class);
}

public function notes()
{
    return $this->hasMany(Note::class);
}

}
