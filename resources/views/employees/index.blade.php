<!-- resources/views/employees/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($employees as $employee)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $employee->name }}</h5>
                        <p class="card-text">{{ $employee->email }}</p>
                        <p class="card-text">{{ $employee->employee_role }}</p>
                        <p class="card-text">{{ $employee->tel }}</p>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('employees.delete', $employee->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <a href="{{ route('employees.create') }}" class="btn btn-success">Add Employee</a>
</div>
@endsection
