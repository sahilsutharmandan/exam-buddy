<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\URL;

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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'questions' => 'required|json',
        ]);


        $test = new Test();
        $test->questions = $validatedData['questions'];
        $test->save();

        $indexUrl = URL::route('tests.index');
        return redirect()->to($indexUrl);
    }
}
