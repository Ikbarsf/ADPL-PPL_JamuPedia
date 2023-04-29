<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\CourseModuleContent;
use App\Models\CourseModuleQuiz;

class AdminCourseModuleQuizController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Admin']);
    }

    private $param;
    public function index()
    {
        try {
            $this->param['getCourseModuleContent'] = \DB::table('course_module_quizes')
                                        ->select('course_module_quizes.*', 'course_modules.module_name', 'courses.course_name')
                                        ->join('course_modules', 'course_module_quizes.course_module_id', 'course_modules.id')
                                        ->join('courses', 'course_modules.course_id', 'courses.id')
                                        ->get();
            
            return view('admin.pages.course-module-quiz.list', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function add()
    {
        try {
            $this->param['getCourseModule'] = \DB::table('course_modules')
                                            ->select('course_modules.id', 'course_modules.module_name', 'courses.course_name')
                                            ->join('courses', 'course_modules.course_id', 'courses.id')
                                            ->get();

            return view('admin.pages.course-module-quiz.add', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, 
            [
                'question' => 'required|min:4',
                'discussion_result' => 'required|min:4',
                'score' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
                'question.min' => 'Minimal panjang karakter 4.',
                'discussion_result.min' => 'Minimal panjang karakter 4.',
            ],
            [
                'question' => 'Pertanyaan',
                'discussion_result' => 'Pembahasan',
                'score' => 'Nilai',
            ],
        );

        try {
            $courseQuiz = new CourseModuleQuiz();
            $courseQuiz->course_module_id = $request->course_module;
            $courseQuiz->question = $request->question;
            $courseQuiz->discussion_result = $request->discussion_result;
            $courseQuiz->score = $request->score;

            $courseQuiz->save();

            return redirect('/back-admin/course-module-quiz/add-course-module-quiz')->withStatus('Berhasil menambah data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, 
            [
                'question' => 'required|min:4',
                'discussion_result' => 'required|min:4',
                'score' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
                'question.min' => 'Minimal panjang karakter 4.',
                'discussion_result.min' => 'Minimal panjang karakter 4.',
            ],
            [
                'question' => 'Pertanyaan',
                'discussion_result' => 'Pembahasan',
                'score' => 'Nilai',
            ],
        );

        try {
            $courseQuiz = CourseModuleQuiz::find($id);
            $courseQuiz->course_module_id = $request->course_module;
            $courseQuiz->question = $request->question;
            $courseQuiz->discussion_result = $request->discussion_result;
            $courseQuiz->score = $request->score;

            $courseQuiz->save();

            return redirect('/back-admin/course-module-quiz/list-course-module-quiz')->withStatus('Berhasil memperbarui data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $this->param['getCourseModuleContentQuiz'] = CourseModuleQuiz::find($id);
            $this->param['getCourseModule'] = \DB::table('course_modules')
                                            ->select('course_modules.id', 'course_modules.module_name', 'courses.course_name')
                                            ->join('courses', 'course_modules.course_id', 'courses.id')
                                            ->get();

            return view('admin.pages.course-module-quiz.edit', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            CourseModuleQuiz::find($id)->delete();
            return redirect('/back-admin/course-module-quiz/list-course-module-quiz')->withStatus('Berhasil menghapus data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
