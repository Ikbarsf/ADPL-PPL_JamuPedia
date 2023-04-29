<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportEmployeeQuiz;

class AdminReportQuizController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Admin']);
    }
    
    private $param;
    public function index(){
        try {
            $this->param['getValue'] = \DB::table('report_quises')
                                        ->select('users.name', 'courses.course_name', 'course_modules.module_name', \DB::raw("SUM(IF(report_quises.status = 'true', course_module_quizes.score, 0)) AS Nilai"))
                                        ->join('course_module_quizes', 'course_module_quizes.id', 'report_quises.course_module_quiz_id')
                                        ->join('course_modules', 'course_modules.id', 'course_module_quizes.course_module_id')
                                        ->join('courses', 'courses.id', 'course_modules.course_id')
                                        ->join('enrolls', 'enrolls.course_id', 'courses.id')
                                        ->join('users', 'users.id', 'enrolls.user_id')
                                        ->where('report_quises.status', '<>', 'not_corrected')
                                        ->groupBy('course_module_quizes.course_module_id')
                                        ->get();
            // dd($this->param['getValue']);
            return view('admin.pages.report-quiz.list-report-quiz', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function exportEmployeesQuiz(){
        $excel = Excel::download(new ExportEmployeeQuiz, 'export-employee-quiz-nilai.xlsx');
        return $excel;
    }
}
