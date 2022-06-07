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
        return view('admin/clists.create', [
            'groups' => Group::all(),
            'calendars' => Calendar::all()
        ]);

    }

    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/clists.index', [
            'clists' => Clist::all()
        ]);
    }

    /**
     * Show a resource to be edited
     *
     */
    public function edit($id)
    {
        $clist = Clist::with('groups', 'calendars')->findOrFail($id);
        $groups = $clist->groups;
        $cals = $clist->calendars;
        return view('admin/clists.edit', [
            'clist' => $clist,
            'groups_list' => Group::all(),
            'calendars_list' => Calendar::all()
        ]);
    }

    /**
     * update a resource
     *
     * @param string $id
     * @return Response
     */
    public function update($id)
    {
        $attributes = request()->validate([
            'clistName' => 'required|unique:clists,name,'. $id,
            'groupMemberships.*' => Rule::exists('groups', 'id'),
            'calendarMemberships.*' => Rule::exists('calendars', 'id')
        ]);


        $clist = Clist::findOrFail($id);

        $clist->update([
            'name' => $attributes['clistName']
        ]);

        if (isset($attributes['groupMemberships']))
        {
            $clist->groups()->sync($attributes['groupMemberships']);
        }

        if (isset($attributes['calendarMemberships']))
        {
            $clist->calendars()->sync($attributes['calendarMemberships']);
        }

        return redirect(route('clists.index'));
    }

    public function store()
    {
        //dd(request());
        $attributes = request()->validate([
            'clistName' => 'required|unique:clists,name',
            'calendarMemberships.*' => Rule::exists('calendars', 'id'),
            'groupMemberships.*' => Rule::exists('groups', 'id')
        ]);

        $clist = Clist::create([
            'name' => $attributes['clistName'],
            'slug' => Str::slug($attributes['clistName'])
        ]);

        //dd($attributes);

        if (isset($attributes['calendarMemberships'])) {
            $clist->calendars()->sync($attributes['calendarMemberships']);
        }

        if (isset($attributes['groupMemberships'])) {
            $clist->groups()->sync($attributes['groupMemberships']);
        }

        return redirect(route('clists.index'));
    }

    public function show($list)
    {
        //$list = Clist::where('slug', '=', $list)->calendars->map(function($cal) { return $cal->calcode; })->implode('-');
        //dd($list);

        return view('lists.show', [
            'calsList' => Clist::where('slug', '=', $list)->first()->calendars->map(function($cal) { return $cal->calcode; })->implode('-')
        ]);
        //dd($list);
    }

    /**
     * Destroy a resource
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Clist::find($id)->delete();
        return redirect(route('clists.index'));
    }
}
