@extends('layouts.app')
@section('title', 'Employees')

@section('content')
<div>
    <a href="{{route('employee.create')}}" class="btn_theme"><i class="fas fa-user pr-1"></i> CREATE EMPLOYEE</a>
</div>
<div class="card mt-3">
    <div class="card-body">
        <table id="datatable" class="table table-bordered">
            <thead>
                <th class="text-center">Employee Id</th>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Department</th>
                <th class="text-center">Is Present</th>
                <th class="text-center">Action</th>
            </thead>
        </table>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            let table = $('#datatable').DataTable( {
                processing: true,
                serverSide: true,
                ajax: "/employee/datatable/ssd",
                columns : [
                    {data: 'employee_id', name: 'employee_id', class: 'text-center'},
                    {data: 'name', name: 'name', class: 'text-center'},
                    {data: 'email', name: 'email', class: 'text-center'},
                    {data: 'phone', name: 'phone', class: 'text-center'},
                    {data: 'department_name', name: 'department_name', class: 'text-center'},
                    {data: 'is_present', name: 'is_present', class: 'text-center'},
                    {data: 'action', name: 'action', class: 'text-center'},
                ],
            } );

            $(document).on('click', '.delete_btn', function(e) {
                e.preventDefault();
                swal({
                    text: "Are you sure? You want to delete this user!",
                    icon: "info",
                    buttons: true,
                    dangerMode: true,
                 })
                .then((willDelete) => {
                    if (willDelete) {
                        let id = $(this).data('id');
                        $.ajax({
                            url : `/employee/${id}`,
                            method : 'DELETE',
                        }).done(function(res) {
                            table.ajax.reload();
                        })
                    }
                });
            })
        } );
    </script>
@endsection
