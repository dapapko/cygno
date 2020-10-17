@extends('adminlte::page')

@section('title', 'Редактирование вектора')

@section('content_header')
    <h1>Редактирование вектора</h1>
@stop

@section('content')
    @if($errors->any())
        <div class = "alert alert-danger alert-dismissible">
            <h4>Произошла ошибка валидации входных данных</h4>
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif
    <form method = "post">
        {{ csrf_field() }}
        @foreach($weights as $attr=>$weight)
            <div class="col-md-4">
                <div class="form-group">

                    <div class = "col-4">
                        <label>{{ $attrs->where('slug', $attr)->first()->label }}</label>
                        <input type="number" step="0.001" class = "form-control"  placeholder="Enter ..." name = "{{ $attr }}" value = "{{ $weight }}" >
                    </div>

            </div>
            </div>
        @endforeach
        <div class="card-footer">
            <input type="submit" class="btn btn-info" value = "Обновить">

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