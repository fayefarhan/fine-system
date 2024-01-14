@extends('layouts.app')

@section('content')
    <h1>Create Record</h1>
    <form method="post" action="{{ route('dashboard.store') }}">
        @csrf

        <label for="book_name">Book Name:</label>
        <input type="text" name="book_name" required><br>

        <label for="matric_number">Matric Number:</label>
        <select name="matric_number" required>
            @foreach ($students as $student)
                <option value="{{ $student->matric_number }}">{{ $student->matric_number }}</option>
            @endforeach
        </select><br>

        <label for="issue_date">Issue Date:</label>
        <input type="date" name="issue_date" required><br>

        <label for="due_date">Due Date:</label>
        <input type="date" name="due_date" required><br>

        <label for="return_date">Return Date:</label>
        <input type="date" name="return_date"><br>

        <button type="submit">Create Record</button>
    </form>
@endsection