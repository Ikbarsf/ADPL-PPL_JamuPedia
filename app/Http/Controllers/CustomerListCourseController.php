<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseModule;
use App\Models\CourseModuleContent;
use App\Models\CourseModuleQuiz;
use App\Models\CourseModuleContentDone;
use App\Models\CourseCategory;
use App\Models\CourseBenefit;
use App\Models\Enroll;
use App\Models\CourseReview;
use App\Models\ReportQuiz;

class CustomerListCourseController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:customer']);
    }

    private $param;
    public function index()
    {
        try {
        //     $this->param['getCourse'] = \DB::table('courses')
        //                                 ->select('courses.*', 'course_categories.category_name')
        //                                 ->join('course_categories', 'courses.category_id', 'course_categories.id')
        //                                 ->get();
        //     $this->param['getCourse'] = \DB::table('courses')
        //                                 ->select('courses.*', 'course_categories.category_name')
        //                                 ->join('course_categories', 'courses.category_id', 'course_categories.id')
        //                                 ->leftJoin('enrolls', 'courses.id', 'enrolls.course_id')
        //                                 ->leftJoin('users', 'users.id', 'enrolls.user_id')
        //                                 ->where('enrolls.id', NULL)
        //                                 ->where('enrolls.user_id', '=', \Auth::user()->id)
        //                                 ->get();
        //     $this->param['getCourse'] = \DB::table('courses')
        //                                     ->select('courses.*', 'course_categories.category_name')
        //                                     ->join('course_categories', 'courses.category_id', 'course_categories.id')
        //                                     ->join('enrolls', 'courses.id', 'enrolls.course_id')
        //                                     ->join('users', 'enrolls.user_id', 'users.id')
        //                                     ->where('users.id', \Auth::user()->id)
        //                                     ->get();
        //     $courseID = array_column($this->param['getCourse']->toArray(), 'id');
        //     $this->param['getCoursed'] = \DB::table('courses')
        //                                 ->select('courses.*', 'course_categories.category_name')
        //                                 ->join('course_categories', 'courses.category_id', 'course_categories.id')
        //                                 ->whereNotIn('courses.id', $courseID)
        //                                 ->get();
        //     dd($courseID);
        //     $this->param['getCoursed'] = \DB::table('courses')
        //                                     ->select('courses.*')
        //                                     ->join('enrolls', 'courses.id', 'enrolls.course_id')
        //                                     ->leftJoin('users', 'enrolls.user_id', 'users.id')
        //                                     ->where('users.id', \Auth::user()->id)
        //                                     ->where('courses.id', NULL)
        //                                     ->get();
        //     $this->param['getCoursed'] = \DB::table('users')
        //                                 ->select('courses.*')
        //                                 ->join('enrolls', 'users.id', 'enrolls.user_id')
        //                                 ->join('courses', 'enrolls.course_id', 'courses.id')
        //                                 ->where('users.id', \Auth::user()->id)
        //                                 ->where('enrolls.course_id', NULL)
        //                                 ->where('enrolls.user_id', NULL)
        //                                 ->get();

        //     $this->param['getcBenefit'] = CourseBenefit::all();
        //     $this->param['getEnroll'] = Enroll::where('user_id', \Auth::user()->id)->get();

        $this->param['getMyCourse'] = \DB::table('enrolls')
                            ->select('courses.*')
                            ->join('courses', 'courses.id', 'enrolls.course_id')
                            ->where('enrolls.user_id', \Auth::user()->id)
                            // ->where('enrolls.status', 'active')
                            ->get();
            
            return view('customer.pages.course.list', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function myCourse()
    {
        try{
            // $this->param['getMyCourse'] = \DB::table('enrolls')
            //                 ->select('courses.*')
            //                 ->join('courses', 'courses.id', 'enrolls.course_id')
            //                 ->where('enrolls.user_id', \Auth::user()->id)
            //                 ->where('enrolls.status', 'active')
            //                 ->get();
            
            // $this->param['getTotalContent'] = \DB::table('course_module_contents')
            //                                     ->select(array('courses.id AS course_id', 'courses.course_name AS course_name', \DB::raw('COUNT(course_module_contents.id) AS total_content')))
            //                                     ->join('course_modules', 'course_module_contents.course_module_id', 'course_modules.id')
            //                                     ->join('courses', 'course_modules.course_id', 'courses.id')
            //                                     ->groupBy('courses.course_name')
            //                                     ->get();
            // $this->param['getTotalContentDone'] = \DB::table('course_module_content_finsishs')
            //                                     ->select(array('courses.id AS course_id', 'courses.course_name AS course_name', \DB::raw('COUNT(course_module_content_finsishs.course_module_content_id) AS total_content')))
            //                                     ->join('enrolls', 'course_module_content_finsishs.enroll_id', 'enrolls.id')
            //                                     ->join('courses', 'enrolls.course_id', 'courses.id')
            //                                     ->where('enrolls.user_id', \Auth::user()->id)
            //                                     ->groupBy('courses.course_name')
            //                                     ->get();

            // dd($this->param['getTotalContent']);
            // dd($this->param['getTotalContentDone']);

            // $this->param['getCourse'] = \DB::table('courses')
            //                                 ->select('courses.*')
            //                                 ->get();

            $this->param['getCourse'] = \DB::table('courses')
                                            ->select('courses.*')
                                            ->join('enrolls', 'courses.id', 'enrolls.course_id')
                                            ->join('users', 'enrolls.user_id', 'users.id')
                                            ->where('users.id', \Auth::user()->id)
                                            ->get();

            $courseID = array_column($this->param['getCourse']->toArray(), 'id');
            $this->param['getCoursed'] = \DB::table('courses')
                                        ->select('courses.*')
                                        ->whereNotIn('courses.id', $courseID)
                                        ->get();

            
            $this->param['getcCategory'] = CourseCategory::all();
    
            return view('customer.pages.my-course.list', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function myCourseDetail($slug)
    {
        try{
            $this->param['getCourse'] = Course::where('slug', $slug)
                                                ->first(); //getCourse
            $getCourseID = $this->param['getCourse']->id; //getCourseID
            // $this->param['getCourseModule'] = CourseModule::where('course_id', $getCourseID)
            //                                                 ->orderBy('ordinal', 'ASC')
            //                                                 ->get(); //getCourseModule
            // $this->param['getCourseModuleContent'] = CourseModuleContent::orderBy('course_module_id', 'ASC')
            //                                                             ->orderBy('ordinal', 'ASC')
            //                                                             ->get(); //getCourseModuleContent
            // $this->param['getBenefit'] = CourseBenefit::where('course_id', $getCourseID)
            //                                             ->orderBy('id', 'ASC')
            //                                             ->get(); //getBenefit

            return view('customer.pages.my-course.detail', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }


    public function myCourseDetails($slugCourse, $slugModule, $slugContent)
    {
        try{
            $this->param['getCourse'] = Course::where('slug', $slugCourse)
                                                ->first(); //getCourse
            $getCourseID = $this->param['getCourse']->id; //getCourseID
            $getUserLog = \Auth::user()->id;
            $this->param['getCourseModule'] = CourseModule::where('course_id', $getCourseID)
                                                            ->orderBy('ordinal', 'ASC')
                                                            ->get(); //getCourseModule
            $this->param['getCourseModuleContent'] = CourseModuleContent::orderBy('course_module_id', 'ASC')
                                                                        ->orderBy('ordinal', 'ASC')
                                                                        ->get(); //getCourseModuleContent
            $this->param['getBenefit'] = CourseBenefit::where('course_id', $getCourseID)
                                                        ->orderBy('id', 'ASC')
                                                        ->get(); //getBenefit

            $this->param['getCourseModuleDetails'] = CourseModule::where('course_id', $getCourseID)
                                                                    ->where('slug', $slugModule)
                                                                    ->first();
            $getModuleID = $this->param['getCourseModuleDetails']->id;
            $this->param['getCourseModuleContentDetails'] = CourseModuleContent::where('course_module_id', $getModuleID)
                                                                    ->where('slug', $slugContent)
                                                                    ->first();
            
            $getContentID = $this->param['getCourseModuleContentDetails']->id;
            $getDataEnroll = Enroll::where('course_id', $getCourseID)
                                    ->where('user_id', $getUserLog)
                                    ->first();
            $getEnrollID = $getDataEnroll->id;

            $this->param['getDataDone'] = CourseModuleContentDone::where('enroll_id', $getEnrollID)
                                                    ->where('course_module_content_id', $getContentID)
                                                    ->first();

            if ($this->param['getDataDone'] == null) {
                $this->param['getStatus'] = 'Belum Selesai Dilihat';
            } else {
                $this->param['getStatus'] = 'Sudah Selesai Dilihat';
            }

            if ($this->param['getDataDone'] == null or $this->param['getDataDone']->assigment == null) {
                $this->param['getStatuses'] = 'Belum Mengumpulkan';
                $this->param['pdfDone'] = null;
            } else {
                $this->param['getStatuses'] = 'Sudah Mengumpulkan';
                $this->param['pdfDone'] = $this->param['getDataDone']->assigment;
            }

            return view('customer.pages.my-course.details', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function rateCourse($slug)
    {
        try{
            $this->param['getCourse'] = Course::where('slug', $slug)
                                                ->first(); //getCourse
            $getCourseID = $this->param['getCourse']->id; //getCourseID
            $this->param['getCourseModule'] = CourseModule::where('course_id', $getCourseID)
                                                            ->orderBy('ordinal', 'ASC')
                                                            ->get(); //getCourseModule
            $this->param['getCourseModuleContent'] = CourseModuleContent::orderBy('course_module_id', 'ASC')
                                                                        ->orderBy('ordinal', 'ASC')
                                                                        ->get(); //getCourseModuleContent
            $this->param['getBenefit'] = CourseBenefit::where('course_id', $getCourseID)
                                                        ->orderBy('id', 'ASC')
                                                        ->get(); //getBenefit
            
            $this->param['getRating'] = CourseReview::where('user_id', \Auth::user()->id)
                                                    ->where('course_id', $getCourseID)
                                                    ->first();
            if ($this->param['getRating'] == null) {
                return view('customer.pages.my-course.rating-feedback', $this->param);
            } else {
                return view('customer.pages.my-course.rating-feedback-done', $this->param);
            }

        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function rateCourseSend($slug, Request $request)
    {
        $this->validate($request, 
            [
                'feedback' => 'required|min:4',
                'rating' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
                'feedback.min' => 'Minimal panjang karakter 4.',
            ],
            [
                'feedback' => 'Pesan / feedback',
                'rating' => 'Rating',
            ],
        );
        try{
            $this->param['getCourse'] = Course::where('slug', $slug)
                                                ->first(); //getCourse
            $getCourseID = $this->param['getCourse']->id; //getCourseID
            $getUserLog = \Auth::user()->id;

            $cReview = new CourseReview();
            $cReview->user_id = $getUserLog;
            $cReview->course_id = $getCourseID;
            $cReview->rating = $request->rating;
            $cReview->feedback = $request->feedback;
            $cReview->save();

            
            return redirect()->back()->withStatus('Berhasil Memberi Rating dan Feedback.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function markAsDone($slugCourse, $slugModule, $slugContent)
    {
        try{
            $getUserLog = \Auth::user()->id;
            $this->param['getCourse'] = Course::where('slug', $slugCourse)
                                                ->first(); //getCourse
            $getCourseID = $this->param['getCourse']->id; //getCourseID

            $this->param['getCourseModule'] = CourseModule::where('course_id', $getCourseID)
                                                            ->orderBy('ordinal', 'ASC')
                                                            ->get(); //getCourseModule
            $this->param['getCourseModuleContent'] = CourseModuleContent::orderBy('course_module_id', 'ASC')
                                                                        ->orderBy('ordinal', 'ASC')
                                                                        ->get(); //getCourseModuleContent
            $this->param['getBenefit'] = CourseBenefit::where('course_id', $getCourseID)
                                                        ->orderBy('id', 'ASC')
                                                        ->get(); //getBenefit

            $this->param['getCourseModuleDetails'] = CourseModule::where('course_id', $getCourseID)
                                                                    ->where('slug', $slugModule)
                                                                    ->first();
            $getModuleID = $this->param['getCourseModuleDetails']->id;
            
            $this->param['getCourseModuleContentDetails'] = CourseModuleContent::where('course_module_id', $getModuleID)
                                                                    ->where('slug', $slugContent)
                                                                    ->first();
            $getContentID = $this->param['getCourseModuleContentDetails']->id;

            $getDataEnroll = Enroll::where('course_id', $getCourseID)
                                    ->where('user_id', $getUserLog)
                                    ->first();
            $getEnrollID = $getDataEnroll->id;

            $getDataDone = CourseModuleContentDone::where('enroll_id', $getEnrollID)
                                                    ->where('course_module_content_id', $getContentID)
                                                    ->first();
            if ($getDataDone == null) {
                $cmcDone = new CourseModuleContentDone();
                $cmcDone->enroll_id = $getEnrollID;
                $cmcDone->course_module_content_id = $getContentID;
                $cmcDone->save();
            } else {
                $cmcDone = CourseModuleContentDone::find($getDataDone->id);
                $cmcDone->enroll_id = $getEnrollID;
                $cmcDone->course_module_content_id = $getContentID;
                $cmcDone->save();
            }

            return redirect()->back()->withStatus('Berhasil Menandai Selesai.');

        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function uploadAssigment($slugCourse, $slugModule, $slugContent, Request $request)
    {
        $this->validate($request, 
            [
                'pdf_file' => 'required|min:4',
            ],
            [
                'required' => ':attribute harus diisi.',
            ],
            [
                'pdf_file' => 'Assigment',
            ],
        );
        try{
            $date = date('H-i-s');
            $random = \Str::random(5);
            $getUserLog = \Auth::user()->id;

            $this->param['getCourse'] = Course::where('slug', $slugCourse)
                                                ->first(); //getCourse
            $getCourseID = $this->param['getCourse']->id; //getCourseID

            $this->param['getCourseModule'] = CourseModule::where('course_id', $getCourseID)
                                                            ->orderBy('ordinal', 'ASC')
                                                            ->get(); //getCourseModule
            $this->param['getCourseModuleContent'] = CourseModuleContent::orderBy('course_module_id', 'ASC')
                                                                        ->orderBy('ordinal', 'ASC')
                                                                        ->get(); //getCourseModuleContent
            $this->param['getBenefit'] = CourseBenefit::where('course_id', $getCourseID)
                                                        ->orderBy('id', 'ASC')
                                                        ->get(); //getBenefit

            $this->param['getCourseModuleDetails'] = CourseModule::where('course_id', $getCourseID)
                                                                    ->where('slug', $slugModule)
                                                                    ->first();
            $getModuleID = $this->param['getCourseModuleDetails']->id;
            
            $this->param['getCourseModuleContentDetails'] = CourseModuleContent::where('course_module_id', $getModuleID)
                                                                    ->where('slug', $slugContent)
                                                                    ->first();
            $getContentID = $this->param['getCourseModuleContentDetails']->id;

            $getDataEnroll = Enroll::where('course_id', $getCourseID)
                                    ->where('user_id', $getUserLog)
                                    ->first();
            $getEnrollID = $getDataEnroll->id;

            $getDataDone = CourseModuleContentDone::where('enroll_id', $getEnrollID)
                                                    ->where('course_module_content_id', $getContentID)
                                                    ->first();
            if ($getDataDone == null) {
                $cmcDone = new CourseModuleContentDone();
                $cmcDone->enroll_id = $getEnrollID;
                $cmcDone->course_module_content_id = $getContentID;

                if ($request->file('pdf_file')) {
                    $request->file('pdf_file')->move('image/upload/course/user-upload/pdf-course-module-content', $getUserLog.\Auth::user()->name.$date.$random.$request->file('pdf_file')->getClientOriginalName());
                    $cmcDone->assigment = $getUserLog.\Auth::user()->name.$date.$random.$request->file('pdf_file')->getClientOriginalName();
                }

                $cmcDone->save();
            } else {
                $cmcDone = CourseModuleContentDone::find($getDataDone->id);
                if ($request->file('pdf_file')) {
                    $request->file('pdf_file')->move('image/upload/course/user-upload/pdf-course-module-content', $getUserLog.\Auth::user()->name.$date.$random.$request->file('pdf_file')->getClientOriginalName());
                    $cmcDone->assigment = $getUserLog.\Auth::user()->name.$date.$random.$request->file('pdf_file')->getClientOriginalName();
                }
                $cmcDone->save();
            }

            return redirect()->back()->withStatus('Berhasil Upload Assignment.');

        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function quiz($slugCourse, $slugModule)
    {
        try {
            $this->param['getCourse'] = Course::where('slug', $slugCourse)
                                                ->first(); //getCourse
            $getCourseID = $this->param['getCourse']->id; //getCourseID
            $getUserLog = \Auth::user()->id;
            $this->param['getCourseModule'] = CourseModule::where('course_id', $getCourseID)
                                                            ->orderBy('ordinal', 'ASC')
                                                            ->get(); //getCourseModule
            $this->param['getCourseModuleContent'] = CourseModuleContent::orderBy('course_module_id', 'ASC')
                                                                        ->orderBy('ordinal', 'ASC')
                                                                        ->get(); //getCourseModuleContent
            $this->param['getBenefit'] = CourseBenefit::where('course_id', $getCourseID)
                                                        ->orderBy('id', 'ASC')
                                                        ->get(); //getBenefit

            $this->param['getCourseModuleDetails'] = CourseModule::where('course_id', $getCourseID)
                                                                    ->where('slug', $slugModule)
                                                                    ->first();
            $getModuleID = $this->param['getCourseModuleDetails']->id;

            $this->param['getQuestion'] = CourseModuleQuiz::where('course_module_id', $getModuleID)
                                                            ->orderBy('id', 'ASC')
                                                            ->get();

            $this->param['getQuizDone'] = \DB::table('report_quises')
                                                ->select('report_quises.*')
                                                ->join('course_module_quizes', 'report_quises.course_module_quiz_id', 'course_module_quizes.id')
                                                ->join('course_modules', 'course_module_quizes.course_module_id', 'course_modules.id')
                                                ->where('report_quises.user_id', \Auth::user()->id)
                                                ->where('course_module_quizes.course_module_id', $getModuleID)
                                                ->groupBy('report_quises.user_id', 'course_module_quizes.course_module_id')
                                                ->first();

            // dd($this->param['getQuizDone']);
            
            if($this->param['getQuizDone'] == null) {
                return view('customer.pages.my-course.quiz', $this->param);
            } else {
                return view('customer.pages.my-course.quiz-done', $this->param);
            }

        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
    public function quizStore(Request $request){
        try {
            // dd($request->all());
            $answer = $request->answer;
            $questionID = $request->questionID;

            $countData = count($questionID);
            $data = [];
            // $collection = collect($request->except(['_token']));
            for ($i=0; $i < $countData; $i++) { 
                // ReportQuiz::create([
                //     'course_module_quiz_id' => $questionID[$i],
                //     'answer' => $answer[$i],
                //     'status' => 'not_corrected'
                // ]);
                $data[] = [
                    'course_module_quiz_id' => $questionID[$i],
                    'user_id' => \Auth::user()->id,
                    'answer' => $answer[$i],
                    'status' => 'not_corrected',
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }

            ReportQuiz::insert($data);

            // foreach($questionID as $items) {
            //     $data = [
            //         'course_module_quiz_id' => $items,
            //         'answer' => $answer,
            //         'status' => 'not_corrected'
            //     ];
            // }
            // ReportQuiz::insert($data);

            return redirect()->back()->withStatus('Berhasil Menyelesaikan Quiz.');

        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
