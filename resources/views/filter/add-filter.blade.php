@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Добавить фильтр</h1>
@stop

@section('content')
    <div class="card card-default">
        <div class="card-body">
            <form method = "post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Атрибут</label>
                            <select class="form-control" name = "attr">
                                @foreach($attrs as $attr)
                                <option value = "{{$attr->name}}">{{$attr->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

<div class = "row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Описание</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name = "desc" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Условие</label>

                            <select class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" name = "condition">
                                <option value = "IN">Вхождение во множество</option>
                                <option value = "[]">Вхождение в отрезок</option>
                                <option value = "<"><</option>
                                <option value = ">">></option>
                                <option value = "eq">Равенство</option>
                                <option value = "bool">Истинность</option>
                            </select>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Опции (только для вхождения во множество)</label>
                            <pre>В формате {"value:"label", ...}</pre>
                            <input type="text" class="form-control" placeholder="Enter ..." name = "options" >
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <input type="submit" class="btn btn-info"></input>

                </div>

    </form>
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