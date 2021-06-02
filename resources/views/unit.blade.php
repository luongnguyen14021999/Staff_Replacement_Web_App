@extends('layouts.app_admin')

@section('content')
    <br/>
    <h3 align="center">UNIT DETAILS</h3>
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th>Unit Code</th>
                        <th>Unit Name</th>
                        <th>Edit Link</th>
                        <th>Delete Link</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td>{{ $row->unit_code }}</td>
                            <td>{{ $row->unit_name }}</td>
                            <td><a href="admin_unit/delete/{{$row->id}}">Delete</a></td>
                            <td><a href="admin_unit/edit_unit/{{$row->id}}">Edit</a></td>
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

