@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Appointment</h2>
    <form method="POST" action="{{ route('appointments.store') }}">
        @csrf
        <div class="mb-3">
            <label>First Name</label>
            <input type="text" name="firstname" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Middle Name</label>
            <input type="text" name="middlename" class="form-control">
        </div>
        <div class="mb-3">
            <label>Last Name</label>
            <input type="text" name="lastname" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Address</label>
            <input type="text" name="address" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Phone Number</label>
            <input type="text" name="number" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Appointment Date</label>
            <input type="date" name="appointment_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Type of Action</label>
            <select name="type_of_action" class="form-control" required>
                <option value="brace">Brace</option>
                <option value="teeth cleaning">Teeth Cleaning</option>
                <option value="root canal">Root Canal</option>
                <option value="pasta">Pasta</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection
