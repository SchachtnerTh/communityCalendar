<?php

namespace App\Http\Controllers;

use App\Models\Clist;
use App\Models\Calendar;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class CalendarController extends Controller
{

    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/calendars.index', [
            'calendars' => Calendar::all()
        ]);
    }

    public function create()
    {
        return view('admin/calendars.create', [
            'clists' => Clist::all()
        ]);

    }

    public function store()
    {
        //ddd(request()->all());
        $attributes = request()->validate([
            'calendarName' => 'required',
            'calendarUrl' => 'required|url',
            'clistMemberships.*' => Rule::exists('clists', 'id')
        ]);

        //ddd(request()->all());
        // Hier ist klar, dass die Attribute zumindest irgendwie stimmig sind.
        // Der URL muss aber noch weiter überprüft werden.

        // 1. Entspricht er dem Wert, der im Environment angegeben ist und besteht er aus 16 alphanumerischen Zeichen?
        if (!preg_match('@' . env('CALENDAR_URL') . '[A-Za-z0-9]{16}@', $attributes['calendarUrl'])) {
            abort(Response::HTTP_NOT_ACCEPTABLE);
        }

        // Jetzt ziehe den 16-stelligen Kalendercode raus, denn nur dieser wird in die Datenbank geschrieben.
        $pcre_query = '@' . preg_quote(env('CALENDAR_URL')) . "(.*)@";
        $calCode = preg_replace($pcre_query, "\\1", $attributes["calendarUrl"]);

        //dd($calCode);
        $cal = Calendar::create([
            'calcode' => $calCode,
            'calname' => $attributes['calendarName']
        ]);

        if (isset($attributes['clistMemberships']))
        {
            $cal->clists()->sync($attributes['clistMemberships']);
        }

        return redirect(route('calendars.index'));
    }

    /**
     * Show a resource to be edited
     *
     */
    public function edit($id)
    {
        $calendar = Calendar::with('clists')->findOrFail($id);
        $clists = $calendar->clists;
        return view('admin/calendars.edit', [
            'calendar' => $calendar,
            'clists' => $clists,
            'fulllist' => Clist::all()
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
            'calendarName' => 'required|unique:calendars,calname,'. $id,
            'clistMemberships.*' => Rule::exists('clists', 'id')
        ]);


        $calendar = Calendar::findOrFail($id);

        $calendar->update([
            'calname' => $attributes['calendarName']
        ]);

        if (isset($attributes['clistMemberships']))
        {
            $calendar->clists()->sync($attributes['clistMemberships']);
        }

        return redirect(route('calendars.index'));
    }

    /**
     * Destroy a resource
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Calendar::find($id)->delete();
        return redirect(route('calendars.index'));
    }
}
