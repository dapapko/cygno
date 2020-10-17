@extends('adminlte::page')

@section('title', 'Изменить атрибут')

@section('content_header')
    <h1>Изменить атрибут</h1>
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
                            <input type="text" class="form-control" placeholder="Enter ..." name = "label" value = "{{$attr->label}}" >
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Опции (только для вхождения во множество)</label>
                            <button type="button" name="add" id="add" class="btn btn-success"><i class = "fa fa-plus"></i></button>
                            <table class="table table-bordered" id="dynamic_field">
                                <tr>
                                    @php($opts = json_decode($attr->variants, true))
                                    @foreach($opts as $k=>$v)
                                <tr id="row{{$loop->iteration}}" class="dynamic-added"><td><input type="text" name="variants[]" placeholder="Enter your Name" class="form-control name_list" value="{{$v}}"/></td><td><button type="button" name="remove" id="{{$loop->iteration}}" class="btn btn-danger btn_remove">X</button></td></tr>
                                </tr>
                                @endforeach

                            </table>
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


                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Сегменты клиентов (предпочтения)</label>


                            <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name = "preferences[]"  multiple="multiple">
                                @foreach($groups as $group)
                                    @if($prefs->contains($group))
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
                    <input type="submit" class="btn btn-info">

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
            var i={{ count($opts) }};


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