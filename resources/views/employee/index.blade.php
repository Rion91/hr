<x-app-layout>
    @section('header', 'Employees')

    @section('content')
        <div class="card">
            <dic class="card-body">
                <table class="table table-bordered Datatable">
                    <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
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
                    ajax: '{!! route('serverSide') !!}',
                    columns: [
                        {data: 'name', name: 'name', class: 'text-center'},
                        {data: 'email', name: 'email', class: 'text-center'},
                        {data: 'phone', name: 'phone', class: 'text-center'}
                    ]
                });
            });
        </script>
    @endsection
</x-app-layout>
