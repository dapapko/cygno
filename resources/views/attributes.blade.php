@extends('adminlte::page')

@section('title', 'Список атрибутов')

@section('content_header')

@stop

@section('content')
<div class = "card">
    <div class = "card-header">
        <h3 class = "card-title">Список атрибутов</h3>
        <div class = "card-tools">
            <a class = "btn btn-success btn-sm" href = "/attributes/add">Добавить атрибут</a>
        </div>
    </div>

    <div class = "card-body">

    <table class = "table">
        <thead>
        <tr>
            <th>Название</th>
            <th>Тип</th>
            <th>Критерий фильтрации</th>
            <th>Входит в рез.формулу</th>
        </tr>
        </thead>
        <tbody>
        @foreach($attrs as $attr)
            <tr>
                <td> {{$attr->name}} </td>
                <td> {{$attr->type}} </td>
                <td> {{$attr->selector ? "Да": "Нет"}} </td>
                <td> {{$attr->calc ? "Да": "Нет"}} </td>
                <td> <a href = "/attributes/delete/{{$attr->id}}" class = "btn btn-block btn-danger btn-sm">Удалить</a></td>
                <td> <a href = "/attributes/edit/{{$attr->id}}" class = "btn btn-block btn-info btn-sm">Редактировать</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div></div>
@stop


@section('css')
@stop

@section('js')
@stop