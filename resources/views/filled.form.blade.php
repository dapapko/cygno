@extends('adminlte::page')

@section('title', 'Редактирование записи')

@section('content_header')
    <h1>Редактирование записи</h1>
@stop

@section('content')

    @foreach($fields as $field)
        <div class="col-md-4">
            <div class="form-group">
                <label>{{ $field->desc  }}</label>
                @if($field->input_type == "select" )
                    @php ($options = json_decode($field->options))

                        <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name = "{{ $field->name }}">

                                    @foreach($options as $value=>$label)
                                        @if($entry->{$field->name} == $value)
                                        <option value = "{{ $value }}" selected>{{ $label }}</option>
                                @else
                                    <option value = "{{ $value }}" >{{ $label }}</option>
                                @endif
                                    @endforeach
                                </select>
            </div>
        </div>
        @elseif($field->input_type == "checkbox")
            <div class="custom-control custom-checkbox">
                @if($entry->{$field->name} == true)
                    <input class="custom-control-input" type="checkbox" name = " {{ $field->name }}" checked >
                @else
                    <input class="custom-control-input" type="checkbox" name = " {{ $field->name }}" >
                @endif
                <label class="custom-control-label">{{ $field->desc }}</label>
            </div>

        @elseif($field->input_type == "switch")
            <div class="custom-control custom-switch">
                @if($entry->{$field->name} == true)
                    <input class="custom-control-input" type="checkbox" name = " {{ $field->name }}" checked >
                @else
                    <input class="custom-control-input" type="checkbox" name = " {{ $field->name }}" >
                @endif
                <label class="custom-control-label">{{ $field->desc }}</label>
            </div>
        @elseif($field->input_type == "number")
            <label>{{ $field->desc }}</label>
            <input type="number" class="form-control" placeholder="Enter ..." name = "{{ $field->name }}" value = "{{ $entry->{$field->name} }}}">

        @elseif($field->input_type == "text")
            <label>{{ $field->desc }}</label>
            <input type="text" class="form-control" placeholder="Enter ..." name = "{{ $field->name }}" value = "{{ $entry->{$field->name} }}}">
        @endif

    @endforeach
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script> $(document).ready(function() {
            $('.select2bs4').select2();
        });</script>
@stop