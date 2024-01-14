@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2">

                <h1>Edit Record</h1>

                <form method="POST" action="{{ route('staff.records.update', $record) }}">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="book_name" class="form-label">
                            Book Name:
                        </label>
                        <input type="text" class="form-control" name="book_name" id="book_name"
                            value="{{ $record->book_name }}" required>
                    </div>

                    <label for="matric_number">Matric Number:</label>
                    <input type="text" name="matric_number" value="{{ $record->matric_number }}" required><br>

                    <label for="issue_date">Issue Date:</label>
                    <input type="date" name="issue_date" value="{{ $record->issue_date }}" required><br>

                    <label for="due_date">Due Date:</label>
                    <input type="date" name="due_date" value="{{ $record->due_date }}" required><br>

                    <label for="return_date">Return Date:</label>
                    <input type="date" name="return_date" value="{{ $record->return_date }}"><br>

                    <button type="submit" class="btn btn-warning">Update Record</button>
                </form>
            </div>
        </div>
    </div>
@endsection
