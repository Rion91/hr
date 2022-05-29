<x-app-layout>
    @section('header', 'Hr Hub')
    @section('content')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center">
                            <img src="{{ $employee->profileImgPath() }}" class="profile-img" alt="">
                            <div class="py-4 px-3">
                                <h4>{{ ucwords($employee->name) }}</h4>
                                <p class="mb-2">
                                    <span class="text-muted">
                                        {{ $employee->employee_id }}
                                    </span>
                                    <span class="text-theme">
                                       | {{ $employee->phone }}
                                    </span>
                                </p>
                                <p class="text-muted mb-2">
                                    <span class="badge badge-pill badge-light border">
                                        {{ $employee->department ? $employee->department->title : '-' }}
                                    </span>
                                </p>
                                <p class="text-muted mb-2">
                                    @foreach($employee->roles as $role)
                                        <span class="badge badge-pill badge-primary border">
                                            {{ $role->name }}
                                        </span>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    @endsection
</x-app-layout>
