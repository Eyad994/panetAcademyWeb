@extends('layouts.menuside')
@section('content')
    <style>
        .topics_item {
            border: 1px solid #a6a9ad;
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            margin-bottom: 10px;
            color: #a6a9ad;
        }

        .section_title {
            padding-bottom: 10px;
        }

        .circelx {
            width: 100px;
            height: 100px;
            background: #f8f9fb;
            float: left;
            margin-left: 10px;
            border-radius: 60px;
            object-fit: cover;
            border: 1px solid #013871;
        }

        .instructors_name {
            padding-left: 120px;
            color: #013871;
            font-size: 16px;
            padding-top: 20px;
        }

        .instructors_info {
            padding-top: 7px;
            padding-left: 120px;
            font-size: 14px;
        }

        .main_wlc {
            font-size: 35px;
            position: absolute;
            top: 25%;
            left: 50px;
            color: #ffffff;
        }

        .sub_wlc {
            color: #ffffff;
            position: absolute;
            top: 41%;
            left: 50px;
            width: 50%;
        }

        @media (max-width: 768px) {
            .sub_wlc {
                color: #ffffff;
                position: absolute;
                top: 45%;
                left: 30px;
                width: 50%;
            }

            .main_wlc {
                color: #ffffff;
                position: absolute;
                top: 27%;
                left: 30px;
                width: 50%;

            }

            .main_wlc span {
                font-size: 13px;

            }

            .sub_wlc span {
                font-size: 10px;
            }

        }
    </style>
    <div class="col-md-9" style="background: #ffffff;padding: 50px 30px;">

        <div class="row">
            <div class="col-md-5">
                <h3 style="padding: 20px 0">Home</h3>
            </div>
            <div class="col-md-7">
                @include("User.search")
            </div>
        </div>
        <div class="col-md-12">
            @if(session()->has('msg'))
                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                    {{ session('msg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>

        <div class="row" style="padding:0 40px; margin-top: 20px">
            @foreach($data['majors'] as $major)
                <div class="col-md-2">
                    <a href="/major/{{ $major->id }}">
                        <div style="background: #d9e5f1;width: 100px;height: 100px;border-radius: 100px; text-align: center;padding: 10px">
                            <img src="{{ env('APP_URL')."/images/major/$major->logo" }}"
                                 style="width: 74px;height: 74px; padding: 5px /*border-radius:80px*/">
                        </div>
                    </a>
                    <br>
                    <span style="font-size: 14px; width: 100px;display: block;text-align: center;color: #00386e">{{ $major->name }}</span>
                </div>
            @endforeach
        </div>
        <div class="row" style="margin-top: 10px">
            {{--<div class="col-md-12">
                @if(count($data['instructors']) > 0)
                    <div class="section_title">Instructors</div>
                    <div class="topics_content">
                        <div class="row">
                            @foreach($data['instructors'] as $k =>$val)
                                <div class="col-xl-4 col-lg-6" style="padding-bottom: 20px">
                                    <a href="{{asset("instructor/$val->id")}}"><img src="{{$val->image}}" class="circelx"></a>
                                    <div class="instructors_name">{{$val->name}}</div>
                                    <div class="instructors_info">{{$val->university->name}}</div>
                                    <div class="instructors_info">{{$val->major->name}}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>--}}
        </div>
        <div class="row">
            <div class="col-md-12">
                <img src="{{asset("img/home-hello.png")}}" style="width: 100%">
                <div class="main_wlc">
                    <span> Good Morning @auth {{ auth()->user()->first_name }} @endauth</span>
                </div>
                <div class="sub_wlc">
                    <span>As long as you want success , make sure that you will achieve your gola </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                @if(count($data['courses']) > 0)
                    <div class="section_title">Popular Courses</div>
                    <div class="topics_content">
                        <div class="row">
                            @foreach($data['courses'] as $k =>$val)
                                <?php
                                if (count($val->lectures) > 0) {
                                    $x = $val->lectures->first();
                                } else {
                                    $x['id'] = null;
                                }
                                ?>
                                <div class="col-md-4" style="margin-bottom: 20px">
                                    <a href="{{asset("getLectures/$val->id/".$x['id'])}}">
                                        <div style="width: 100%;height: 350px;overflow: hidden;border-radius: 15px;">
                                            <img src="{{ env('APP_URL')."/images/course/$val->image" }}"
                                                 style="width: 100%;height: 200px;object-fit: cover;">
                                            <div style="height: 150px;background: #dce7f2;float: left;width: 100%;padding: 10px;overflow: hidden;">
                                                <div style="padding-bottom: 5px;">
                                                    <span style="color: #013871;font-weight: bold;font-size: 17px;">
                                                        {{$val->name}} -
                                                    </span><span>{{$val->topic->name}}</span></div>
                                                <div style="color: #013871;font-weight: bold;font-size: 15px;">{{$val->instructor->name}}</div>
                                                <div style="font-size: 14px;padding: 5px 0px;height: 90px;overflow: hidden;">{{$val->description}}</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @include('layouts.rightside')
@endsection
