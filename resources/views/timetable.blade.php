@extends('layouts.app')


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
                        <th>Unit Name</th>
                        <th>Day</th>
                        <th>Campus</th>
                        <th>Start Time</th>
                        <th>Location</th>
                        <th>Request</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td>{{ $row->unit_name }}</td>
                            <td>{{ $row->day }}</td>
                            <td>{{ $row->campus }}</td>
                            <td>{{ $row->start_time }}</td>
                            <td>{{ $row->location }}</td>
                            <td><a href="timetable/NotificationSend/{{$row->id}}">Absence Application</a></td>
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
