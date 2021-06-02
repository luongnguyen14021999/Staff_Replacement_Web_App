@extends('layouts.app_admin')

@foreach($data as $row) @endforeach

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" align="center" style="">
                        <h1 style="width: 100%">Selected Row Details</h1>
                    </div>

                    <div class="card-body">
                        <form action="edit_staff", method="post">
                            @csrf

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
                                <label for="staff_id" class="col-md-4 col-form-label text-md-right">{{ __('StaffID') }}</label>

                                <div class="col-md-6">
                                    <input id="staff_id" type="text" class="form-control{{ $errors->has('staff_id') ? ' is-invalid' : '' }}" name="staff_id" value="{{$row->staff_id }}">

                                    @if ($errors->has('staff_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('staff_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ $row->first_name }}">

                                    @if ($errors->has('session'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('session') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ $row->surname }}">

                                    @if ($errors->has('surname'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $row->email }}">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
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
