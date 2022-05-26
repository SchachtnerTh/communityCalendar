<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function show()
    {
        $groups = Group::with('clists.calendars')->get();
        $groups->map(function ($grp) { 
            $grp->clists->map(function ($clist) { 
                $clist->callist = $clist->calendars->map(function ($cal) { 
                    return $cal->calcode;
                })->implode('-'); 
                $clist->calurl = str_replace("[CALS]", $clist->callist, env('CALENDAR_URL'));
            });
        });

        return view('groups',
            [
                'groups' => $groups            ]
        );
    }
}
