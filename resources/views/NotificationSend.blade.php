@extends('layouts.app')

@foreach($data as $row) @endforeach

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" align="center" style="">
                        <h1 style="width: 100%">Absence Form</h1>
                    </div>

                    <div class="card-body" style="height: 500px">
                        <form action="NotificationSend", method="POST">
                            @csrf

                            @if(Session::get('success'))
                                <div class="alert alert-success">
                                    {{ 'Your request has been successfully sent!' }}
                                </div>
                            @endif

                            @if(Session::get('fail'))
                                <div class="alert alert-fail">
                                    {{ 'Something went wrong!'  }}
                                </div>
                            @endif

                            @if(Session::get('bad'))
                                <div class="alert alert-warning" style="color: red">
                                    {{ 'Your request is already over date' }}
                                </div>
                            @endif

                                <div class="col-md-6">
                                    <input id="timetable_id" type="hidden" class="form-control{{ $errors->has('timetable_id') ? ' is-invalid' : '' }}" name="timetable_id" value="{{$row->id }}" >

                                    @if ($errors->has('timetable_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('timetable_id') }}</strong>
                                    </span>
                                    @endif
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
                                <label for="staff" class="col-md-4 col-form-label text-md-right">{{ __('Staff Name') }}</label>

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
                                <label for="position_type" class="col-md-4 col-form-label text-md-right">{{ __('Position Type') }}</label>

                                <div class="col-md-6">
                                    <input id="position_type" class="form-control{{ $errors->has('position_type') ? ' is-invalid' : '' }}" name="position_type" value="{{$row->position_type}}" disabled>
                                    @if ($errors->has('position_type'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('position_type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="unit" class="col-md-4 col-form-label text-md-right">{{ __('Unit Name') }}</label>

                                <div class="col-md-6">
                                    <input id="unit" type="" class="form-control{{ $errors->has('unit') ? ' is-invalid' : '' }}" name="unit" value="{{$row->unit_name}}" disabled>

                                    @if ($errors->has('unit'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('unit') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                                <div class="col-md-6">
                                    <input id="day" type="hidden" class="form-control{{ $errors->has('day') ? ' is-invalid' : '' }}" name="day" value="{{$row->day}}" disabled>

                                    @if ($errors->has('day'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('day') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            <div class="form-group row">
                                <label for="reason" class="col-md-4 col-form-label text-md-right">{{ __('Reason') }}</label>

                                <div class="col-md-6">
                                    <textarea id="reason" type="" class="form-control{{ $errors->has('reason') ? ' is-invalid' : '' }}" name="reason" value="" style="height: 200px"></textarea>

                                    @if ($errors->has('reason'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('reason') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
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
