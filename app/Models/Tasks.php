<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    public function project()
    {
        return $this->belongsTo(Projects::class, 'Project', 'Id');
    }

    public function member()
    {
        return $this->hasMany(Members::class, 'Id', 'WorkMember');
    }
}
