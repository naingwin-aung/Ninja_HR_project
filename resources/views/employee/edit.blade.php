@extends('layouts.app')
@section('title', 'Employee Create')

@section('content')
<div class="card create_form">
    <div class="card-body">

        @include('layouts.flash')

        <form action="{{route('employee.update', $employee->id)}}" method="POST" id="employee_edit" autocomplete="off" enctype="multipart/form-data" id="employee_create">
            @csrf
            @method('PUT')
            <div class="md-form">
                <label>Employee ID</label>
                <input type="text" name="employee_id" class="form-control" value="{{$employee->employee_id}}">
            </div>
            <div class="md-form">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{$employee->name}}">
            </div>
            <div class="md-form">
                <label>Phone</label>
                <input type="number" name="phone" class="form-control" value="{{$employee->phone}}">
            </div>
            <div class="md-form">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="{{$employee->email}}">
            </div>
            <div class="md-form">
                <label>Nrc Number</label>
                <input type="text" name="nrc_number" class="form-control" value="{{$employee->nrc_number}}">
            </div>
            <div class="md-form">
                <div class="mb-3">
                    <label>Gender</label><br/>
                </div>
                <div class="px-4">
                    <div class="custom-control custom-radio mb-2">
                        <input type="radio" class="custom-control-input form-control" id="defaultGroupExample1" name="gender" value="male" {{$employee->gender == 'male' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="defaultGroupExample1">Male</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="gender" value="female" {{$employee->gender == 'female' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="defaultGroupExample2">Female</label>
                    </div>
                </div>
            </div>
            <div class="md-form">
                <div class="mb-4">
                    <label>Date of Birth</label><br/>
                </div>
                <input type="text" name="birthday" id="birthday" class="form-control" value="{{$employee->birthday}}">
            </div>
            <div class="md-form">
                <textarea id="form7" class="md-textarea form-control" rows="3" name="address">{{$employee->address}}</textarea>
                <label for="form7">Address</label>
            </div>
            <div class="md-form">
                <div class="mb-4">
                    <label>Department</label><br/>
                </div>
                <select name="department_id" class="form-control">
                    @foreach ($departments as $department)
                        <option value="{{$department->id}}" {{$department->id == $employee->department_id ? 'selected' : '' }}>{{$department->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="md-form">
                <div class="mb-4">
                    <label>Date of Join</label><br/>
                </div>
                <input type="text" name="date_of_join" id="date_of_join" class="form-control" value="{{$department->date_of_join}}">
            </div>
            <div class="md-form">
                <div class="mb-4">
                    <label>Is Present?</label><br/>
                </div>
                <select name="is_present" class="form-control">
                    <option value="1" {{$employee->is_present == 1 ? 'selected' : ''}}>Yes</option>
                    <option value="0" {{$employee->is_present == 0 ? 'selected' : ''}}>No</option>
                </select>
            </div>
            <div class="md-form">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn_theme">Confirm</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\UpdateEmployeeRequest', '#employee_edit') !!}
    <script>
        $('#birthday').daterangepicker({
            singleDatePicker: true,
            locale: {
                format: 'YYYY-MM-DD'
            },
            showDropdowns: true,
            maxDate : moment(),
            autoApply: true,
        })

        $('#date_of_join').daterangepicker({
            singleDatePicker: true,
            locale: {
                format: 'YYYY-MM-DD'
            },
            showDropdowns: true,
            drops: "up",
            autoApply: true,
        })
    </script>
@endsection