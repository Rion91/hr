<x-app-layout>
    @section('header', 'Edit department')

    @section('content')
        <div class="card">
            <div class="card-body">
                <form action="{{ route('department.update', $department->id) }}" method="POST" enctype="multipart/form-data"
                      autocomplete="off" id="edit-form">
                    @csrf
                    @method('PUT')
                    <div class="md-form mb-2">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $department->title }}"
                               autofocus>
                    </div>
                    <div class="d-flex justify-content-center mt-5 mb-3">
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-theme btn-sm btn-block">
                                Confirm
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection

    @section('script')
        {!! JsValidator::formRequest('App\Http\Requests\UpdateDepartment', '#edit-form'); !!}
        <script>
            $(document).ready(function () {

            })
        </script>
    @endsection
</x-app-layout>
