<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clist extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function groups() {
        return $this->belongsToMany(Group::class, 'clist_group');
    }

    public function calendars() {
        return $this->belongsToMany(Calendar::class, 'calendar_clist');
    }
}
