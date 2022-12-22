<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParentController extends Controller
{
    // Restrict users accessing specific pages
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }
}
