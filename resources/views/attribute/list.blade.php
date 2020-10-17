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
        </tr>
        </thead>
        <tbody>
        @foreach($attrs as $attr)
            <tr>
                <td> {{$attr->slug}} </td>
                <td> {{$attr->type}} </td>
                <td> <a href = "/attributes/delete/{{$attr->id}}" class = "btn btn-block btn-danger btn-sm"><i class = "fa fa-trash"></i></a></td>
                <td> <a href = "/attributes/edit/{{$attr->id}}" class = "btn btn-block btn-info btn-sm"><i class = "fa fa-pen"></i></a></td>
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