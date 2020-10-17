@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="card card-default">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Minimal</label>
                            <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" multiple="multiple">
                                <option>Alabama</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Minimal</label>
                            <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" multiple="multiple">
                                <option>Alabama</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script> $(document).ready(function() {
            $('.select2bs4').select2();
        });</script>
@stop