<div class="col-md-3" style="background: #f8f9fb;">
    <div class="row" style="text-align: center">
        <div class="col-md-12 socal_media_icons" style="padding: 50px 10px">
            <img src="{{asset("img/socialmedia/instagram.png")}}" class="mmm" style="width: 30px" >
            <img src="{{asset("img/socialmedia/facebook.png")}}" style="width: 30px" class="fab fa-facebook"></img>
            <img src="{{asset("img/socialmedia/twitter.png")}}" style="width: 30px" class="fab fa-twitter" ></img>
            <img src="{{asset("img/socialmedia/whatsapp.png")}}" style="width: 30px" class="fab fa-whatsapp"></img>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Popular Instructors</h3>
        </div>
        <div class="col-md-12">
            @foreach($instructors as $instructor)
                <a href="/instructor/{{ $instructor->id }}">
                    <div style="background: #d9e5f1;width: 100%;border-radius: 5px;padding: 10px;float: left;margin-top: 20px">
                        <img src="{{asset("img/doctor.jpg")}}" width="70px" height="70px" style="border-radius: 5px;float: left;object-fit: cover;">
                        <div style="width: 50%;float: left;padding-left: 10px;    padding-top: 5px;">
                            <span class="lecturer_info_name">{{ $instructor->name }}</span>
                            <span  class="lecturer_info_details">{{ $instructor->major->name }}</span>
                            <span class="lecturer_info_details">{{ $instructor->university->name }}</span>
                        </div>
                        <div style="width: 50px;float: right;border-radius: 150px;height: 50px;border: 2px solid #01376e;color:#01376e;margin-top: 12px">
                            <span style="width: 100%;text-align: center;display: block;padding-top: 10px;font-size: 12px;">{{ $instructor->course_count }}</span>
                            <span style="width: 100%;font-size: 11px;text-align: center;display: block;">Courses</span>
                        </div>
                    </div>
                </a>
                @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3 style="padding: 20px 0px">Universities </h3>
        </div>
        <div class="row" style="padding:0 20px">
            @foreach($universities as $university)
                <div class="col-md-4">
                    <a href="/university/{{ $university->id }}">
                        <div style="background: #d9e5f1;width: 80px;height: 80px;border-radius: 100px;">
                            <img src="{{ env('APP_URL')."/images/university/$university->logo" }}" style="width: 50px;padding: 0px;margin-left: 15px;margin-top: 10px;">
                        </div>
                    </a>
                    <br>
                    <span style="font-size: 12px">{{ $university->name }}</span>
                </div>
                @endforeach
        </div>
    </div>
</div>
