<x-app-layout>
    @section('header', 'Edit employee')

    @section('content')
        <div class="card">
            <div class="card-body">
                <form action="{{ route('employee.update', $employee->id) }}" method="POST" autocomplete="off"
                      id="edit-form">
                    @csrf
                    @method('PUT')
                    <div class="md-form mb-2">
                        <label for="employee_id">Employee ID</label>
                        <input type="text" name="employee_id" class="form-control" value="{{ $employee->employee_id }}"
                               autofocus>
                    </div>
                    <div class="md-form mb-2">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $employee->name }}">
                    </div>
                    <div class="md-form mb-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $employee->email }}">
                    </div>
                    <div class="md-form mb-2">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" class="form-control" value="{{ $employee->phone }}">
                    </div>
                    <div class="md-form mb-2">
                        <label for="nrc_number">Nrc Number</label>
                        <input type="text" name="nrc_number" class="form-control" value="{{ $employee->nrc_number }}">
                    </div>
                    <div class="md-form mb-2">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="male" {{ old('gender', $employee->gender) == 'male' ? 'selected' : '' }}>
                                Male
                            </option>
                            <option value="female" {{ old('gender', $employee->gender) == 'female' ? 'selected' : '' }}>
                                Female
                            </option>
                        </select>
                    </div>
                    <div class="md-form mb-2">
                        <label for="birthday">Birthday</label>
                        <input type="text" name="birthday" class="form-control birthday {{ $employee->birthday }}">
                    </div>
                    <div class="md-form mb-2">
                        <label for="date_of_join">Date Of Join</label>
                        <input type="text" name="date_of_join"
                               class="form-control date_of_join {{ $employee->date_of_join }}">
                    </div>
                    <div class="md-form mb-2">
                        <label for="department">Department</label>
                        <select name="department_id" id="department" class="form-control">
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ old('department_id', $employee->department->id) == $department->id ? 'selected' : '' }}
                                >{{ $department->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md-form mb-2">
                        <label for="is_present">Is Present?</label>
                        <select name="is_present" id="is_present" class="form-control">
                            <option value="1" {{ old('is_present', $employee->is_present) == '1' ? 'selected' : '' }}>
                                Yes
                            </option>
                            <option value="0" {{ old('is_present', $employee->is_present) == '0' ? 'selected' : '' }}>
                                No
                            </option>
                        </select>
                    </div>
                    <div class="md-form mb-2">
                        <label for="address">Address</label>
                        <textarea name="address" class="md-textarea form-control"
                                  row="3">{{ $employee->address }}</textarea>
                    </div>
                    <div class="md-form mb-2">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control">
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
        {!! JsValidator::formRequest('App\Http\Requests\UpdateEmployee', '#edit-form'); !!}
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
            })
        </script>
    @endsection
</x-app-layout>
