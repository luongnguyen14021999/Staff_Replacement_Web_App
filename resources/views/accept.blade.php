@extends('layouts.app')

@section('content')
    <br/>
    <h3 align="center">REPLACEMENT CLASS DETAILS</h3>
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th>Timetable ID</th>
                        <th>Request Staff</th>
                        <th>Session</th>
                        <th>Day</th>
                        <th>Campus</th>
                        <th>Start Time</th>
                        <th>Location</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                            <td>{{ $row->timetable_id}}</td>
                            <td>{{ $row->first_name }} {{ $row->surname }}</td>
                            <td>{{ $row->session }}</td>
                            <td>{{ $row->day }}</td>
                            <td>{{ $row->campus }}</td>
                            <td>{{ $row->start_time }}</td>
                            <td>{{ $row->location }}</td>
                            <td><a href="/accept/accept_request_form/{{$row->id}}">Accept</a></td>
                            <td><a href="/accept/reject_request_form/{{$row->id}}">Reject</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
<style>
    .w-5 {
        display: none;
    }
</style>
