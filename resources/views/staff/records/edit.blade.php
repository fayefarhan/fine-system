@extends('layouts.app')

@section('content')
    <h1>Edit Record</h1>
    <form method="post" action="{{ route('dashboard.update', ['dashboard' => $record]) }}">
        @csrf
        @method('PATCH')

        <label for="book_name">Book Name:</label>
        <input type="text" name="book_name" value="{{ $record->book_name }}" required><br>

        <label for="matric_number">Matric Number:</label>
        <input type="text" name="matric_number" value="{{ $record->matric_number }}" required><br>

        <label for="issue_date">Issue Date:</label>
        <input type="date" name="issue_date" value="{{ $record->issue_date }}" required><br>

        <label for="due_date">Due Date:</label>
        <input type="date" name="due_date" value="{{ $record->due_date }}" required><br>

        <label for="return_date">Return Date:</label>
        <input type="date" name="return_date" value="{{ $record->return_date }}"><br>

        <button type="submit">Update Record</button>
    </form>
@endsection
