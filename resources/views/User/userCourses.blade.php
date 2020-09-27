@extends('layouts.menuside')
@section('content')
    <style>
        .topics_item{
            border: 1px solid #a6a9ad;
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            margin-bottom: 10px;
        }
        .section_title{
            padding-bottom: 10px;
        }
        .circelx{
            width: 100px;
            height: 100px;
            background: #f8f9fb;
            float: left;
            margin-left: 10px;
            border-radius: 60px;
            object-fit: cover;
            border: 1px solid #013871;
        }
        .instructors_name{
            padding-left: 120px;
            color: #013871;
            font-size: 16px;
            padding-top:20px;
        }
        .instructors_info{
            padding-top: 7px;
            padding-left: 120px;
            font-size: 14px;
        }
        .main_wlc{
            font-size: 35px;
            position: absolute;
            top: 25%;
            left: 50px;
            color: #ffffff;
        }
        .sub_wlc{
            color: #ffffff;
            position: absolute;
            top: 41%;
            left: 50px;
            width: 50%;
        }
        @media (max-width: 768px) {
            .sub_wlc{
                color: #ffffff;
                position: absolute;
                top: 45%;
                left: 30px;
                width: 50%;
            }
            .main_wlc{
                color: #ffffff;
                position: absolute;
                top: 27%;
                left: 30px;
                width: 50%;

            }
            .main_wlc span{
                font-size: 13px;

            }
            .sub_wlc span{
                font-size: 10px;
            }

        }
    </style>

    <div class="col-md-9" style="background: #ffffff;padding: 50px 30px;">
        <div class="row">
            <div class="col-md-5">
                <h3 style="padding: 20px 0">User Courses</h3>
            </div>
            <div class="col-md-7">
                <div class="input-group bg-white shadow-inset-2" style="border-radius: 50px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-transparent border-right-0" style="border-radius: 50px 0px 0px 50px">
                            <i class="fal fa-search"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control border-left-0 bg-transparent pl-0" placeholder="What are you looking for?" style="height: 50px;border-radius: 0px 50px 50px 0px;">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if(isset($data['courses']))
                    @if(count($data['courses']) > 0)
                    <div class="section_title">Pobular Courses</div>
                        <div class="topics_content">
                            <div class="row">
                                @foreach($data['courses'] as $k =>$val)
                                    <div class="col-md-4" style="margin-bottom: 20px">
                                        <a href="{{asset('getLectures/'.$val->id."/". \App\Models\Video::where('course_id', $val->id)->value('id'))}}">
                                            <div style="width: 100%;height: 350px;overflow: hidden;border-radius: 15px;">
                                                <img src="{{$val->image}}" style="width: 100%;height: 200px;object-fit: cover;">
                                                <div style="height: 150px;background: #dce7f2;float: left;width: 100%;padding: 10px;overflow: hidden;">
                                                    <div style="padding-bottom: 5px;">
                                                        <span style="color: #013871;font-weight: bold;font-size: 17px;">
                                                            {{$val->name}} - </span><span style="color: #656565">{{$val->topic->name}}</span></div>
                                                    <div style="color: #013871;font-weight: bold;font-size: 15px;">{{$val->instructor->name}}</div>
                                                    <div style="font-size: 14px;padding: 5px 0px;height: 90px;overflow: hidden;color: #656565">{{$val->description}}</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endif
                    @if($errors->any())
                        <h4 class="alert alert-danger">{{$errors->first()}}</h4>
                    @endif
            </div>
        </div>
    </div>
    @include('layouts.rightside')
@endsection
