<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Course;
use App\Models\CourseModule;
use App\Models\CourseModuleContent;
use App\Models\CourseBenefit;
use App\Models\CourseModuleQuiz;
use App\Models\ReportQuiz;

class AdminProgressEmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Admin']);
    }
    
    private $param;
    public function index(){
        try {
            $this->param['getEmployee'] = User::whereHas('roles', function($thisRole){
                $thisRole->where('name', 'Employee');
            })->get();
            // $this->param['getDivision'] = Division::all(); 
            // return view('admin.pages.division.list', $this->param);

            return view('admin.pages.progress-employee.list', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function detail($id) {
        try {
            $this->param['getUserID'] = $id;
            $this->param['getMyCourse'] = \DB::table('enrolls')
                                        ->select('courses.*')
                                        ->join('courses', 'courses.id', 'enrolls.course_id')
                                        ->where('enrolls.user_id', $id)
                                        ->where('enrolls.status', 'active')
                                        ->get();
            
            $this->param['getTotalContent'] = \DB::table('course_module_contents')
                                                ->select(array('courses.id AS course_id', 'courses.course_name AS course_name', \DB::raw('COUNT(course_module_contents.id) AS total_content')))
                                                ->join('course_modules', 'course_module_contents.course_module_id', 'course_modules.id')
                                                ->join('courses', 'course_modules.course_id', 'courses.id')
                                                ->groupBy('courses.course_name')
                                                ->get();
            $this->param['getTotalContentDone'] = \DB::table('course_module_content_finsishs')
                                                ->select(array('courses.id AS course_id', 'courses.course_name AS course_name', \DB::raw('COUNT(course_module_content_finsishs.course_module_content_id) AS total_content')))
                                                ->join('enrolls', 'course_module_content_finsishs.enroll_id', 'enrolls.id')
                                                ->join('courses', 'enrolls.course_id', 'courses.id')
                                                ->where('enrolls.user_id', $id)
                                                ->groupBy('courses.course_name')
                                                ->get();

            return view('admin.pages.progress-employee.detail', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function reportQuiz($idUser, $slugCourse){
        try {
            $this->param['getUserID'] = $idUser;
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

            return view('admin.pages.progress-employee.report-quiz', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function detailQuiz($idUser, $slugCourse, $slugModule){
        try {
            $this->param['getUserID'] = $idUser;
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

            $this->param['getReportNotCorrected'] = \DB::table('report_quises')
                                                ->select('report_quises.id AS id_report_quises', 'course_module_quizes.question', 'report_quises.answer', 'report_quises.status', 'course_module_quizes.discussion_result', 'course_module_quizes.score')
                                                ->join('course_module_quizes', 'course_module_quizes.id', 'report_quises.course_module_quiz_id')
                                                ->where('report_quises.user_id', $idUser)
                                                ->where('course_module_quizes.course_module_id', $getModuleID)
                                                ->get();
            
            // dd($this->param['getReportNotCorrected']);

            return view('admin.pages.progress-employee.report-quiz-detail', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function updateQuizUser(Request $request){
        try {
            // dd($request->all());
            $status = $request->status;
            $reportID = $request->reportID;

            $countData = count($reportID);
            $data = [];
            for ($i=0; $i < $countData; $i++) {
                // $data[] = [
                //     'course_module_quiz_id' => $questionID[$i],
                //     'user_id' => \Auth::user()->id,
                //     'answer' => $answer[$i],
                //     'status' => 'not_corrected',
                //     'created_at' => now(),
                //     'updated_at' => now()
                // ];

                $update = ReportQuiz::find($reportID[$i]);
                $update->status = $status[$i];
                $update->save();
            }

            // ReportQuiz::insert($data);

            return redirect()->back()->withStatus('Berhasil Menilai Quiz.');

        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
