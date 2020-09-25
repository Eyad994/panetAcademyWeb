@extends('layouts.menuside')
@section('content')
    <div class="col-md-9" style="background: #ffffff;padding: 50px 30px;">
        <div class="row">
            <div class="col-md-5">
                <h1 style="font-size: 25px">About Us</h1>
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
            <div class="col-md-12" style="padding-top:50px;text-align: justify ">
                The Arabian Peninsula was, and still is, largely arid with volcanic soil, making agriculture difficult except near oases or springs. Towns and cities dotted the landscape; two of the most prominent being Mecca and Medina. Medina was a large flourishing agricultural settlement, while Mecca was an important financial center for many surrounding tribes.[36] Communal life was essential for survival in the desert conditions, supporting indigenous tribes against the harsh environment and lifestyle. Tribal affiliation, whether based on kinship or alliances, was an important source of social cohesion.[37] Indigenous Arabs were either nomadic or sedentary. Nomadic groups constantly traveled seeking water and pasture for their flocks, while the sedentary settled and focused on trade and agriculture. Nomadic survival also depended on raiding caravans or oases; nomads did not view this as a crime.[38][39]

                In pre-Islamic Arabia, gods or goddesses were viewed as protectors of individual tribes, their spirits being associated with sacred trees, stones, springs and wells. As well as being the site of an annual pilgrimage, the Kaaba shrine in Mecca housed 360 idols of tribal patron deities. Three goddesses were revered as God's daughters: Allāt, Manāt and al-'Uzzá. Monotheistic communities existed in Arabia, including Christians and Jews.[40] Hanifs – native pre-Islamic Arabs who "professed a rigid monotheism"[41] – are also sometimes listed alongside Jews and Christians in pre-Islamic Arabia, although their historicity is disputed among scholars.[42][43] According to Muslim tradition, Muhammad himself was a Hanif and one of the descendants of Ishmael, son of Abraham.[44]

                The second half of the sixth century was a period of political disorder in Arabia and communication routes were no longer secure.[45] Religious divisions were an important cause of the crisis.[46] Judaism became the dominant religion in Yemen while Christianity took root in the Persian Gulf area.[46] In line with broader trends of the ancient world, the region witnessed a decline in the practice of polytheistic cults and a growing interest in a more spiritual form of religion.[46] While many were reluctant to convert to a foreign faith, those faiths provided intellectual and spiritual reference points.[46]

                During the early years of Muhammad's life, the Quraysh tribe to which he belonged became a dominant force in western Arabia.[47] They formed the cult association of hums, which tied members of many tribes in western Arabia to the Kaaba and reinforced the prestige of the Meccan sanctuary.[48] To counter the effects of anarchy, Quraysh upheld the institution of sacred months during which all violence was forbidden, and it was possible to participate in pilgrimages and fairs without danger.[48] Thus, although the association of hums was primarily religious, it also had important economic consequences for the city
            </div>
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
