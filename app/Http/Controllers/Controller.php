<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getColors($colorsDataBase)
    {
        //GET COLORS AVAILABLE
        $colorsArray = array();
        foreach ($colorsDataBase as $cadaum => $value) {
            $exploded = explode(",", $value->Colors);

            foreach ($exploded as $cadaum2 => $value2) {

                if (!empty($colorsArray)) {
                    $key = array_search(strtoupper(trim($value2)), $colorsArray);
                    if ($key === false) {
                        $colorsArray[] = strtoupper(trim($value2));
                    }
                } else {
                    $colorsArray[] = strtoupper(trim($value2));
                }
            }
        }

        return $colorsArray;
    }
}
