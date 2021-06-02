@extends('layouts.app_admin')


@section('content')
    <br/>
    <h3 align="center">STAFF DETAILS</h3>
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th>StaffID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Edit Link</th>
                        <th>Delete Link</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td>{{ $row->staff_id}}</td>
                            <td>{{ $row->first_name }}</td>
                            <td>{{ $row->surname }}</td>
                            <td>{{ $row->email }}</td>
                            <td><a href="admin_staff/delete/{{$row->id}}">Delete</a></td>
                            <td><a href="admin_staff/edit_staff/{{$row->id}}">Edit</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$data->links()}}
            </div>
        </div>
    </div>
@endsection
<style>
    .w-5 {
        display: none;
    }
</style>
