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
                        <form action="edit_unit", method="post">
                            @csrf

                            <div class="form-group row">

                                <div class="col-md-6">
                                    <input id="id" type="hidden" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" value="{{ $row->id }}">

                                    @if ($errors->has('id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="unit_code" class="col-md-4 col-form-label text-md-right">{{ __('Unit Code') }}</label>

                                <div class="col-md-6">
                                    <input id="unit_code" type="text" class="form-control{{ $errors->has('unit_code') ? ' is-invalid' : '' }}" name="unit_code" value="{{$row->unit_code }}">

                                    @if ($errors->has('unit_code'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('unit_code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="unit_name" class="col-md-4 col-form-label text-md-right">{{ __('Unit Name') }}</label>

                                <div class="col-md-6">
                                    <input id="unit_name" type="text" class="form-control{{ $errors->has('unit_name') ? ' is-invalid' : '' }}" name="unit_name" value="{{ $row->unit_name }}">

                                    @if ($errors->has('unit_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('unit_name') }}</strong>
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
