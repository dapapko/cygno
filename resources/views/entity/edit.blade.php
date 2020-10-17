@extends('adminlte::page')

@section('title', 'Редактирование записи')

@section('content_header')
    <h1>Редактирование записи</h1>
@stop

@section('content')
    <div class="card card-default">
        <div class="card-body">
<form method = "post">
    {{ csrf_field() }}

    <div class = "col-md-4">
        <div class = "form-group">
            {{Aire::input('name')->label("Имя")->addClass('form-control')->value($entry->name)}}
        </div>
    </div>


    @foreach($fields as $field)
        <div class="col-md-4">
            <div class="form-group">

                @if($field->type == "TEXT")
                    @php ($options = json_decode($field->variants))
                    @php ($assoc = json_decode($entry->{$field->slug}))
                    {{ Aire::select($options, $field->slug)
->label($field->label)->multiple()
->ariaHidden(true)
->addClass("form-control select2bs4 select2-hidden-accessible")
->style("width:100%")->value($assoc) }}

        @elseif($field->type == "BOOLEAN")

            <div class="form-check">
                    {{Aire::checkbox($field->slug)->label($field->label)->addClass("form-check-input")->checked($entry->{$field->slug})}}
            </div>


                @elseif($field->type == "FLOAT" || $field->type == "INT")
                    <div class = "col-4">
                        @if($field->type == "INT") {{ Aire::number($field->slug)->label($field->label)->addClass("form-control")->value($entry->{$field->slug}) }}
                        @else {{ Aire::number($field->slug)->step(0.01)->label($field->label)->addClass("form-control")->value($entry->{$field->slug}) }}
                        @endif
                    </div>
        @endif
        </div>
        </div>
    @endforeach
    <div class="card-footer">
        <input type="submit" class="btn btn-info" value = "Сохранить">

    </div>
</form>
    </div> </div>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script> $(document).ready(function() {
            $('.select2bs4').select2();
        });</script>
@stop