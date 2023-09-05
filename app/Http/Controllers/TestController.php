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
        // dd($request->all());

        $validatedData = $request->validate([
            'test_name' => 'required|string',
            'test_duration_time' => 'required|string',
            'subject' => 'required|string',
            'date_range' => 'required|string',
            'questions' => 'required|string',
        ]);

        $dateRange = json_decode($validatedData['date_range']);
        $questions = json_decode($validatedData['questions']);

        $test = new Test();
        $test->test_name = $validatedData['test_name'];
        $test->test_duration_time = (int)$validatedData['test_duration_time'];
        $test->subject = $validatedData['subject'];
        $test -> date_range = $dateRange;
        $test -> questions = $questions;
        $test->save();

        $indexUrl = URL::route('tests.index');
        return redirect()->to($indexUrl);
    }
}
