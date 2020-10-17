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
                                        @if($entry->{$field->name} == $value)
                                        <option value = "{{ $value }}" selected="selected">{{ $label }}</option>
                                @else
                                    <option value = "{{ $value }}" >{{ $label }}</option>
                                @endif
                                    @endforeach
                                </select>


        @elseif($field->type == "checkbox")

            <div class="custom-control custom-checkbox">
                @if($entry->{$field->name} == true)
                    <input class="custom-control-input" type="checkbox" name = " {{ $field->name }}" checked >
                @else
                    <input class="custom-control-input" type="checkbox" name = " {{ $field->name }}" >
                @endif
                <label class="custom-control-label">{{ $field->desc }}</label>
            </div>

        @elseif($field->type == "switch")
            <div class="custom-control custom-switch">
                @if($entry->{$field->name} == true)
                    <input class="custom-control-input" type="checkbox" name = " {{ $field->name }}" checked >
                @else
                    <input class="custom-control-input" type="checkbox" name = " {{ $field->name }}" >
                @endif
            </div>

        @elseif($field->type == "number")
            <div class = "col-4">
                <label>{{ $field->desc  }}</label>
            <input type="number" class = "form-control"  placeholder="Enter ..." name = "{{ $field->name }}" value = "{{ $entry->{$field->name} }}">
            </div>
        @elseif($field->type == "text")
                <label>{{ $field->desc  }}</label>
            <input type="text" class="form-control" placeholder="Enter ..." name = "{{ $field->name }}" value = "{{ $entry->{$field->name} }}">

        @endif
        </div>
        </div>
    @endforeach
    <div class="card-footer">
        <input type="submit" class="btn btn-info" value = "Сохранить"></input>

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