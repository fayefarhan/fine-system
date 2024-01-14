@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Dashboard</h1>
    </div>

    <a href="{{ route('records.create') }}" class="btn btn-success">Add New Record</a>
@endsection
