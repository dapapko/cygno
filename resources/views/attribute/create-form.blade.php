@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Добавить атрибут</h1>
@stop

@section('content')
    <div class="card card-default">
        <div class="card-body">
            <form method = "post">
                {{ csrf_field() }}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Имя столбца в БД</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name = "name" >
                    </div>
                </div>
            </div>

                <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Краткое описание свойства (подсказка для пользователя)</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name = "desc" >
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Тип поля ввода</label>
                        <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name = "input_type">
                            <option value = "text">Текстовое поле</option>
                            <option value = "number">Числовое поле</option>
                            <option value = "select">Выбор</option>
                            <option value = "multiselect">Множественный выбор</option>
                            <option value = "checkbox">Галочка (чекбокс)</option>
                            <option value = "switch">Переключатель</option>
                        </select>
                    </div>
                </div>
                </div>
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Тип данных</label>
                            <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name = "type">
                                <option value = "TEXT">Текст</option>
                                <option value = "INT">Целое число</option>
                                <option value = "FLOAT">Число с плавающей точкой</option>
                                <option value = "BOOLEAN">Булева переменная</option>
                            </select>
                        </div>
                    </div>
                    </div>
                        <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Опции (только для опций выбора)</label>
                            <pre>В формате {"value:"label", ...}</pre>
                            <input type="text" class="form-control" placeholder="Enter ..." name = "options" >
                        </div>
                    </div>
                        </div>


                        <div class="row">
                        <div class = "col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name = "calc" >
                                <label class="form-check-label">Критерий результирующей функции</label>
                            </div>
                        </div>
                        </div>

                    <div class="card-footer">
                        <input type="submit" class="btn btn-info"></input>

                    </div>
                </div>
            </div>
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