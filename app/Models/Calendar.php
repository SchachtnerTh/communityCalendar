<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    protected $fillable = ['calname', 'calcode'];

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'calendar_group');
    }

    public function clists()
    {
        return $this->belongsToMany(Clist::class, 'calendar_clist');
    }
}
