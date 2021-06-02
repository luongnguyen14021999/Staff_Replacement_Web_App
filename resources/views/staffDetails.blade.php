@extends('layouts.app_admin')
@section('content')
    <h1 class="card-header">
        Staff import:
    </h1>
    <div class="card-body">
        <form action="{{ route('import_staff') }}" method="POST" name="importform" enctype="multipart/form-data">
            @csrf
            <input type="file" name="import_file" class="form-control">
            <br>
            <button class="btn btn-success">Import File</button>
        </form>
        <a href="deleteStaff">Delete</a>
    </div>
    <h1 class="card-header">
        Timetable import:
    </h1>
    <div class="card-body">
        <form action="{{ route('import_timetable') }}" method="POST" name="importform" enctype="multipart/form-data">
            @csrf
            <input type="file" name="import_file" class="form-control">
            <br>
            <button class="btn btn-success">Import File</button>
        </form>
        <a href="deleteTimetable">Delete</a>
    </div>
@endsection
<style>
    .w-5 {
        display: none;
    }
</style>
