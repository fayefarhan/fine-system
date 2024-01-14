<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\User;
use Carbon\Carbon;

class RecordController extends Controller
{
    public function index()
    {
        $records = Record::with('student')->get();

        return view('staff.record.index', compact('records'));
    }

    public function create()
    {
        $students = User::where('role', 'student')->get();

        return view('staff.record.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_name' => 'required',
            'matric_number' => 'required|exists:users,matric_number',
            'issue_date' => 'required|date',
            'due_date' => 'required|date',
        ]);

        $fineAmount = $this->calculateFineAmount($request->due_date, $request->return_date);

        Record::create([
            'book_name' => $request->book_name,
            'matric_number' => $request->matric_number,
            'issue_date' => $request->issue_date,
            'due_date' => $request->due_date,
            'return_date' => $request->return_date,
            'fine_amount' => $fineAmount,
        ]);

        return redirect()->route('dashboard.index');
    }

    public function edit(Record $record)
    {
        dd($record);
        $students = User::where('role', 'student')->get();

        return view('staff.dashboard.edit', compact('record', 'students'));
    }

    public function update(Request $request, Record $record)
    {
        $request->validate([
            'book_name' => 'required',
            'matric_number' => 'required|exists:users,matric_number',
            'issue_date' => 'required|date',
            'due_date' => 'required|date',
        ]);

        $fineAmount = $this->calculateFineAmount($request->due_date, $request->return_date);

        $record->update([
            'book_name' => $request->book_name,
            'matric_number' => $request->matric_number,
            'issue_date' => $request->issue_date,
            'due_date' => $request->due_date,
            'return_date' => $request->return_date,
            'fine_amount' => $fineAmount,
        ]);

        return redirect()->route('record.index');
    }

    public function destroy(Record $record)
    {
        $record->delete();

        return redirect()->route('record.index');
    }

    private function calculateFineAmount($dueDate, $returnDate)
    {
        $dueDate = Carbon::parse($dueDate);
        $returnDate = Carbon::parse($returnDate);
        $daysLate = $returnDate->diffInDays($dueDate, false);
        $fineAmount = max(0, $daysLate) * 2;

        return $fineAmount;
    }
}
