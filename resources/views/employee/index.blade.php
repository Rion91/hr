<x-app-layout>
    @section('header', 'Employees')

    @section('content')
        <div class="card">
            <dic class="card-body">
                <table class="table table-bordered Datatable">
                    <thead>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Department</th>
                    <th>is present?</th>
                    </thead>
                </table>
            </dic>
        </div>
    @endsection

    @section('script')
        <script>
            $(document).ready(function () {
                $('.Datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('employee.index') !!}',
                    columns: [
                        {data: 'id', name: 'id', class: 'text-center'},
                        {data: 'name', name: 'name', class: 'text-center'},
                        {data: 'email', name: 'email', class: 'text-center'},
                        {data: 'phone', name: 'phone', class: 'text-center'},
                        {data: 'department_name', name: 'department_name', class: 'text-center'},
                        {data: 'is_present', name: 'is_present', class: 'text-center'}
                    ]
                });
            });
        </script>
    @endsection
</x-app-layout>
