<!-- resources/views/student/dashboard/index.blade.php -->


@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-5 mb-4">Hello {{ $user->name }}! (Matric Number: {{ $user->matric_number }})</h1>

        <h2 class="mb-3">Your Borrowed Books</h2>

        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Issue Date</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Return Date</th>
                    <th scope="col">Fine Amount</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($records as $index => $record)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $record->book_name }}</td>
                    <td>{{ $record->issue_date }}</td>
                    <td>{{ $record->due_date }}</td>
                    <td>{{ $record->return_date ?? 'Not Returned Yet' }}</td>
                    <td>{{ $record->fine_amount }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No borrowed books.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h2 class="mt-4">Total Fine: RM {{ number_format($user->totalFine(), 2) }}</h2>

</div>
@endsection

