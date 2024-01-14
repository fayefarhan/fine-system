@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>Records</h1>
</div>

    <table class="table">
        <thead>
            <tr>
                <th>Book</th>
                <th>Borrower</th>
                <th>Issue Date</th>
                <th>Due Date</th>
                <th>Return Date</th>
                <th>Fine Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
                <tr>
                    <td>{{ $record->book_name }}</td>
                    <td>{{ $record->student->name }}</td>
                    <td>{{ $record->issue_date }}</td>
                    <td>{{ $record->due_date }}</td>
                    <td>{{ $record->return_date }}</td>
                    <td>{{ $record->fine_amount }}</td>
                    <td>
                        <a href="{{ route('record.edit', $record) }}" class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $record->id }}">Delete</button>
                    </td>
                </tr>

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal{{ $record->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this record?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <form action="{{ route('record.destroy', $record) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('record.create') }}" class="btn btn-success">Add New Record</a>
@endsection

