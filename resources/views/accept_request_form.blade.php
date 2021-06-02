@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" align="center" style="">
                        <h1 style="width: 100%">Acceptance Form Details</h1>
                    </div>

                    <div class="card-body">
                        <form action="accept_request_form", method="post">
                            @csrf

                            @if(Session::get('success'))
                                <div class="alert alert-success">
                                    {{ 'Your acceptance successfully submit !' }}
                                </div>
                            @endif

                            @if(Session::get('fail'))
                                <div class="alert alert-warning" style="color: red">
                                    {{ 'This position is already taken !' }}
                                </div>
                            @endif



                            @foreach($data as $row) @endforeach

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="id" type="hidden" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" value="{{$row->id }}">
                                    @if ($errors->has('id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                                <div class="col-md-6">
                                    <input id="staff_id" type="hidden" class="form-control{{ $errors->has('staff_id') ? ' is-invalid' : '' }}" name="staff_id" value="{{ $row->staff_id }}">

                                    @if ($errors->has('staff_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('staff_id') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            <div class="form-group row">
                                <label for="staff" class="col-md-4 col-form-label text-md-right">{{ __('Request Staff') }}</label>

                                <div class="col-md-6">
                                    <input id="staff" type="text" class="form-control{{ $errors->has('staff') ? ' is-invalid' : '' }}" name="staff" value="{{ $row->first_name }} {{ $row->surname }}" disabled>

                                    @if ($errors->has('staff'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('staff') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="timetable_id" class="col-md-4 col-form-label text-md-right">{{ __('TimetableID') }}</label>

                                <div class="col-md-6">
                                    <input id="timetable_id" type="text" class="form-control{{ $errors->has('timetable_id') ? ' is-invalid' : '' }}" name="timetable_id" value="{{$row->timetable_id }}" disabled>

                                    @if ($errors->has('timetable_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('timetable_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="session" class="col-md-4 col-form-label text-md-right">{{ __('Session') }}</label>

                                <div class="col-md-6">
                                    <input id="session" type="text" class="form-control{{ $errors->has('session') ? ' is-invalid' : '' }}" name="session" value="{{ $row->session }}" disabled>

                                    @if ($errors->has('session'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('session') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="day" class="col-md-4 col-form-label text-md-right">{{ __('Day') }}</label>

                                <div class="col-md-6">
                                    <input id="day" type="text" class="form-control{{ $errors->has('day') ? ' is-invalid' : '' }}" name="day" value="{{ $row->day }}">

                                    @if ($errors->has('day'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('day') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="campus" class="col-md-4 col-form-label text-md-right">{{ __('Campus') }}</label>

                                <div class="col-md-6">
                                    <input id="campus" type="text" class="form-control{{ $errors->has('campus') ? ' is-invalid' : '' }}" name="campus" value="{{ $row->campus }}" disabled>

                                    @if ($errors->has('campus'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('campus') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="start_time" class="col-md-4 col-form-label text-md-right">{{ __('Start Time') }}</label>

                                <div class="col-md-6">
                                    <input id="start_time" type="time" class="form-control{{ $errors->has('start_time') ? ' is-invalid' : '' }}" name="start_time" placeholder="HH:MM:SS" value="{{ $row->start_time}}" disabled>

                                    @if ($errors->has('start_time'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('start_time') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

                                <div class="col-md-6">
                                    <input id="location" type="text" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" value="{{$row->location }}" disabled>

                                    @if ($errors->has('location'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Confirm') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
