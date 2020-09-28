@extends('layouts.menuside')
@section('content')
    <div class="col-md-9" style="background: #ffffff;padding: 50px 30px;">
        <div class="row">
            <div class="col-md-5">
                <h3 style="padding: 20px 0">Join us</h3>
            </div>
            <div class="col-md-7">
                <div class="col-md-7">
                    @include("User.search")
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1 style="font-size: 25px;padding: 40px 0px">
                    Hi <span style="color: #0A246A">Guest</span>, Please fill in the following fields
                </h1>
            </div>
        </div>
        <form action="{{asset('contactUs')}}" method="POST" >
            @csrf
            <div class="row">
                <div class="col-md-6" style="padding-top:10px;text-align: justify ">
                    <fieldset class="formRow">
                        <div class="formRow--item">
                            <label for="firstname" class="formRow--input-wrapper js-inputWrapper">
                                <input type="text" class="formRow--input js-input" name="firstname" id="firstname" value="ccccccc" placeholder="First name" required>
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
                            <label for="phone_number" class="formRow--input-wrapper js-inputWrapper">
                                <input type="number" class="formRow--input js-input" id="phone_number" name="phone_number" placeholder="Phone number" required>
                            </label>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-6" style="padding-top:10px;text-align: justify ">
                    <fieldset class="formRow">
                        <div class="formRow--item">
                            <label for="gender" class="formRow--input-wrapper js-inputWrapper">
                                <select class="formRow--input js-input" name="gender" id="gender" placeholder="Gender" style="background: #ffffff"  required>
                                    <option value=""></option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </label>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-6" style="padding-top:10px;text-align: justify ">
                    <fieldset class="formRow">
                        <div class="formRow--item">
                            <label for="birthdate" class="formRow--input-wrapper js-inputWrapper">
                                <input type="date" class="formRow--input js-input" name="birthdate" id="birthdate" placeholder="Date Of Birth"  required>
                            </label>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-6" style="padding-top:10px;text-align: justify ">
                    <fieldset class="formRow">
                        <div class="formRow--item">
                            <label for="university" class="formRow--input-wrapper js-inputWrapper">
                                <select class="formRow--input js-input" id="university" placeholder="University" style="background: #FFFFFF" required>
                                    <option value=""></option>
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
                                <input type="text" class="formRow--input js-input" id="major" placeholder="Major" required>
                            </label>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-6" style="padding-top:10px;text-align: justify ">
                    <fieldset class="formRow">
                        <div class="formRow--item">
                            <label for="academicyear" class="formRow--input-wrapper js-inputWrapper">
                                <input type="text" class="formRow--input js-input" id="academicyear" placeholder="Academic Year" required>
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
                                <input type="text" class="formRow--input js-input" id="interstedcourses" placeholder="Intersted Courses" required>
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

@endsection
