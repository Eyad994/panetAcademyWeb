<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Major;
use App\Models\Semester;
use App\Models\Topic;
use App\Models\University;
use App\Traits\ApiResponser;
use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    use ApiResponser;
    protected $url;

    public function index()
    {
       $data = array();
       $data['majors']= Major::latest()->take(6)->get();
       $data['courses'] = Course::with(['topic', 'lectures'])->latest()->take(3)->get();

       return view('welcome', compact('data'));
    }

    public function search($text)
    {
        $url = env('APP_URL');
        $data = Course::where('name', 'like', '%' . $text . '%')
            ->orWhere('description', 'like', '%' . $text . '%')
            ->select(DB::raw("*, CONCAT('$url/images/course/', image) as image"))
            ->with(['instructor:id,name','topic', 'lectures'])
            ->withCount('lectures')
            ->get();

        if (count($data) > 0) {
            //  return $this->apiResponse($courses, null, 200, 0);
            return view('User.topicCourses',compact('data'));
        } else {
            $message = collect([]);
            $message->push('No instructors were found!');
            return redirect('/')->with('msg', 'No Lectures were found');
        }
    }

    public function filtersPage()  // Old Home
    {
        $data = array();
        $this->url = env('APP_URL');

        $data['universities'] = University::with(['majors:id,name,university_id,logo'])
            ->select(DB::raw("*, CONCAT('$this->url/images/university/', logo) as logo"))->get();
        $data['years'] = AcademicYear::select(['id', 'name'])->get();
        $data['semesters'] = Semester::select(['id', 'name'])->get();
        foreach ($data['universities'][0]['majors'] as $key => $value)
        {
            $value['logo'] = "$this->url/images/major/".$value['logo'];
        }

        // return $data['universities'][0]->majors;
        //  return view('fillterCourses',compact('data'));
        return view('fillterCourses',compact('data'));
    }

    public function majors(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'university_id' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = collect([]);
            foreach ($validator->messages()->all() as $item) {
                $errors->push($item);
            }
            return $this->apiResponse(null, $errors, 422, 1);
        }

        $this->url = env('APP_URL');

        $data = [
            'majors' => Major::select(DB::raw("id, name, CONCAT('$this->url/images/major/', logo) as logo"))->where('university_id', $request->university_id)->get()
        ];

        return $this->apiResponse($data, null, 200);
    }

    public function filters(Request $request)
    {

        $this->url = env('APP_URL');

        $validator = Validator::make($request->all(), [
            'major_id' => 'required|numeric',
            'year_id' => 'required|numeric',
            'university_id' => 'required|numeric',
            'semester_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            $errors = collect([]);
            foreach ($validator->messages()->all() as $item) {
                $errors->push($item);
            }
            return $this->apiResponse(null, $errors, 422, 1);
        }

        $data = array();

        $data['topics'] = Topic::select(['id', 'name'])
            ->where('major_id', $request->major_id)
            ->where('year_id', $request->year_id)
            ->where('semester_id', $request->semester_id)
            ->where('university_id', $request->university_id)->get();

        $data['instructors'] = Instructor::select(DB::raw("*, CONCAT('$this->url/images/instructor/', image) as image"))
            ->with(['university' => function ($query) {
                $query->select('id', 'name');
            }])
            ->with(['major' => function ($query) {
                $query->select('id', 'name');
            }])->get();


        $coursesWithTopics = Course::select(DB::raw("*, CONCAT('$this->url/images/course/', image) as image"))
        ->with(['instructor:id,name'])->with(['topic' => function ($query) use ($request) {
            $query->where('major_id', $request->major_id)
                ->where('year_id', $request->year_id)
                ->where('semester_id', $request->semester_id)
                ->where('university_id', $request->university_id)->select('id', 'name')->get();
        }])->get();


        $data['courses'] = [];

        foreach ($coursesWithTopics as $key => $course)
        {
          if ($course['topic'] == null)
              continue;
          array_push($data['courses'], $course);
        }

       //return $data;
        return view('home', compact('data'));
        //return $this->apiResponse($data, null, 200);
    }

    public function termsAndConditions()
    {
        return view('user.termsAndConditions');
    }
    public function privacyPolicy()
    {
        return view('user.privacyPolicy');
    } public function fillterCourses()
    {
        return view('fillterCourses');
    }
    public function contact()
    {
        return view('User.contactUs');
    }
    public function profile()
    {

        return view('User.profile');
    }
    public function joinUs()
    {
        return view('User.joinUs');
    }

    public function getCoursesByUniversity($id)
    {
        $url = env('APP_URL');
        $data = Course::select(DB::raw("*, CONCAT('$url/images/course/', image) as image"))
            ->with(['instructor:id,name','topic', 'lectures'])
            ->withCount('lectures')
            ->get();

        $data = $data->filter(function ($query) use ($id){
           return $query->topic->university_id == $id;
        });
        if (count($data) > 0) {
            //  return $this->apiResponse($courses, null, 200, 0);
            return view('User.topicCourses',compact('data'));
        } else {
            $message = collect([]);
            $message->push('No instructors were found!');

            return redirect('/')->with('msg', 'No Lectures were found');
            //return back()->with(['msg' => 'No instructors were found']);
            //return $this->apiResponse(null, $message, 200, 1);
        }
    }


}
