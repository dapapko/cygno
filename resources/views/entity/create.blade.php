@extends('adminlte::page')

@section('title', 'Добавление записи')

@section('content_header')
    <h1>Добавление записи</h1>
@stop

@section('content')
    <form method = "post">
        {{ csrf_field() }}
<div class = "row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Название</label>
                <input type = "text" name = "name" class = "form-control">
            </div>
        </div>
</div>
        @foreach($fields as $field)
                <div class="form-group">
                    @if($field->type == "TEXT" )
                        <div class = "col-4">
                        @php ($options = json_decode($field->variants))
                            {{ Aire::select($options, $field->slug)->label($field->label)->multiple()->ariaHidden(true)->addClass("form-control select2bs4 select2-hidden-accessible")->style("width:100%") }}
                </div>

                @elseif($field->type == "BOOLEAN")
                    <div class="form-check">
                        {{Aire::checkbox($field->slug)->label($field->label)->addClass("form-check-input")}}
                    </div>


                @elseif($field->type == "FLOAT" || $field->type == "INT")
                    <div class = "col-4">
                        @if($field->type == "INT") {{ Aire::number($field->slug)->label($field->label)->addClass("form-control") }}
                    @else {{ Aire::number($field->slug)->step(0.01)->label($field->label)->addClass("form-control") }}
@endif
                    </div>

                @endif
            </div>

        @endforeach
        <div class="card-footer">
            <input type="submit" class="btn btn-info">Сохранить</input>
        </div>
        </div>
    </form>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script> $(document).ready(function() {
            $('.select2bs4').select2();
        });</script>
@stop