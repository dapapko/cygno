@extends('adminlte::page')

@section('title', 'Фильтр')

@section('content_header')
    <h1>Фильтр</h1>
@stop

@section('content')
    <div class="col-md-4">
        <div class="form-group">
            <form method = "post" enctype="multipart/form-data">
            {{ csrf_field() }}
            Logo:
            <br />
            <input type="file" name="import" />
            <br /><br />
            <input type="submit" value=" Save " />
            </form>
        </div>
    </div>
    @stop