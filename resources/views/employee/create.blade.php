<x-app-layout>
    @section('header', 'Create employee')

    @section('content')
        <div class="card">
            <div class="card-body">
                <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data"
                      autocomplete="off" id="create-form">
                    @csrf
                    <div class="md-form mb-2">
                        <label for="employee_id">Employee ID</label>
                        <input type="text" name="employee_id" class="form-control" autofocus>
                    </div>
                    <div class="md-form mb-2">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="md-form mb-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="md-form mb-2">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" class="form-control">
                    </div>
                    <div class="md-form mb-2">
                        <label for="nrc_number">Nrc Number</label>
                        <input type="text" name="nrc_number" class="form-control">
                    </div>
                    <div class="md-form mb-2">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="md-form mb-2">
                        <label for="birthday">Birthday</label>
                        <input type="text" name="birthday" class="form-control birthday">
                    </div>
                    <div class="md-form mb-2">
                        <label for="date_of_join">Date Of Join</label>
                        <input type="text" name="date_of_join" class="form-control date_of_join">
                    </div>
                    <div class="md-form mb-2">
                        <label for="department">Department</label>
                        <select name="department_id" id="department" class="form-control">
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="md-form mb-2">
                        <label for="role">Role (or) Designation</label>
                        <select name="roles[]" id="role" class="select-hr form-control" multiple>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md-form mb-2">
                        <label for="is_present">Is Present?</label>
                        <select name="is_present" id="is_present" class="form-control">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="md-form mb-2">
                        <label for="address">Address</label>
                        <textarea name="address" class="md-textarea form-control" row="3"></textarea>
                    </div>
                    <div class="md-form mb-2">
                        <label for="profile_img">Profile Image</label>
                        <input type="file" name="profile_img" class="form-control" id="profile_img">
                        <div class="preview_img">

                        </div>
                    </div>
                    <div class="md-form mb-2">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
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
        {!! JsValidator::formRequest('App\Http\Requests\StoreEmployee', '#create-form'); !!}
        <script>
            $(document).ready(function () {
                $('.birthday').daterangepicker({
                    "singleDatePicker": true,
                    "autoApply": true,
                    "showDropdowns": true,
                    "maxDate": moment(),
                    "locale": {
                        "format": "YYYY-MM-DD"
                    }
                });
                $('.date_of_join').daterangepicker({
                    "singleDatePicker": true,
                    "autoApply": true,
                    "showDropdowns": true,
                    "locale": {
                        "format": "YYYY-MM-DD"
                    }
                });
                $('#profile_img').on('change', function () {
                    var file_length = document.getElementById('profile_img').files.length;
                    $('.preview_img').html('');
                    for (var i = 0; i < file_length; i++) {
                        $('.preview_img').append(`<img src='${URL.createObjectURL(event.target.files[i])}' />`)
                    }
                });
            })
        </script>
    @endsection
</x-app-layout>
