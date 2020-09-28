@extends('layouts.menuside')
@section('content')
    <div class="col-md-9" style="background: #ffffff;padding: 50px 30px;">
        <div class="row">
            <div class="col-md-5">
                <h3 style="padding: 20px 0">Contact Us</h3>
            </div>
            <div class="col-md-7">
                <div class="col-md-7">
                    @include("User.search")
                </div>
            </div>
        </div>
        <div class="row" style="padding-top: 50px">
            <div class="col-md-4" style="text-align: center;padding-bottom: 15px;">
                <img src="{{asset('img/icons/phone.svg')}}" width="40px">
                <br /><br />
                <span style="background: #f8f9fb;padding: 5px 10px;border-radius: 15px;margin-top: 30px;color:#013871">
                    07999999999999
                </span>
            </div>
            <div class="col-md-4" style="text-align: center;padding-bottom: 15px;">
                <img src="{{asset('img/icons/mail.svg')}}" width="40px">
                <br /><br />
                <span style="background: #f8f9fb;padding: 5px 10px;border-radius: 15px;margin-top: 30px;color:#013871">
                    info@panetacademy.com
                </span>
            </div>
            <div class="col-md-4" style="text-align: center;padding-bottom: 15px;">
                <img src="{{asset('img/icons/location.svg')}}" width="40px">
                <br /><br />
                <span style="background: #f8f9fb;padding: 5px 10px;border-radius: 15px;margin-top: 30px;color:#013871">
                    Amman - Jordan
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div style="padding-top:50px;padding-bottom: 20px;padding-left:10px;color:#000000">
                    Or Fill out the folloing form, and we will contact you
                </div>
            </div>
        </div>
        <form action="{{asset('contactUs')}}" method="POST" >
            @csrf
            <div class="row">
                <div class="col-md-6" style="padding-top:10px;text-align: justify ">
                    <fieldset class="formRow">
                        <div class="formRow--item">
                            <label for="firstname" class="formRow--input-wrapper js-inputWrapper">
                                <input type="text" class="formRow--input js-input" name="firstname" id="firstname" placeholder="First name" required>
                            </label>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-6" style="padding-top:10px;text-align: justify ">
                    <fieldset class="formRow">
                        <div class="formRow--item">
                            <label for="lastname" class="formRow--input-wrapper js-inputWrapper">
                                <input type="text" class="formRow--input js-input" name="lastname" id="lastname" placeholder="Last name" required>
                            </label>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-12" style="padding-top:10px;text-align: justify ">
                    <fieldset class="formRow">
                        <div class="formRow--item">
                            <label for="Email" class="formRow--input-wrapper js-inputWrapper">
                                <input type="email" class="formRow--input js-input" id="Email" name="email" placeholder="Email" required>
                            </label>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-12" style="padding-top:10px;text-align: justify ">
                    <fieldset class="formRow">
                        <div class="formRow--item">
                            <label for="phone_number" class="formRow--input-wrapper js-inputWrapper">
                                <input type="number" class="formRow--input js-input" id="phone_number" name="phone" placeholder="Phone number" required>
                            </label>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-12" style="padding-top:10px;text-align: justify ">
                    <fieldset class="formRow">
                        <div class="formRow--item">
                            <label for="message" class="formRow--input-wrapper js-inputWrapper">
                                <textarea  class="formRow--input js-input"  id="message" name="message" placeholder="Message"  rows=11 cols=50 maxlength=250  style="border-radius:30px " required ></textarea>
                            </label>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="submit_container">
                <input type="submit" class="submit_filter_form" value="Send">
            </div>
        </form>
    </div>
    @include('layouts.rightside')

    <script src="{{asset('js/vendors.bundle.js')}}"></script>
    <script src="{{asset('js/app.bundle.js')}}"></script>
    <script  src="{{asset('js/script.js')}}"></script>
@endsection
