<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jobs\refreshDataBaseXbz;

class RoutineXbz extends Controller
{
    public static function needUpdate()
    {
        //Calculo Data
        $ultimo = DB::table('produtos')->latest('CodigoComposto')->first();

        if(!is_null($ultimo))
        {
            $diff = Carbon::now()->diffInMinutes($ultimo->created_at);
        }
        
        if(@$diff >= 60 || is_null($ultimo))
        {
            refreshDataBaseXbz::dispatch();
        }
    }
}
