<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //*to include the relation in the response optionally
    public function include(string $relation):bool
    {
        $param = request()->get("include");

        if(!isset($param)){
            return false;
        }

        $includeValues = explode(",", strtolower($param));
        return in_array(strtolower($relation), $includeValues);

    }

}
