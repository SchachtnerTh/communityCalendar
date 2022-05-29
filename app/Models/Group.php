<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function calendars()
    {
        return $this->belongsToMany(Calendar::class, 'calendar_group');
    }

    public function clists()
    {
        return $this->belongsToMany(Clist::class, 'clist_group');
    }
}
