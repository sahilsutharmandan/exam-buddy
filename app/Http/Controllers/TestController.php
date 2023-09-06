<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\URL;
use PhpParser\Node\Expr\FuncCall;

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
    public function edit($id)
    {
        $test = Test::where('id', $id)->first();
        return Inertia::render('Tests/Create', ['test' => $test]);
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'test_name' => 'required|string',
            'test_duration_time' => 'required|numeric',
            'subject' => 'required|string',
            'date_range' => 'required|string',
            'questions' => 'required|string',
        ]);

        $dateRange = json_decode($validatedData['date_range']);
        $questions = json_decode($validatedData['questions']);

        $test = Test::where('id', $id)->first();
        $test->test_name = $validatedData['test_name'];
        $test->test_duration_time = (int)$validatedData['test_duration_time'];
        $test->subject = $validatedData['subject'];
        $test -> date_range = $dateRange;
        $test -> questions = $questions;
        $test->save();

        $indexUrl = URL::route('tests.index');
        return redirect()->to($indexUrl);
    }
    public function destroy($id)
    {
        $test = Test::where('id', $id)->first();
        $test->delete();
        return back();
    }
    public function view($id)
    {
        $test = Test::where('id', $id)->first();

        $questionsWithoutAnswers = collect($test->questions)->map(function ($question) {
            unset($question['answer']);
            return $question;
        });

        $test->questions = $questionsWithoutAnswers;

        return Inertia::render('Tests/View', ['test' => $test]);
    }


}
