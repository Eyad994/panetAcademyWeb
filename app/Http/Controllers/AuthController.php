<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\University;
use App\Models\Video;
use App\Traits\ApiResponser;
use App\Traits\SendActiveCodeSMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use ApiResponser, SendActiveCodeSMS;

    /**
     * Create user
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response [string] message
     * @internal param $ [string] name
     * @internal param $ [string] email
     * @internal param $ [string] password
     * @internal param $ [string] password_confirmation
     */
    public function signup(Request $request)
    {
        die('xx');
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|unique:users',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'university_id' => 'required',
            'major_id' => 'required',
            'academic_id' => 'required',
            'email' => 'required|email|unique:users',
        ]);

        if ($validator->fails()) {
            $errors = collect([]);
            foreach ($validator->messages()->all() as $item) {
                $errors->push($item);
            }
            return $this->apiResponse(null, $errors, 422, 1);
        }

        $user = new User([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'university_id' => $request->university_id,
            'major_id' => $request->major_id,
            'academic_id' => $request->academic_id,
            'email' => $request->email,
            'type' => 2,
        ]);
        $user->save();

        $message = collect([]);
        $message->push('Successfully Registration user');

        return $this->apiResponse($request->user(), $message, 200, 1);

        return $this->apiResponse($request->user(), 'Successfully Registration user', 200, 0);
    }

    /**
     * Login user and create token
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response [string] access_token
     * @internal param $ [string] email
     * @internal param $ [string] password
     * @internal param $ [boolean] remember_me
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        if ($validator->fails()) {
            $errors = collect([]);
            foreach ($validator->messages()->all() as $item) {
                $errors->push($item);
            }
            return $this->apiResponse(null, $errors, 422, 1);
        }

        $credentials = request(['username', 'password']);
        if (!Auth::attempt($credentials))
        {
            $message = collect([]);
            $message->push('username or password is incorrect!');

            return $this->apiResponse(null, $message, 422, 1);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        $data = [
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ];

        if ($request->has('token'))
        {
            $user->update([
               'token' => $request->token
            ]);
        }
        return $this->apiResponse($data, null, 200, 0);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        $message = collect([]);
        $message->push('Successfully logged out');

        return $this->apiResponse(null, $message, 200);
    }

    /**
     * Get the authenticated User
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response [json] user object
     */
    public function user(Request $request)
    {
        $url = env('APP_URL');
        $data = $request->user();
        $data['courses'] = $request->user()->courses;
        foreach ($data['courses'] as $key => $course)
        {
            $data['courses'][$key]['instructor'] = $course->instructor;
            unset($data['courses'][$key]['instructor']['image']);
            $data['courses'][$key]['image'] = "$url/images/course/".$course['image'];
            $data['courses'][$key]['lectures'] = Video::where('course_id', $course->id)->count();
        }
        return $this->apiResponse($data, null, 200, 0);
    }

    public function getRegisterDetails()
    {
        $url = env('APP_URL');
        $data['universities'] = University::with(['majors:id,name,university_id'])
            ->select(DB::raw("*, CONCAT('$url/images/university/', logo) as logo"))->get();
        $data['years'] = AcademicYear::select(['id', 'name'])->get();
        $data['gender'][0]['id'] = 1;
        $data['gender'][0]['name'] = 'male';
        $data['gender'][1]['id'] = 2;
        $data['gender'][1]['name'] = 'female';

        return $this->apiResponse($data, null, 200);
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|unique:users,phone_number,'.$user->id,
            'email' => 'required|email|unique:users,email,'.$user->id,
            /*'password' => 'required|min:6',*/
            'date_of_birth' => 'required',
            'gender' => 'required',
            'university_id' => 'required',
            'major_id' => 'required',
            'academic_id' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = collect([]);
            foreach ($validator->messages()->all() as $item) {
                $errors->push($item);
            }
            return $this->apiResponse(null, $errors, 422, 1);
        }

        $user->update($request->except(['password', 'username']));
        /*$user->update(['password' => Hash::make($request->password)]);*/
        $message = collect([]);
        $message->push('Updated successfully');

        return $this->apiResponse($user, $message, 200);
    }

    public function forget(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            $errors = collect([]);
            foreach ($validator->messages()->all() as $item) {
                $errors->push($item);
            }
            return $this->apiResponse(null, $errors, 422, 1);
        }

        $user = User::where('email', $request->email)->first();
        if ($user)
        {
            $message = collect([]);
            $message->push('The password has been sent to your email');

            return $this->apiResponse(null, $message, 200);
        }
        $message = collect([]);
        $message->push('No email was found');

        return $this->apiResponse(null, $message, 200);

    }

}

