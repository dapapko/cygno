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
                        <input type="text" class="form-control" placeholder="Enter ..." name = "slug" >
                    </div>
                </div>
            </div>

                <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Краткое описание свойства (подсказка для пользователя)</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name = "label" >
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
                            <table class="table table-bordered" id="dynamic_field">
                                <tr>
                                    <td><input type="text" name="variants[]" placeholder="Enter your Name" class="form-control name_list" /></td>
                                    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                        </div>


                    <div class="card-footer">
                        <input type="submit" class="btn btn-info">

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

    <script type="text/javascript">
        $(document).ready(function(){
            var postURL = "<?php echo url('addmore'); ?>";
            var i=1;


            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="variants[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
            });


            $(document).on('click', '.btn_remove', function(){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
            });


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#submit').click(function(){
                $.ajax({
                    url:postURL,
                    method:"POST",
                    data:$('#add_name').serialize(),
                    type:'json',
                    success:function(data)
                    {
                        if(data.error){
                            printErrorMsg(data.error);
                        }else{
                            i=1;
                            $('.dynamic-added').remove();
                            $('#add_name')[0].reset();
                            $(".print-success-msg").find("ul").html('');
                            $(".print-success-msg").css('display','block');
                            $(".print-error-msg").css('display','none');
                            $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                        }
                    }
                });
            });


            function printErrorMsg (msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display','block');
                $(".print-success-msg").css('display','none');
                $.each( msg, function( key, value ) {
                    $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                });
            }
        });
    </script>
@stop