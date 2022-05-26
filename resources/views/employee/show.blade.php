<x-app-layout>
    @section('header', 'Employee Info')

    @section('content')
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-md-6">
                        <div class="mb-3">
                            <p class="mb-1"><i class="fab fa-gg"></i> Employee ID</p>
                            <p class="test-mute mb-1">{{ $employee->employee_id }}</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <p class="mb-1"><i class="fab fa-gg"></i> Name</p>
                            <p class="test-mute mb-1">{{ $employee->name }}</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <p class="mb-1"><i class="fab fa-gg"></i> Email</p>
                            <p class="test-mute mb-1">{{ $employee->email }}</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <p class="mb-1"><i class="fab fa-gg"></i> Phone</p>
                            <p class="test-mute mb-1">{{ $employee->phone }}</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <p class="mb-1"><i class="fab fa-gg"></i> Nrc Number</p>
                            <p class="test-mute mb-1">{{ $employee->nrc_number }}</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <p class="mb-1"><i class="fab fa-gg"></i> Gender</p>
                            <p class="test-mute mb-1">{{ ucwords($employee->gender) }}</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <p class="mb-1"><i class="fab fa-gg"></i> Birthday</p>
                            <p class="test-mute mb-1">{{ $employee->birthday }}</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <p class="mb-1"><i class="fab fa-gg"></i> Address</p>
                            <p class="test-mute mb-1">{{ $employee->address }}</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <p class="mb-1"><i class="fab fa-gg"></i> Department</p>
                            <p class="test-mute mb-1">{{ $employee->department ? $employee->department->title : '-' }}</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <p class="mb-1"><i class="fab fa-gg"></i> Date of join</p>
                            <p class="test-mute mb-1">{{ $employee->date_of_join }}</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <p class="mb-1"><i class="fab fa-gg"></i> Is Present?</p>
                            <p class="test-mute mb-1">
                                @if($employee->is_present == 1)
                                    <span class="badge badge-pill badge-light border border-success">Present</span>
                                @else
                                    <span class="badge badge-pill badge-light border border-warning">Leave</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
