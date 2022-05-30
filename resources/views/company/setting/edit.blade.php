<x-app-layout>
    @section('header', 'Edit Company Setting')
    @section('content')
        <div class="card">
            <div class="card-body">
                <form action="{{ route('company-setting.update', $companySetting->id) }}" method="POST"
                      autocomplete="off" id="edit-form">
                    @csrf
                    @method('PUT')
                    <div class="md-form mb-2">
                        <label for="company_name">Company Name</label>
                        <input type="text" name="company_name" class="form-control"
                               value="{{ $companySetting->company_name }}"
                               autofocus>
                    </div>
                    <div class="md-form mb-2">
                        <label for="company_phone">Company Phone</label>
                        <input type="text" name="company_phone" class="form-control"
                               value="{{ $companySetting->company_phone }}">
                    </div>
                    <div class="md-form mb-2">
                        <label for="company_email">Company Email</label>
                        <input type="email" name="company_email" class="form-control"
                               value="{{ $companySetting->company_email }}">
                    </div>
                    <div class="md-form mb-2">
                        <label for="company_address">Company Address</label>
                        <textarea type="text" name="company_address" class="md-textarea form-control"
                        >{{ $companySetting->company_address }}</textarea>
                    </div>
                    <div class="md-form mb-2">
                        <label for="office_start_time">Office Start time</label>
                        <input type="text" name="office_start_time" class="form-control timepicker"
                               value="{{ $companySetting->office_start_time }}">
                    </div>
                    <div class="md-form mb-2">
                        <label for="office_end_time">Office end time</label>
                        <input type="text" name="office_end_time" class="form-control timepicker"
                               value="{{ $companySetting->office_end_time }}">
                    </div>
                    <div class="md-form mb-2">
                        <label for="break_start_time">Break Start time</label>
                        <input type="text" name="break_start_time" class="form-control timepicker"
                               value="{{ $companySetting->break_start_time }}">
                    </div>
                    <div class="md-form mb-2">
                        <label for="break_end_time">Break End time</label>
                        <input type="text" name="break_end_time" class="form-control timepicker"
                               value="{{ $companySetting->break_end_time }}">
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
        {!! JsValidator::formRequest('App\Http\Requests\UpdateCompanySetting', '#edit-form'); !!}
        <script>
            $(document).ready(function () {
                $('.timepicker').daterangepicker({
                    "singleDatePicker": true,
                    "autoApply": true,
                    "timePicker": true,
                    "timePicker24Hour": true,
                    "timePickerSeconds": true,
                    "locale": {
                        "format": "HH:mm:ss"
                    }

                }).on('show.daterangepicker', function (ev, picker) {
                    $('.calendar-table').hide();
                });
            })
        </script>
    @endsection
</x-app-layout>
