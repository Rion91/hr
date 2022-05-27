<x-app-layout>
    @section('header', 'Edit role')

    @section('content')
        <div class="card">
            <div class="card-body">
                <form action="{{ route('role.update', $role->id) }}" method="POST"
                      autocomplete="off" id="edit-form">
                    @csrf
                    @method('PUT')
                    <div class="md-form mb-2">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $role->name }}"
                               autofocus>
                    </div>

                    <label for="permission" class="mb-2">Permission</label>
                    <div class="row">
                        @foreach($permissions as $permission)
                            <div class="col-md-3 col-6">
                                <div class="form-check">
                                    <input type="checkbox" name="permissions[]" class="form-check-input"
                                           value="{{ $permission->name }}" id="checkbox_{{ $permission->id }}"
                                           @if(in_array($permission->id, $oldPermissions)) checked @endif
                                    >
                                    <label class="form-check-label"
                                           for="checkbox_{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
                            </div>
                        @endforeach
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
        {!! JsValidator::formRequest('App\Http\Requests\UpdateRole', '#edit-form'); !!}
        <script>
            $(document).ready(function () {

            })
        </script>
    @endsection
</x-app-layout>
