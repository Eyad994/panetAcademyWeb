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
            <div class="col-md-12" style="padding-top: 20px">
                <div class="container">
                    <iframe class="responsive-iframe" src="{{$data->uri}}"></iframe>
                </div>
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
            <div class="col-md-12" style="padding: 50px 10px">
                <img src="{{asset('img/icons/instagram.svg')}}" style="width: 40px" >
                <img src="{{asset('img/icons/facebook.svg')}}" style=" width: 40px" class="fab fa-facebook"></img>
                <img src="{{asset('img/icons/twitter.svg')}}" style="width: 40px" class="fab fa-twitter" ></img>
                <img src="{{asset('img/icons/whatsapp.svg')}}" style="width: 40px" class="fab fa-whatsapp"></img>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 style="padding-bottom:20px ">Next Lecturers </h3>
            </div>
            <div class="col-md-12">
                @foreach($data->related_lectures as $key => $val)
                    <a href="{{asset('getLectures/'.$data->course_id.'/'.$val->id)}}">
                        <div style="width: 100%;border-radius: 5px;padding: 10px;float: left;font-size: 13px;">
                            <img src="{{$val->thumbnail_size295}}"  height="80px" style="float: left;width: 40%">
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
