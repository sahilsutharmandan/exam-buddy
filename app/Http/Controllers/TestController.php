<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TestController extends Controller
{
    public function index()
    {
        return Inertia::render('Tests/Index', ['tests' => Test::get()]);
    }

    public function create()
    {
        return Inertia::render('Tests/Create');
    }
}
