<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club;

class ClubsController extends Controller
{
    public function index(Request $request) {
        $clubs = Club::all();
        return $clubs;
    }

    public function show(Club $club) {
        return $club;
        $club = Club::find($club);
        return $club;
    }
}
