<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\ContactUs;
use App\Models\TermAndService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InformationController extends Controller
{
    use ApiResponser;
    public function contactUs(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'phone' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = collect([]);
            foreach ($validator->messages()->all() as $item) {
                $errors->push($item);
            }
            return $this->apiResponse(null, $errors, 422, 1);
        }

        $name= $request->firstname.' '.$request->lastname;
        ContactUs::create([
           'name' =>$name,
           'email' => $request->email,
           'message' => $request->message,
           'phone' => $request->phone,
        ]);

        $message = collect([]);
        $message->push('Sent successfully');
       // return $this->apiResponse(null, $message, 200);
    }

    public function aboutUs()
    {
        //die('x');
        $url = env('APP_URL').'/aboutUs';
        /*$data['title'] = 'Panet Academy';
        $data['description'] = AboutUs::where('id', 1)->value('about_us');*/
       // return $this->apiResponse($url, null, 200);
        return view('User.aboutUs');
    }

    public function termsAndServices()
    {
        $url = env('APP_URL').'/terms';
        /*$data = TermAndService::all();*/
        return $this->apiResponse($url, null, 200);
    }

    public function settings()
    {
        $data = [
          'phone_number' => '0799999999',
            'email' => 'info@panetacademy.com'
        ];
        return $this->apiResponse($data, null, 200);
    }
}
