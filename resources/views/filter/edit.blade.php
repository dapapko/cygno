@extends('adminlte::page')

@section('title', 'Изменить фильтр')

@section('content_header')
    <h1>Изменить фильтр</h1>
@stop

@section('content')
    <div class="card card-default">
        <div class="card-body">
            <form method = "post">
                {{ csrf_field() }}


                <div class = "row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Описание</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name = "label" value = "{{$filter->label}}" >
                        </div>
                    </div>
                </div>


                <div class = "row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Минимум</label>
                            <input type="number" class="form-control" placeholder="Enter ..." name = "min" value = "{{$filter->min}}" >
                        </div>
                    </div>
                </div>

                <div class = "row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Максимум</label>
                            <input type="number" step = "0.001" class="form-control" placeholder="Enter ..." name = "max" value = "{{$filter->max}}" >
                        </div>
                    </div>
                </div>

                <div class = "row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Шаг</label>
                            <input type="number" step = "0.001" class="form-control" placeholder="Enter ..." name = "step" value = "{{$filter->step}}" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Сегменты клиентов</label>


                            <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name = "groups[]"  multiple="multiple">
                                @foreach($groups as $group)
                                    @if($associated->contains($group))
                                        <option value = {{ $group->id }} selected = "selected">{{ $group->label }}</option>
                                    @else
                                        <option value = {{ $group->id }} >{{ $group->label }}</option>
                                    @endif
                                @endforeach
                            </select>

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