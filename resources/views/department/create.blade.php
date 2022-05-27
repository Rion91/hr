<x-app-layout>
    @section('header', 'Create department')

    @section('content')
        <div class="card">
            <div class="card-body">
                <form action="{{ route('department.store') }}" method="POST"
                      autocomplete="off" id="create-form">
                    @csrf
                    <div class="md-form mb-2">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" autofocus>
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
        {!! JsValidator::formRequest('App\Http\Requests\StoreDepartment', '#create-form'); !!}
        <script>
            $(document).ready(function () {

            })
        </script>
    @endsection
</x-app-layout>
