<?php

namespace App\Http\Controllers;

use App\Turn;
use Illuminate\Http\Request;

class TurnController extends Controller
{
    public function index()
    {
        $turns = Turn::get();

        return view('panel.turn._index', compact('turns'));
    }
}
