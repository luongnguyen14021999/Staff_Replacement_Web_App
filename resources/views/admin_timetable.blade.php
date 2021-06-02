@extends('layouts.app_admin')

@section('content')
    <br/>
    <h3 align="center">TIMETABLE  DETAILS</h3>
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th>TimetableID</th>
                        <th>Session</th>
                        <th>Unit Name</th>
                        <th>Day</th>
                        <th>Campus</th>
                        <th>Start Time</th>
                        <th>Location</th>
                        <th>Staff Name</th>
                        <th>Position Type</th>
                        <th>Delete Action</th>
                        <th>Edit Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($timetable as $row)
                        <tr>
                            <td>{{ $row->timetable_id}}</td>
                            <td>{{ $row->session }}</td>
                            <td>{{ $row->unit->unit_code }}</td>
                            <td>{{ $row->day }}</td>
                            <td>{{ $row->campus }}</td>
                            <td>{{ $row->start_time }}</td>
                            <td>{{ $row->location }}</td>
                            <td>{{ $row->staff->first_name }} {{ $row->staff->surname }}</td>
                            <td>{{ $row->position_type }}</td>
                            <td><a href="admin_timetable/delete/{{$row->id}}">Delete</a></td>
                            <td><a href="admin_timetable/edit/{{$row->id}}">Edit</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{--                {{$timetable->links()}}--}}
            </div>
        </div>
    </div>
@endsection
<style>
    .w-5 {
        display: none;
    }
</style>
