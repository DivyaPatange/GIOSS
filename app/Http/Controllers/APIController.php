<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\SchoolProfile;


class APIController extends Controller
{
    public function getList()
    {
        $schoolProfile = SchoolProfile::all();
        return response()->json($schoolProfile,202);
    }
}
