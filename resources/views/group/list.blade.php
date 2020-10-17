@extends('adminlte::page')

@section('title', 'Список фильтров')

@section('content_header')


@stop

@section('content')
    <div class="card">
        <div class = "card-header">
            <h3 class = "card-title">Список групп</h3>
            <div class = "card-tools">
                <a class="btn btn-success btn-sm" href="/groups/add">Добавить группу</a>
            </div>
        </div>

        <div class="card-body">

            <div class="col-md-6">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Название</th>
                        <th>Псевдоним</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($groups as $group)
                        <tr>
                            <td> {{$group->label}} </td>
                            <td> {{$group->slug}} </td>
                            <td> <a href = "/groups/delete/{{$group->id}}" class = "btn btn-block btn-danger btn-sm"><i class = "fa fa-trash"></i></a> </td>
                            <td> <a href = "/vector/{{$group->id}}" class = "btn btn-block btn-danger btn-sm"><i class = "fa fa-arrow-circle-down"></i></a> </td>
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