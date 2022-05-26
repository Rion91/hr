<x-app-layout>
    @section('header', 'Employees')

    @section('content')
        <div class="mb-2">
            <a href="{{ route('employee.create') }}" class="btn btn-theme btn-sm"><i class="fas fa-plus-circle"></i>Create
                Employees</a>
        </div>
        <div class="card">
            <dic class="card-body">
                <table class="table table-bordered table-hover border-gray-200 Datatable" style="width: 100%">
                    <thead class="bg-gray-100">
                    <th class="text-center noOrder noSearch"></th>
                    <th class="text-center border border-l-2">Employee ID</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Phone</th>
                    <th class="text-center">Department</th>
                    <th class="text-center noOrder noSearch hidden">is present?</th>
                    <th class="text-center noOrder noSearch">Action</th>
                    <th class="text-center hidden noOrder noSearch">Updated at</th>
                    </thead>
                </table>
            </dic>
        </div>
    @endsection

    @section('script')
        <script>
            $(document).ready(function () {
                var table = $('.Datatable').DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('employee.index') !!}',
                    columns: [
                        {data: 'plusIcon', name: 'plusIcon', class: "text-center"},
                        {data: 'employee_id', name: 'employee_id', class: 'text-center border border-l-2'},
                        {data: 'name', name: 'name', class: 'text-center'},
                        {data: 'email', name: 'email', class: 'text-center'},
                        {data: 'phone', name: 'phone', class: 'text-center'},
                        {data: 'department_name', name: 'department_name', class: 'text-center'},
                        {data: 'is_present', name: 'is_present', class: 'text-center'},
                        {data: 'action', name: 'action', class: 'text-center'},
                        {data: 'updated_at', name: 'updated_at', class: 'text-center'}
                    ],
                    order: [[8, "desc"]],
                    columnDefs: [
                        {
                            "targets": "hidden",
                            "visible": false,
                        },
                        {
                            "targets": [0],
                            "class": "control",
                        },
                        {
                            "targets": "noOrder",
                            "orderable": false,
                        },
                        {
                            "targets": "noSearch",
                            "searchable": false,
                        }
                    ],
                    language: {
                        "paginate": {
                            "next": "<i class='fa-solid fa-angle-right'></i>",
                            "previous": "<i class='fa-solid fa-angle-left'></i>"
                        },
                        "processing": "<img src='/images/loading.gif' style='width: 50px; height: 50%;'/>"
                    },

                });

                $(document).on('click', '.delete-btn', function (event) {
                    event.preventDefault();

                    var id = $(this).data('id');
                    swal({
                        title: "Are you sure?",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                            if (willDelete) {
                                $.ajax({
                                    method: "DELETE",
                                    url: `/employee/${id}`,
                                }).done(function (response) {
                                        table.ajax.reload();
                                    });
                            }
                        });
                });
            });
        </script>
    @endsection
</x-app-layout>
