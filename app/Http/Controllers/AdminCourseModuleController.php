<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseModule;

class AdminCourseModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Admin']);
    }
    
    private $param;
    public function index()
    {
        try {
            $this->param['getCourseModule'] = \DB::table('course_modules')
                                        ->select('course_modules.*', 'courses.course_name')
                                        ->join('courses', 'course_modules.course_id', 'courses.id')
                                        ->get();
            
            return view('admin.pages.course-module.list', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function add()
    {
        try {
            $this->param['getCourse'] = Course::all();

            return view('admin.pages.course-module.add', $this->param);
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
                'module_name' => 'required|min:4',
                'ordinal' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
                'module_name.min' => 'Minimal panjang karakter 4.',
            ],
            [
                'module_name' => 'Nama Modul',
                'ordinal' => 'Urutan',
            ],
        );

        try {
            $courseModule = new CourseModule();
            $courseModule->course_id = $request->course;
            $courseModule->module_name = $request->module_name;
            $courseModule->slug = \Str::slug($request->module_name);
            $courseModule->ordinal = $request->ordinal;
            $courseModule->save();

            return redirect('/back-admin/course-module/add-course-module')->withStatus('Berhasil menambah data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $this->param['getCourseModuleDetail'] = CourseModule::find($id);
            $this->param['getCourse'] = Course::all();

            return view('admin.pages.course-module.edit', $this->param);
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
                'module_name' => 'required|min:4',
                'ordinal' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
                'module_name.min' => 'Minimal panjang karakter 4.',
            ],
            [
                'module_name' => 'Nama Modul',
                'ordinal' => 'Urutan',
            ],
        );

        try {
            $courseModule = CourseModule::find($id);
            $courseModule->course_id = $request->course;
            $courseModule->module_name = $request->module_name;
            $courseModule->slug = \Str::slug($request->module_name);
            $courseModule->ordinal = $request->ordinal;
            $courseModule->save();

            return redirect('/back-admin/course-module/list-course-module')->withStatus('Berhasil memperbarui data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
    
    public function destroy($id)
    {
        try {
            CourseModule::find($id)->delete();
            return redirect('/back-admin/course-module/list-course-module')->withStatus('Berhasil menghapus data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
