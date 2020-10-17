@extends('adminlte::page')

@section('title', 'Результаты')

@section('content_header')
    <h1>Результаты поиска</h1>
@stop

@section('content')

    <table class = "table table-bordered">
        <thead>
        <tr>
            <th>Название</th>
            <th>Индекс</th>
        </tr>
        </thead>
        <tbody>
        @foreach($results as $result)
            <tr>
                <td> {{$result['name']}} </td>
                <td> {{$result['overall_index']}} </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@stop


@section('css')
@stop

@section('js')
@stop