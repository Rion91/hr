<x-app-layout>
    @section('header', 'Create permission')

    @section('content')
        <div class="card">
            <div class="card-body">
                    <form action="{{ route('permission.store') }}" method="POST"
                          autocomplete="off" id="create-form">
                        @csrf
                        <div class="md-form mb-2">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" autofocus>
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
        {!! JsValidator::formRequest('App\Http\Requests\StorePermission', '#create-form'); !!}
        <script>
            $(document).ready(function () {

            })
        </script>
    @endsection
</x-app-layout>
