@extends('layouts.menuside')
@section('content')
    <style>
        .choose_uni{
            width: 180px;
            border-radius: 15px;
            border: 1px solid #01376e;
        }
        .choose_year{
            width: 130px;
            border-radius: 15px;
            border: 1px solid #01376e;
        }
        .choose_samester{
            width: 100px;
            border-radius: 15px;
            border: 1px solid #01376e;
        }
        .majors{
            width: 80px;
            height: 80px;
            border-radius: 100px;
            background: #d9e5f1;
            padding: 3px;

        }
        .major_container{
            width: 80px;
            float: left;
            margin-left: 20px;
        }
        .major_title{
            text-align: center;
            padding-top: 5px;
        }
        .submit_filter_form{
            background: #ffffff;
            border-radius: 13px;
            width: 80px;
            border: 1px solid #01376e;
            height: 30px;
        }
        .submit_container{
            width: 100%;
            text-align: center;
            float: left;
            padding-top: 10px;
        }
        .alert-danger{
            float: left;
            width: 100%;
            margin-top: 10px;
        }
        @media (max-width: 768px) {
            .major_container{
                margin-left: 0px;
            }
        }
    </style>


    <link rel="stylesheet" href="{{asset("css/timeline.css")}}">
    <div class="col-md-9" style="background: #ffffff;padding: 50px 30px;">

        <div class="row">
            <div class="col-md-5">
                <h3>Courses</h3>
            </div>
            <div class="col-md-7">
                <div class="col-md-7">
                    @include("User.search")
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{asset('filters')}}" method="GET" class="filters_form" >
                    @csrf

                    <ol class="timeline">
                        <li>
                            <i class="fa fa-check tick_mark uni_mark" aria-hidden="true"></i>
                            <h4 class="sub_color_text">Choose your University</h4>
                            <div class="uni_timeline" style="padding: 10px 0px">
                                <select class="form-control choose_uni" name="university_id">
                                    <option value="0">University</option>
                                    @foreach($data['universities'] as $k => $val)
                                        <option value="{{$val->id}}" data-toggle="{{$val->majors}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-check tick_mark year_mark" aria-hidden="true"></i>
                            <h4 class="sub_color_text">Choose Year</h4>
                            <div class="year_timeline" style="padding: 10px 0px">
                                <select class="form-control choose_year" name="year_id" disabled="true">
                                    <option value="0">Year</option>
                                    @foreach($data['years'] as $k => $val)
                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-check tick_mark " aria-hidden="true"></i>
                            <h4 class="sub_color_text">Choose a Samester</h4>
                            <div class="samester_timeline" style="padding: 10px 0px">
                                <select class="form-control choose_samester" name="semester_id" disabled="true">
                                    <option value="0">Samester</option>
                                    @foreach($data['semesters'] as $k => $val)
                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-check tick_mark" aria-hidden="true"></i>
                            <h4 class="sub_color_text">Choose a Major</h4>
                            <input type="hidden" name="major_id" id="major_id" value="0">
                            <div style="padding: 10px 0px" class="majors_main_div">

                            </div>
                        </li>
                    </ol>
                    <div class="alert alert-danger" style="display: none"></div>
                    <div class="submit_container">
                    <input type="submit" class="submit_filter_form" value="GO">
                    </div>
                </form>
            </div>
        </div>

    </div>
    @include('layouts.rightside');
    <script type="text/javascript">
        $(function () {
            $('.choose_uni').change(function () {
                $('.choose_year').val(0);
                $('.choose_samester').val(0);
                $('#major_id').val(0);
                $(".majors_main_div").empty();

                $('.choose_samester').prop( "disabled", true );
                $(".year_timeline").parent().removeClass("active_point");
                $(".samester_timeline").parent().removeClass("active_point");
                $("#major_id").parent().removeClass("active_point");

                if($(".choose_uni").val() != 0){
                    $(this).parent().parent().addClass("active_point");
                    $('.choose_year').prop( "disabled", false );


                }else{
                    $(this).parent().parent().removeClass("active_point");
                    $('.choose_year').prop( "disabled", true );
                    $(".majors_main_div").empty();
                }
            });
            $('.choose_year').change(function () {
                $('.choose_samester').val(0);
                $(".samester_timeline").parent().removeClass("active_point");
                $(".majors_main_div").empty();

                if($(".choose_year").val() != 0){
                    $(this).parent().parent().addClass("active_point");
                    $('.choose_samester').prop( "disabled", false );
                }else{
                    $(this).parent().parent().removeClass("active_point");
                    $('.choose_samester').prop( "disabled", true );
                }
            });
            $('.choose_samester').change(function () {
                if($(".choose_samester").val() != 0){
                    $(this).parent().parent().addClass("active_point");

                    var majors = $(".choose_uni").children("option:selected").data().toggle;
                    $(".majors_main_div").empty();

                    $(majors).each(function (index,value) {
                        $(".majors_main_div").append('<div class="major_container " style="cursor: pointer;" onclick="choosedmajor('+value.id+')">'
                            +'<div class="majors major_'+value.id+'"><img src="'+value.logo+'" style="width: 74px;height: 74px; padding: 10px"></div>'
                            +'<div class="major_title">'+value.name+'</div>'
                            +'</div>')
                    });



                }else{
                    $(this).parent().parent().removeClass("active_point");
                }
            });
        });

        function choosedmajor(id) {
            $(".majors").css("border","0");
            $(".major_"+id).css("border","1px solid red");
            $("#major_id").val(id);
            $("#major_id").parent().addClass("active_point");
        }

        $('.filters_form').on('submit', function (e) {

            e.preventDefault();

            if($('.choose_uni').val() == 0){
                $(".alert-danger").show();
                $(".alert-danger").text("You have to Choose University");
                return false;
            }
            if($('.choose_year').val() == 0){
                $(".alert-danger").text("You have to Choose a Year");
                return false;
            }
            if($('.choose_samester').val() == 0){
                $(".alert-danger").text("You have to Choose a Samester");
                return false;
            }
            if($('#major_id').val() == 0){
                $(".alert-danger").text("You have to Choose Major");
                return false;
            }

            $(".alert-danger").hide();
            $( ".filters_form" ).submit();
        });
    </script>
@endsection
