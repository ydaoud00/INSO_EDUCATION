<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Grade;

class GradeController extends Controller
{
    /**
     * find the specified resource from storage.
     *
     * @param  string  $type
     * @return \Illuminate\Http\Response
     */
    public function find($type)
    {
        $grades = Grade::where('type', $type)->get();

        return $grades;
    }
}
