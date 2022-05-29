<?php

namespace App\Http\Controllers;

use App\Models\Clist;
use App\Models\Calendar;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class CalendarController extends Controller
{
    public function create()
    {
        return view('calendars.create', [
            'clists' => Clist::all()
        ]);

    }

    public function store()
    {
        //ddd(request()->all());
        $attributes = request()->validate([
            'calName' => 'required',
            'calUrl' => 'required|url',
            'listMemberships.*' => Rule::exists('clists', 'id')
        ]);

        // Hier ist klar, dass die Attribute zumindest irgendwie stimmig sind.
        // Der URL muss aber noch weiter überprüft werden.

        // 1. Entspricht er dem Wert, der im Environment angegeben ist und besteht er aus 16 alphanumerischen Zeichen?
        if (!preg_match('@' . env('CALENDAR_URL') . '[A-Za-z0-9]{16}@', $attributes['calUrl'])) {
            abort(Response::HTTP_NOT_ACCEPTABLE);
        }

        // Jetzt ziehe den 16-stelligen Kalendercode raus, denn nur dieser wird in die Datenbank geschrieben.
        $pcre_query = '@' . preg_quote(env('CALENDAR_URL')) . "(.*)@";
        $calCode = preg_replace($pcre_query, "\\1", $attributes["calUrl"]);
        

        $cal = Calendar::create([
            'calcode' => $calCode,
            'calname' => $attributes['calName']
        ]);

        if (isset($attributes['listMemberships']))
        {
            $cal->clists()->sync($attributes['listMemberships']);
        }

        return redirect('/');
    }
}
