<x-app-layout>
    @section('header', 'Company Setting')

    @section('content')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <p class="mb-1">Company Name</p>
                        <p class="mb-1 text-muted">{{$companySetting->company_name}}</p>
                    </div>

                    <div class="col-md-6 mb-3">
                        <p class="mb-1">Company Email</p>
                        <p class="mb-1 text-muted">{{$companySetting->company_email}}</p>
                    </div>

                    <div class="col-md-6 mb-3">
                        <p class="mb-1">Company Phone</p>
                        <p class="mb-1 text-muted">{{$companySetting->company_phone}}</p>
                    </div>

                    <div class="col-md-6 mb-3">
                        <p class="mb-1">Company Address</p>
                        <p class="mb-1 text-muted">{{$companySetting->company_address}}</p>
                    </div>

                    <div class="col-md-6 mb-3">
                        <p class="mb-1">Office Start Time</p>
                        <p class="mb-1 text-muted">{{$companySetting->office_start_time}}</p>
                    </div>

                    <div class="col-md-6 mb-3">
                        <p class="mb-1">Office End Time</p>
                        <p class="mb-1 text-muted">{{$companySetting->office_end_time}}</p>
                    </div>

                    <div class="col-md-6 mb-3">
                        <p class="mb-1">Break Start Time</p>
                        <p class="mb-1 text-muted">{{$companySetting->break_start_time}}</p>
                    </div>

                    <div class="col-md-6 mb-3">
                        <p class="mb-1">Break End Time</p>
                        <p class="mb-1 text-muted">{{$companySetting->break_end_time}}</p>
                    </div>

                    @can('EditCompanySetting')
                        <div class="col-12">
                            <a href="{{route('company-setting.edit', 1)}}" class="btn btn-warning btn-sm"><i
                                    class="fas fa-edit"></i> EDIT COMPANY SETTING</a>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>

