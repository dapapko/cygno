@extends('adminlte::page')

@section('title', 'Список  групп')

@section('content_header')


@stop

@section('content')
    <div class="card">
        <div class = "card-header">
            <h3 class = "card-title">Список групп</h3>

        </div>

        <div class="card-body">

            <div class="col-md-6">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Название</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($groups as $group)
                        <tr>
                            <td> {{$group->label}} </td>
                            <td> <a href = "/filter/{{$group->id}}" class = "btn btn-block btn-info btn-sm"><i class = "fa fa-filter"></i></a> </td>
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