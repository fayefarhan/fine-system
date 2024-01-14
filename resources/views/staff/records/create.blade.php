@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2">

                <h1>Create Record</h1>

                <form method="post" action="{{ route('staff.records.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="book_name" class="form-label">
                            Book Name:
                        </label>
                        <input type="text" class="form-control" name="book_name" id="book_name"
                            value="{{ old('book_name') }}" required>
                        @error('book_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="matric_number" class="form-label">
                            Matric Number:
                        </label>
                        <select name="matric_number" class="form-control" required>
                            <option value="">Select Option</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->matric_number }}"
                                    {{ old('matric_number') == $student->matric_number ? 'selected' : '' }}>
                                    {{ $student->matric_number }}
                                </option>
                            @endforeach
                        </select>
                        @error('matric_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="issue_date" class="form-label">
                                Issue Date:
                            </label>
                            <input type="date" class="form-control" name="issue_date" id="issue_date"
                                value="{{ old('issue_date') }}" required>
                            @error('issue_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="due_date" class="form-label">
                                Due Date:
                            </label>
                            <input type="date" class="form-control" name="due_date" id="due_date"
                                value="{{ old('due_date') }}" required>
                            @error('due_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="return_date" class="form-label">
                                Return Date:
                            </label>
                            <input type="date" class="form-control" name="return_date" id="return_date"
                                value="{{ old('return_date') }}">
                            @error('return_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Create Record</button>
                </form>
            </div>
        </div>
    </div>
@endsection
