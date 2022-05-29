<?php

namespace App\Http\Controllers;

use App\Models\Clist;
use App\Models\Group;
use Illuminate\Validation\Rule;

class GroupController extends Controller
{
    public function show()
    {
        $groups = Group::with('clists')->get();

        return view('groups',
            [
                'groups' => $groups
            ]
        );
    }

    public function create()
    {
       return view('groups.create', [
           'clists' => Clist::all()
       ]) ;
    }

    public function store()
    {
        $attributes = request()->validate([
            'groupName' => 'required|unique:groups,name',
            'clistMemberships.*' => Rule::exists('clists', 'id')
        ]);

        $group = Group::create([
            'name' => $attributes['groupName']
        ]);

        if (isset($attributes['clistMemberships']))
        {
            $group->clists()->sync($attributes['clistMemberships']);
        }

        return redirect('/');

    }
}
