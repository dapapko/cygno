@extends('adminlte::page')

@section('title', 'Список фильтров')

@section('content_header')


@stop

@section('content')
    <div class="card">
        <div class = "card-header">
            <h3 class = "card-title">Список банков</h3>
            <div class = "card-tools">
                <a class="btn btn-success btn-sm" href="/entities/add">Добавить банк</a>
            </div>
        </div>

        <div class="card-body">

            <div class="col-md-6">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($banks as $bank)
                        <tr>
                            <td> {{$bank->id}} </td>
                            <td> {{$bank->name}} </td>
                            <td> <a href = "/entities/delete/{{$bank->id}}" class = "btn btn-block btn-danger btn-sm"><i class = "fa fa-trash"></i></a> </td>
                            <td><a href = "/entities/edit/{{$bank->id}}" class = "btn btn-block btn-info btn-sm"><i class = "fa fa-pen"></i></a> </td>
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