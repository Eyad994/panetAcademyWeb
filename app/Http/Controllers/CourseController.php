<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\UserCourse;
use App\Models\Video;
use App\Traits\ApiResponser;
use App\Traits\GetLectureDetails;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    use ApiResponser, GetLectureDetails;

    public function getCoursesByTopic($topicId)
    {
        $url = env('APP_URL');
        $data = Course::select(DB::raw("*, CONCAT('$url/images/major/', image) as image"))
            ->with(['instructor:id,name', 'topic:id,name'])
            ->withCount('lectures')
            ->where('topic_id', $topicId)->get();

        if (count($data) > 0) {
          //  return $data;
            return view('User.topicCourses',compact('data'));
        } else {
            $message = collect([]);
            $message->push('No topics were found!');

            //return $this->apiResponse(null, $message, 200, 1);
        }
    }

    public function getCoursesByInstructor($instructorId)
    {
        $url = env('APP_URL');
        $data = Course::select(DB::raw("*, CONCAT('$url/images/major/', image) as image"))
            ->with(['instructor:id,name', 'topic:id,name'])
            ->withCount('lectures')
            ->where('instructor_id', $instructorId)->get();

        if (count($data) > 0) {
          //  return $this->apiResponse($courses, null, 200, 0);
            return view('User.topicCourses',compact('data'));
        } else {
            $message = collect([]);
            $message->push('No instructors were found!');

            //return back()->with(['msg' => 'No instructors were found']);
            //return $this->apiResponse(null, $message, 200, 1);
        }

    }

    public function getCourseDetails($courseId)
    {
        $url = env('APP_URL');
        $course = Course::select(DB::raw("*, CONCAT('$url/images/major/', image) as image"))
            ->where('id', $courseId)
            ->with('topic:id,name')
            ->with(['lectures' => function ($query) {
                $query->where('status', 1)->get();
            }])
            ->withCount('lectures')
            ->withCount(['lectures as total_lectures_duration' => function ($query) {
                $query->select(DB::raw('sum(duration)'));
            }])
            ->first();
        if (!is_null($course)) {
            $seconds = $course['total_lectures_duration'];
            $minutes = floor($seconds / 60);
            if ($minutes > 60) {
                $duration = gmdate("H:i:s", $seconds);
            } else {
                $duration = gmdate("i:s", $seconds);
            }

            $course['total_lectures_duration'] = $duration;
            return view('User.courseDetails',compact('course'));
           // return $this->apiResponse($course, null, 200);

        } else {
            $message = collect([]);
            $message->push('Course not found!');

            return $this->apiResponse(null, $message, 200, 1);
        }
    }

    public function getLecture($courseId, $lectureId)
    {
        if (Auth::guard('api')->check()) {
            $relatedLecturesArray = [];
            $courseUser = UserCourse::where('course_id', $courseId)->where('user_id', auth()->guard('api')->id())->first();
            if ($courseUser->user_id == auth()->guard('api')->id()) {
                $lecture = Video::where('id', $lectureId)->where('course_id', $courseId)->first();
                if (is_null($lecture))
                    return $this->apiResponse(null, 'No lecture was found!', 200, 1);
                $relatedLectures = Video::where('course_id', $courseId)->where('id', '!=', $lecture->id)->get();
                $courseDetails = Course::where('id', $courseId)->with(['instructor', 'topic'])->first();
                $instructorName = $courseDetails['instructor']['name'];
                $topicName = $courseDetails['topic']['name'];

                foreach ($relatedLectures as $relatedLecture) {
                    $relatedLecture['uri'] = env('VIMEO_URL') . $relatedLecture->uri;
                    $relatedLecture['instructor'] = $instructorName;
                    $relatedLecture['topic'] = $topicName;
                    array_push($relatedLecturesArray, $relatedLecture);
                }

                $data = $lecture;
                $data['uri'] = env('VIMEO_URL') . $lecture->uri;
                $data['instructor'] = $instructorName;
                $data['topic'] = $topicName;
                $data['related_lectures'] = $relatedLectures;

               // return $this->apiResponse($data, null, 200);
            }
            $message = collect([]);
            $message->push('User is not allowed access lecture');
            //return $this->apiResponse(null, $message, 200, 1);

        } else {
            $relatedLecturesArray = [];
            $lecture = Video::where('id', $lectureId)->where('course_id', $courseId)->first();
            if (is_null($lecture))
            {
                $message = collect([]);
                $message->push('No lecture was found!');
                //return $this->apiResponse(null, $message, 200, 1);
            }
            $relatedLectures = Video::where('course_id', $courseId)->where('id', '!=', $lecture->id)->get();
            $courseDetails = Course::where('id', $courseId)->with(['instructor', 'topic'])->first();
            $instructorName = $courseDetails['instructor']['name'];
            $topicName = $courseDetails['topic']['name'];
            foreach ($relatedLectures as $relatedLecture) {
                $relatedLecture['uri'] = null;
                $relatedLecture['instructor'] = $instructorName;
                $relatedLecture['topic'] = $topicName;
                array_push($relatedLecturesArray, $relatedLecture);
            }
           /* $data = [
                'id' => $lecture->id,
                'name' => $lecture->name,
                'description' => $lecture->description,
                'duration' => $lecture->duration,
                'thumbnail' => $lecture->thumbnail_size640,
                'instructor' => $instructorName,
                'topic' => $topicName,
                'related_lectures' => $relatedLecturesArray
            ];*/
            $data = $lecture;
            $data['uri'] = null;
            $data['instructor'] = $instructorName;
            $data['topic'] = $topicName;
            $data['related_lectures'] = $relatedLecturesArray;

            //return $this->apiResponse($data, null, 200);
        }
        /*$relatedLecturesArray = [];
        $lecture = Video::where('id', $lectureId)->where('course_id', $courseId)->first();
        if (is_null($lecture))
            return $this->apiResponse(null, 'No lecture was found!', 200, 1);
        $relatedLectures = Video::where('course_id', $courseId)->where('id', '!=', $lecture->id)->get();
        $courseDetails = Course::where('id', $courseId)->with(['instructor', 'topic'])->first();
        $instructorName = $courseDetails['instructor']['name'];
        $topicName = $courseDetails['topic']['name'];
        foreach ($relatedLectures as $relatedLecture)
        {
             unset($relatedLecture['uri']);
             array_push($relatedLecturesArray, $relatedLecture);
        }
        $data = [
            'id' => $lecture->id,
            'name' => $lecture->name,
            'description' => $lecture->description,
            'duration' => $lecture->duration,
            'thumbnail' => $lecture->thumbnail_size640,
            'instructor' => $instructorName,
            'topic' => $topicName,
            'related_lectures' => $relatedLecturesArray
        ];
        return $this->apiResponse($data, null, 200);*/
    }

    public function getLectures($courseId, $lectureId =1)
    {
        if (auth()->check()) {
            $relatedLecturesArray = [];
            $courseUser = UserCourse::where('course_id', $courseId)->first();

            if ($courseUser->user_id == auth()->id()) {
                $lecture = Video::where('id', $lectureId)->where('course_id', $courseId)->first();
                if (is_null($lecture))
                    return redirect('/');
                   // return redirect()->back()->withErrors(['No Lecture was Found']);
                $relatedLectures = Video::where('course_id', $courseId)->where('id', '!=', $lecture->id)->get();
                $courseDetails = Course::where('id', $courseId)->with(['instructor', 'topic'])->first();
                $instructorName = $courseDetails['instructor']['name'];
                $topicName = $courseDetails['topic']['name'];

                foreach ($relatedLectures as $relatedLecture) {
                    $relatedLecture['uri'] = env('VIMEO_URL') . $relatedLecture->uri;
                    array_push($relatedLecturesArray, $relatedLecture);
                }

                $data = $lecture;
                $data['uri'] = env('VIMEO_URL') . $lecture->uri;
                $data['instructor'] = $instructorName;
                $data['topic'] = $topicName;
                $data['related_lectures'] = $relatedLectures;
                $data['course_id'] =   $courseId;
                return view('User.lectures',compact('data'));
             /*   return $this->apiResponse($data, null, 200);*/
            }
            $message = collect([]);
            $message->push('User is not allowed access lecture');

        } else {

            $relatedLecturesArray = [];
            $lecture = Video::where('id', $lectureId)->where('course_id', $courseId)->first();
            if (is_null($lecture))
            {
                $message = collect([]);
                $message->push('No lecture was found!');
                //return redirect()->back()->withErrors(['No Lecture was Found']);
            }
          
            $relatedLectures = Video::where('course_id', $courseId)->where('id', '!=', $lecture->id)->get();
            $courseDetails = Course::where('id', $courseId)->with(['instructor', 'topic'])->first();
            $instructorName = $courseDetails['instructor']['name'];
            $topicName = $courseDetails['topic']['name'];
            foreach ($relatedLectures as $relatedLecture) {
                unset($relatedLecture['uri']);
                array_push($relatedLecturesArray, $relatedLecture);
            }
            $data = [
                'id' => $lecture->id,
                'name' => $lecture->name,
                'description' => $lecture->description,
                'duration' => $lecture->duration,
                'thumbnail' => $lecture->thumbnail_size640,
                'instructor' => $instructorName,
                'topic' => $topicName,
                'related_lectures' => $relatedLecturesArray
            ];

         //   return $data;
            return view('User.courseDetails',compact('data'));
        }


    }

    public function userCourses(){
        $url = env('APP_URL');
        $data['courses'] = auth()->user()->courses;

        foreach ($data['courses'] as $key => $course)
        {
            $data['courses'][$key]['instructor'] = $course->instructor;
            unset($data['courses'][$key]['instructor']['image']);
            $data['courses'][$key]['image'] = "$url/images/course/".$course['image'];
            $data['courses'][$key]['lectures'] = Video::where('course_id', $course->id)->count();
        }

        return view('User.userCourses',compact('data'));
    }
    public function courses(Request $request){
        $courses_id = $request->id;

        return view('User.courses');
    }



}
