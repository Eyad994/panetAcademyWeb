@extends('layouts.menuside')
@section('content')
    <style>
        .container {
            position: relative;
            width: 100%;
            overflow: hidden;
            padding-top: 56.25%; /* 16:9 Aspect Ratio */
        }

        .responsive-iframe {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>
    <div class="col-md-9" style="background: #ffffff;padding: 50px 30px;">
        <div class="row">
            <div class="col-md-5">
                <h3 style="padding: 20px 0"><span style="color: #01376e">{{$data->name}}</span> - {{$data->topic}}</h3>
            </div>
            <div class="col-md-7">
                <div class="col-md-7">
                    @include("User.search")
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="padding-top: 20px">
                <div class="container">
                    <iframe id="iframe" class="responsive-iframe" src="{{$data->uri}}" ></iframe>
                </div>
                <div style="position: absolute;font-size: 45px;top: 92px;padding: 20px;transform: rotate(90deg);color:#6dd6bc8f">{{auth()->user()->first_name.' '.auth()->user()->last_name}}</div>
                <div style="position: absolute;font-size: 45px;top: 45%;padding: 20px;transform: rotate(90deg);right: 100px;color: #6dd6bc8f">{{auth()->user()->first_name.' '.auth()->user()->last_name}}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2 style="padding: 10px 0"><span style="color: #01376e">{{$data->name}}</span></h2>
                <p>
                    {{$data->description}}
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-3" style="background: #f8f9fb;">
        <div class="row" style="text-align: center">
            <div class="col-md-12 socal_media_icons" style="padding: 50px 10px">
                <img src="{{asset("img/socialmedia/instagram.png")}}" class="mmm" style="width: 30px">
                <img src="{{asset("img/socialmedia/facebook.png")}}" style="width: 30px" class="fab fa-facebook">
                <img src="{{asset("img/socialmedia/twitter.png")}}" style="width: 30px" class="fab fa-twitter">
                <img src="{{asset("img/socialmedia/whatsapp.png")}}" style="width: 30px" class="fab fa-whatsapp">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 style="padding-bottom:20px ">Next Lecturers </h3>
            </div>
            <div class="col-md-12" style="height: 600px;overflow-y: scroll">
                @foreach($data->related_lectures as $key => $val)
                    <a href="{{asset('getLectures/'.$data->course_id.'/'.$val->id)}}">
                        <div style="width: 100%;border-radius: 5px;padding: 10px;float: left;font-size: 13px;">
                            <img src="{{$val->thumbnail_size295}}" height="80px" style="float: left;width: 40%">
                            <div style="width: 60%;height: 77px;overflow: hidden">
                                <div style="width: 100%;float: left;padding-left: 10px;color:#797b7d">
                                    <span style="color: #01376e">{{$val->name}}</span> - <span>{{$data->name}}</span>
                                </div>
                                <div style="width: 100%;float: left;padding-left: 10px;color:#797b7d">
                                    <span>{{$data->topic}} </span>
                                </div>
                                <div style="width: 100%;float: left;padding-left: 10px;color:#797b7d">
                                    <span> {{$data->description}}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

@endsection


