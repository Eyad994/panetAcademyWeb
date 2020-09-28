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
        <form action="{{ route('updateProfile') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6" style="padding-top:10px;text-align: justify ">
                    <fieldset class="formRow">
                        <div class="formRow--item">
                            <label for="firstname" class="formRow--input-wrapper js-inputWrapper">
                                <input type="text" class="formRow--input js-input" name="first_name" id="firstname" value="{{ auth()->user()->first_name }}" placeholder="First name">
                            </label>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-6" style="padding-top:10px;text-align: justify ">
                    <fieldset class="formRow">
                        <div class="formRow--item">
                            <label for="lastname" class="formRow--input-wrapper js-inputWrapper">
                                <input type="text" class="formRow--input js-input" name="last_name" id="lastname" value="{{ auth()->user()->last_name }}" placeholder="Last name">
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
                <div class="col-md-12" style="padding-top:10px;text-align: justify ">
                    <fieldset class="formRow">
                        <div class="formRow--item">
                            <label for="email" class="formRow--input-wrapper js-inputWrapper">
                                <input type="text" class="formRow--input js-input" id="email" value="{{ auth()->user()->email }}" name="email" placeholder="Email">
                            </label>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-6" style="padding-top:10px;text-align: justify ">
                    <fieldset class="formRow">
                        <div class="formRow--item">
                            <label for="gender" class="formRow--input-wrapper js-inputWrapper">
                                <select class="formRow--input js-input" name="gender" id="gender" placeholder="Gender" style="background: #ffffff">
                                    <option value="" disabled>Select a gender</option>
                                    <option value="1" {{ auth()->user()->gender == 1 ? 'selected' : '' }}>Male</option>
                                    <option value="2" {{ auth()->user()->gender == 2 ? 'selected' : '' }}>Female</option>
                                </select>
                            </label>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-6" style="padding-top:10px;text-align: justify ">
                    <fieldset class="formRow">
                        <div class="formRow--item">
                            <label for="birthdate" class="formRow--input-wrapper js-inputWrapper">
                                <input type="text" class="formRow--input js-input" name="date_of_birth" value="{{ auth()->user()->date_of_birth }}" id="birthdate" placeholder="">
                            </label>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-6" style="padding-top:10px;text-align: justify ">
                    <fieldset class="formRow">
                        <div class="formRow--item">
                            <label for="university" class="formRow--input-wrapper js-inputWrapper">
                                <select class="formRow--input js-input" name="university_id" id="university" placeholder="" style="background: #FFFFFF">
                                    <option value="{{ auth()->user()->university->id }}" selected>{{ auth()->user()->university->name }}</option>
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
                                <input type="text" class="formRow--input js-input" name="major_id" value="{{ auth()->user()->major->id }}" id="major" placeholder="Major">
                            </label>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-6" style="padding-top:10px;text-align: justify ">
                    <fieldset class="formRow">
                        <div class="formRow--item">
                            <label for="academicyear" class="formRow--input-wrapper js-inputWrapper">
                                <input type="text" class="formRow--input js-input" name="academic_id" value="{{ auth()->user()->academic->id }}" id="academicyear" placeholder="Academic Year">
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
            <div class="submit_container">
                <input type="submit" class="submit_filter_form" value="Update">
            </div>
        </form>
        <br>

        @if(session()->has('msg'))
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                {{ session('msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

    </div>
    @include('layouts.rightside')

    <script src="{{asset('js/vendors.bundle.js')}}"></script>
    <script src="{{asset('js/app.bundle.js')}}"></script>
    <script  src="{{asset('js/script.js')}}"></script>
@endsection
