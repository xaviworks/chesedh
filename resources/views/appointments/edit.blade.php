@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Appointment</h2>
    <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Appointment Date</label>
            <input type="date" name="appointment_date" value="{{ $appointment->appointment_date }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Type of Action</label>
            <select name="type_of_action" class="form-control" required>
                <option value="brace" {{ $appointment->type_of_action == 'brace' ? 'selected' : '' }}>Brace</option>
                <option value="teeth cleaning" {{ $appointment->type_of_action == 'teeth cleaning' ? 'selected' : '' }}>Teeth Cleaning</option>
                <option value="root canal" {{ $appointment->type_of_action == 'root canal' ? 'selected' : '' }}>Root Canal</option>
                <option value="pasta" {{ $appointment->type_of_action == 'pasta' ? 'selected' : '' }}>Pasta</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
