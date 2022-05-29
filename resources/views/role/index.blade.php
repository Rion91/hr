<x-app-layout>
    @section('header', 'Roles')

    @section('content')
        <div class="mb-2">
            @can('CreateRoles')
                <a href="{{ route('role.create') }}" class="btn btn-theme btn-sm"><i class="fas fa-plus-circle"></i>Create
                    Role</a>
            @endcan
        </div>
        <div class="card">
            <dic class="card-body">
                <table class="table table-bordered table-hover border-gray-200 Datatable" style="width: 100%">
                    <thead class="bg-gray-100">
                    <th class="text-center noOrder noSearch"></th>
                    <th class="text-center border">Name</th>
                    <th class="text-center border">Permissions</th>
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
                    ajax: '{!! route('role.index') !!}',
                    columns: [
                        {data: 'plusIcon', name: 'plusIcon', class: "text-center"},
                        {data: 'name', name: 'name', class: 'text-center border'},
                        {data: 'permission', name: 'permission', class: 'text-center border'},
                        {data: 'action', name: 'action', class: 'text-center'},
                        {data: 'updated_at', name: 'updated_at', class: 'text-center'}
                    ],
                    order: [[4, "desc"]],

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
                                    url: `/role/${id}`,
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
