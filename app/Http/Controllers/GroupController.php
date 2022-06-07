<?php

namespace App\Http\Controllers;

use App\Models\Clist;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GroupController extends Controller
{
    public function showGroups()
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
       return view('admin.groups.create', [
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

        //return redirect('/');
        return redirect(route('groups.index'));

    }

    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/groups.index', [
            'groups' => Group::all()
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
            'groupName' => 'required|unique:groups,name,'. $id,
            'clistMemberships.*' => Rule::exists('clists', 'id')
        ]);


        $group = Group::findOrFail($id);

        $group->update([
            'name' => $attributes['groupName']
        ]);

        if (isset($attributes['clistMemberships']))
        {
            $group->clists()->sync($attributes['clistMemberships']);
        }

        return redirect(route('groups.index'));
    }

    /**
     * Show a resource to be edited
     *
     */
    public function edit($id)
    {
        $g = Group::with('clists')->findOrFail($id);
        $cl = $g->clists;
        return view('admin/groups.edit', [
            'group' => $g,
            'clists' => $cl,
            'fulllist' => Clist::all()
        ]);
    }

    /**
     * Show a resource
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        dd($id);
    }

    /**
     * Destroy a resource
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Group::find($id)->delete();
        return redirect(route('groups.index'));
    }
}
