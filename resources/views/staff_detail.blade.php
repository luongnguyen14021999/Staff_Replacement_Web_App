@extends('layouts.app')

@foreach($data as $row) @endforeach

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" align="center" style="">
                        <h1 style="width: 100%">Staff Details</h1>
                    </div>

                    <div class="card-body">
                        <form action="staff_detail", method="post">
                            @csrf

                            <div class="form-group row">
                                <label for="staff_id" class="col-md-4 col-form-label text-md-right">{{ __('StaffID') }}</label>

                                <div class="col-md-6">
                                    <input id="" type="text" class="form-control{{ $errors->has('staff_id') ? ' is-invalid' : '' }}" name="staff_id" value="{{ $row->staff_id }}" disabled>

                                    @if ($errors->has('staff_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('staff_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="timetableID" class="col-md-4 col-form-label text-md-right">{{ __('FirstName') }}</label>

                                <div class="col-md-6">
                                    <input id="timetableID" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="firstname" value="{{ $row->first_name }}" disabled>

                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="timetableID" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                                <div class="col-md-6">
                                    <input id="timetableID" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ $row->surname }}" disabled>

                                    @if ($errors->has('timetableID'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('timetableID') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="timetableID" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="timetableID" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" disabled>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
