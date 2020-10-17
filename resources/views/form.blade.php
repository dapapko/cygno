@extends('adminlte::page')

@section('title', 'Редактирование записи')

@section('content_header')
    <h1>Редактирование записи</h1>
@stop

@section('content')

    @foreach($fields as $field)
        <div class="col-md-4">
            <div class="form-group">
                @if($field->type == "select" || $field->type == "multiselect")
                    @php ($options = json_decode($field->options))
                    @if($field->type == "select")
                        <label for = "form-control">{{ $field->desc  }}</label>
                        <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name = "{{ $field->name }}">
                            @else
                                <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name = "{{ $field->name }}" multiple="multiple">
                                    @endif

                                    @foreach($options as $value=>$label)
                                            <option value = "{{ $value }}" >{{ $label }}</option>
                                    @endforeach
                                </select>
            </div>


            @elseif($field->type == "checkbox")

                <div class="custom-control custom-checkbox">

                        <input class="custom-control-input" type="checkbox" name = " {{ $field->name }}" >
                    <label class="custom-control-label">{{ $field->desc }}</label>
                </div>

            @elseif($field->type == "switch")
                <div class="custom-control custom-switch">
                        <input class="custom-control-input" type="checkbox" name = " {{ $field->name }}" >
                </div>

            @elseif($field->type == "number")
                <label>{{ $field->desc  }}</label>
            <div class = "col-4">
                <input type="number"  placeholder="Enter ..." name = "{{ $field->name }}" class = "form-control">
        </div>
            @elseif($field->type == "text")
                <label>{{ $field->desc  }}</label>
                <input type="text" class="form-control" placeholder="Enter ..." name = "{{ $field->name }}" >

            @endif
        </div>
        </div>
    @endforeach
    <div class="card-footer">
        <button type="submit" class="btn btn-info">Создать</button>
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