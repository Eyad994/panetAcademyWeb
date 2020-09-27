@extends('layouts.menuside')
@section('content')
    <div class="col-md-9" style="background: #ffffff;padding: 50px 30px;">
        <div class="row">
            <div class="col-md-5">
                <h3 style="padding: 20px 0">Profile</h3>
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
                <h1 style="font-size: 25px;padding: 40px 0px">
                    Hi <span style="color: #0A246A">{{ auth()->user()->first_name }}</span>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" style="padding-top:10px;text-align: justify ">
                <fieldset class="formRow">
                    <div class="formRow--item">
                        <label for="firstname" class="formRow--input-wrapper js-inputWrapper">
                            <input type="text" class="formRow--input js-input" name="firstname" id="firstname" value="{{ auth()->user()->first_name }}" placeholder="First name">
                        </label>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-6" style="padding-top:10px;text-align: justify ">
                <fieldset class="formRow">
                    <div class="formRow--item">
                        <label for="lastname" class="formRow--input-wrapper js-inputWrapper">
                            <input type="text" class="formRow--input js-input" name="lastname" id="lastname" value="{{ auth()->user()->last_name }}" placeholder="Last name">
                        </label>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-12" style="padding-top:10px;text-align: justify ">
                <fieldset class="formRow">
                    <div class="formRow--item">
                        <label for="phone_number" class="formRow--input-wrapper js-inputWrapper">
                            <input type="number" class="formRow--input js-input" id="phone_number" value="{{ auth()->user()->phone_number }}" name="phone_number" placeholder="Phone number">
                        </label>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-6" style="padding-top:10px;text-align: justify ">
                <fieldset class="formRow">
                    <div class="formRow--item">
                        <label for="gender" class="formRow--input-wrapper js-inputWrapper">
                            <select class="formRow--input js-input" name="gender" id="gender" placeholder="Gender" style="background: #ffffff">
                                <option value=""></option>
                                <option value="male" {{ auth()->user()->gender == 1 ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ auth()->user()->gender == 2 ? 'selected' : '' }}>Female</option>
                            </select>
                        </label>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-6" style="padding-top:10px;text-align: justify ">
                <fieldset class="formRow">
                    <div class="formRow--item">
                        <label for="birthdate" class="formRow--input-wrapper js-inputWrapper">
                            <input type="date" class="formRow--input js-input" name="birthdate" id="birthdate" placeholder="">
                        </label>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-6" style="padding-top:10px;text-align: justify ">
                <fieldset class="formRow">
                    <div class="formRow--item">
                        <label for="university" class="formRow--input-wrapper js-inputWrapper">
                            <select class="formRow--input js-input" id="university" placeholder="" style="background: #FFFFFF">
                                <option value="" selected>{{ auth()->user()->university->name }}</option>
                            </select>
                        </label>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-6" style="padding-top:10px;text-align: justify ">

            </div>
            <div class="col-md-12" style="padding-top:10px;text-align: justify ">
                <fieldset class="formRow">
                    <div class="formRow--item">
                        <label for="major" class="formRow--input-wrapper js-inputWrapper">
                            <input type="text" class="formRow--input js-input" value="{{ auth()->user()->major->name }}" id="major" placeholder="Major">
                        </label>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-6" style="padding-top:10px;text-align: justify ">
                <fieldset class="formRow">
                    <div class="formRow--item">
                        <label for="academicyear" class="formRow--input-wrapper js-inputWrapper">
                            <input type="text" class="formRow--input js-input" value="{{ auth()->user()->academic->name }}" id="academicyear" placeholder="Academic Year">
                        </label>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-6" style="padding-top:10px;text-align: justify ">

            </div>
            <div class="col-md-12" style="padding-top:10px;text-align: justify ">
                <fieldset class="formRow">
                    <div class="formRow--item">
                        <label for="interstedcourses" class="formRow--input-wrapper js-inputWrapper">
                            <input type="text" class="formRow--input js-input" id="interstedcourses" placeholder="Intersted Courses">
                        </label>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    @include('layouts.rightside')

    <script src="{{asset('js/vendors.bundle.js')}}"></script>
    <script src="{{asset('js/app.bundle.js')}}"></script>
    <script  src="{{asset('js/script.js')}}"></script>
@endsection
