@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Добавить атрибут</h1>
@stop

@section('content')
    <div class="card card-default">
        <div class="card-body">
            <form method = "post">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Псевдоним группы</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name = "slug" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Имя группы</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name = "label" >
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <input type="submit" class="btn btn-info">
                </div>

        </div>
    </div>
    </div>
    </div>
    </form>

@stop

@section('css')

@stop

@section('js')

@stop