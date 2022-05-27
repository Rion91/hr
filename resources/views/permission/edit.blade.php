<x-app-layout>
    @section('header', 'Edit permission')

    @section('content')
        <div class="card">
            <div class="card-body">
                <form action="{{ route('permission.update', $permission->id) }}" method="POST"
                      autocomplete="off" id="edit-form">
                    @csrf
                    @method('PUT')
                    <div class="md-form mb-2">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $permission->name }}"
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
        {!! JsValidator::formRequest('App\Http\Requests\UpdatePermission', '#edit-form'); !!}
        <script>
            $(document).ready(function () {

            })
        </script>
    @endsection
</x-app-layout>
