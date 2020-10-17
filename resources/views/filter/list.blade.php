@extends('adminlte::page')

@section('title', 'Список фильтров')

@section('content_header')


@stop

@section('content')
    <div class="card">
        <div class = "card-header">
            <h3 class = "card-title">Список критериев фильтрации</h3>
            <div class = "card-tools">
                <a class="btn btn-success btn-sm" href="/filters/add">Добавить критерий фильтрации</a>
            </div>
        </div>

        <div class="card-body">
            <div class="col-md-9">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Атрибут</th>
                        <th>Условие</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($filters as $filter)
                        <tr>
                            <td> {{$filter->label}} </td>
                            <td> {{$filter->condition}} </td>
                            <td> <a href = "/filters/delete/{{$filter->id}}" class = "btn btn-block btn-danger btn-sm"><i class = "fa fa-trash"></i></a></td>
                            <td> <a href = "/filters/edit/{{$filter->id}}" class = "btn btn-block btn-info btn-sm"><i class = "fa fa-pen"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop


@section('css')
@stop

@section('js')
@stop