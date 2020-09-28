@extends('layouts.menuside')
@section('content')
    <div class="col-md-9" style="background: #ffffff;padding: 50px 30px;">
        <div class="row">
            <div class="col-md-5">
                <h1 style="font-size: 25px">About Us</h1>
            </div>
            <div class="col-md-7">
                <div class="col-md-7">
                    @include("User.search")
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="padding-top:50px;text-align: justify ">
                Panet Academy is an educational platform that aims to provide students with high quality online lectures in a simple, easy, and interactive way, provided by the most qualified teacher in the field.            </div>
        </div>
        <div class="row" style="padding-top: 50px">
            <div class="col-md-4" style="text-align: center">
                <img src="{{asset('img/icons/phone.svg')}}" width="40px">
                <br /><br />
                <span style="background: #f8f9fb;padding: 5px 10px;border-radius: 15px;margin-top: 30px;color:#013871">
                    07999999999999
                </span>
            </div>
            <div class="col-md-4" style="text-align: center">
                <img src="{{asset('img/icons/mail.svg')}}" width="40px">
                <br /><br />
                <span style="background: #f8f9fb;padding: 5px 10px;border-radius: 15px;margin-top: 30px;color:#013871">
                    info@panetacademy.com
                </span>
            </div>
            <div class="col-md-4" style="text-align: center">
                <img src="{{asset('img/icons/location.svg')}}" width="40px">
                <br /><br />
                <span style="background: #f8f9fb;padding: 5px 10px;border-radius: 15px;margin-top: 30px;color:#013871">
                    Amman - Jordan
                </span>
            </div>
        </div>
    </div>
    @include('layouts.rightside')
@endsection
