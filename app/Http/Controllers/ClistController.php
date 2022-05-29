<?php

namespace App\Http\Controllers;

use App\Models\Clist;
use App\Models\Group;
use App\Models\Calendar;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ClistController extends Controller
{
    public function create()
    {
        return view('lists.create', [
            'groups' => Group::all(),
            'calendars' => Calendar::all()
        ]);

    }

    public function store()
    {
        $attributes = request()->validate([
            'clistName' => 'required|unique:clists,name',
            'calMemberships.*' => Rule::exists('calendars', 'id'),
            'groupMemberships.*' => Rule::exists('groups', 'id')
        ]);

        $clist = Clist::create([
            'name' => $attributes['clistName'],
            'slug' => Str::slug($attributes['clistName'])
        ]);

        if (isset($attributes['calMemberships'])) {
            $clist->calendars()->sync($attributes['calMemberships']);
        }

        if (isset($attributes['groupMemberships'])) {
            $clist->groups()->sync($attributes['groupMemberships']);
        }

        return redirect('/');
    }

    public function show($list)
    {
        // $list = Clist::find($list)->calendars->map(function($cal) { return $cal->calcode; })->implode('-');

        return view('lists.show', [
            'calsList' => Clist::where('slug', '=', $list)->first()->calendars->map(function($cal) { return $cal->calcode; })->implode('-')
        ]);
        //dd($list);
    }
}