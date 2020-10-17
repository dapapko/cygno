@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Добавить фильтр</h1>
@stop

@section('content')
    <div class="card card-default">
        <div class="card-body">
            <form method = "post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Атрибут</label>
                            <select class="form-control" name = "attr">
                                @foreach($attrs as $attr)
                                <option value = "{{$attr->id}}">{{$attr->label}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

<div class = "row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Описание</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name = "label" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Условие</label>

                            <select class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" name = "condition">
                                <option value = "IN">Вхождение во множество</option>
                                <option value = "[]">Вхождение в отрезок</option>
                                <option value = "<"><</option>
                                <option value = ">">></option>
                                <option value = "eq">Равенство</option>
                                <option value = "bool">Истинность</option>
                            </select>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Опции (только для вхождения во множество)</label>
                            <table class="table table-bordered" id="dynamic_field">
                                <tr>
                                    <td><input type="text" name="variants[]" placeholder="Enter option" class="form-control name_list" /></td>
                                    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                </tr>
                            </table>
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

    <script type="text/javascript">
        $(document).ready(function(){
            var postURL = "<?php echo url('addmore'); ?>";
            var i=1;


            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="variants[]" placeholder="Enter option" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
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