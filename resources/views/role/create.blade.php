<x-app-layout>
    @section('header', 'Create role')

    @section('content')
        <div class="card">
            <div class="card-body">
                <form action="{{ route('role.store') }}" method="POST"
                      autocomplete="off" id="create-form">
                    @csrf
                    <div class="md-form mb-2">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control mb-4" autofocus>
                    </div>

                    <label for="permission" class="mb-2">Permission</label>
                    <div class="row">
                        @foreach($permissions as $permission)
                            <div class="col-md-3 col-6">
                                <div class="form-check">
                                    <input type="checkbox" name="permissions[]" class="form-check-input"
                                           value="{{ $permission->name }}" id="checkbox_{{ $permission->id }}">
                                    <label class="form-check-label"
                                           for="checkbox_{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center mt-5 mb-3">
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-theme btn-sm btn-block">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection

    @section('script')
        {!! JsValidator::formRequest('App\Http\Requests\StoreRole', '#create-form'); !!}
        <script>
            $(document).ready(function () {

            })
        </script>
    @endsection
</x-app-layout>
