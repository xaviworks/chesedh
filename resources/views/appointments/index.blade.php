@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Appointments</h2>
    <a href="{{ route('appointments.create') }}" class="btn btn-primary">Create Appointment</a>
    
    <div class="row mt-3">
        @foreach($appointments as $appointment)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $appointment->firstname }} {{ $appointment->lastname }}</h5>
                    <p class="card-text"><strong>Address:</strong> {{ $appointment->address }}</p>
                    <p class="card-text"><strong>Number:</strong> {{ $appointment->number }}</p>
                    <p class="card-text"><strong>Appointment Date:</strong> {{ $appointment->appointment_date }}</p>
                    <p class="card-text"><strong>Type of Action:</strong> {{ ucfirst($appointment->type_of_action) }}</p>
                </div>
                <div class="card-footer text-end">
                    @can('update', $appointment)
                        <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    @endcan
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection