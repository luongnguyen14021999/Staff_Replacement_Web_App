@extends('layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" align="center" style="">
                        <h1 style="width: 100%">Selected Row Details</h1>
                    </div>

                    <div class="card-body">
                        <form action="edit", method="post">
                            @csrf

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

                            <div class="form-group row">
                                <label for="timetable_id" class="col-md-4 col-form-label text-md-right">{{ __('TimetableID') }}</label>

                                <div class="col-md-6">
                                    <input id="timetable_id" type="text" class="form-control{{ $errors->has('timetable_id') ? ' is-invalid' : '' }}" name="timetable_id" value="{{$row->timetable_id }}">

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
                                    <input id="session" type="text" class="form-control{{ $errors->has('session') ? ' is-invalid' : '' }}" name="session" value="{{ $row->session }}">

                                    @if ($errors->has('session'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('session') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="unit_code_id" class="col-md-4 col-form-label text-md-right">{{ __('UnitID') }}</label>

                                <div class="col-md-6">
                                    <input id="unit_code_id" type="text" class="form-control{{ $errors->has('unit_code_id') ? ' is-invalid' : '' }}" name="unit_code_id" value="{{ $row->unit_code_id }}">

                                    @if ($errors->has('unit_code_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('unit_code_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="day" class="col-md-4 col-form-label text-md-right">{{ __('Day') }}</label>

                                <div class="col-md-6">
                                    <select id="day" class="form-control{{ $errors->has('day') ? ' is-invalid' : '' }}" name="day">
                                        <option selected>{{ $row->day }}</option>
                                        <option value="Mon">Mon</option>
                                        <option value="Tue">Tue</option>
                                        <option value="Wed">Wed</option>
                                        <option value="Thu">Thu</option>
                                        <option value="Fri">Fri</option>
                                    </select>

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
                                    <input id="campus" type="text" class="form-control{{ $errors->has('campus') ? ' is-invalid' : '' }}" name="campus" value="{{ $row->campus }}">

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
                                    <input id="start_time" type="time" class="form-control{{ $errors->has('start_time') ? ' is-invalid' : '' }}" name="start_time" placeholder="HH:MM:SS" value="{{ $row->start_time}}">

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
                                    <input id="location" type="text" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" value="{{$row->location }}">

                                    @if ($errors->has('location'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staff_id" class="col-md-4 col-form-label text-md-right">{{ __('StaffID') }}</label>

                                <div class="col-md-6">
                                    <input id="staff_id" type="text" class="form-control{{ $errors->has('staff_id') ? ' is-invalid' : '' }}" name="staff_id" value="{{ $row->staff_id }}">

                                    @if ($errors->has('staff_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('staff_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="position_type" class="col-md-4 col-form-label text-md-right">{{ __('Position Type') }}</label>

                                <div class="col-md-6">
                                    <select id="position_type" class="form-control{{ $errors->has('position_type') ? ' is-invalid' : '' }}" name="position_type">
                                        <option selected>{{ $row->position_type }}</option>
                                        <option value="Permanent">Permanent</option>
                                        <option value="Casual">Casual</option>
                                    </select>
                                    @if ($errors->has('position_type'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('position_type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Edit') }}
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
