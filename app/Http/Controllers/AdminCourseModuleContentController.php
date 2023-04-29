<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseModuleContent;

class AdminCourseModuleContentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Admin']);
    }

    private $param;
    public function index()
    {
        try {
            $this->param['getCourseModuleContent'] = \DB::table('course_module_contents')
                                        ->select('course_module_contents.*', 'course_modules.module_name', 'courses.course_name')
                                        ->join('course_modules', 'course_module_contents.course_module_id', 'course_modules.id')
                                        ->join('courses', 'course_modules.course_id', 'courses.id')
                                        ->get();
            
            return view('admin.pages.course-module-content.list', $this->param);
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

            return view('admin.pages.course-module-content.add', $this->param);
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
                'title_module_content' => 'required|min:4',
                'description' => 'required|min:4',
                'video_link' => 'required|min:4',
                'ordinal' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
                'title_module_content.min' => 'Minimal panjang karakter 4.',
                'description.min' => 'Minimal panjang karakter 4.',
                'video_link.min' => 'Minimal panjang karakter 4.',
            ],
            [
                'title_module_content' => 'Judul Modul Konten',
                'description' => 'Deskripsi',
                'video_link' => 'Thumbnail Video',
                'ordinal' => 'Urutan',
            ],
        );

        try {
            $date = date('H-i-s');
            $random = \Str::random(5);

            $course = new CourseModuleContent();
            $course->course_module_id = $request->course_module;
            $course->title_module_content = $request->title_module_content;
            $course->slug = \Str::slug($request->title_module_content);
            $course->video_link = $request->video_link;

            if ($request->file('pdf_file')) {
                $request->file('pdf_file')->move('image/upload/course/pdf-course-module-content', $date.$random.$request->file('pdf_file')->getClientOriginalName());
                $course->pdf_file = $date.$random.$request->file('pdf_file')->getClientOriginalName();
            } else {
                $course->pdf_file = 'default.pdf';
            }
            
            $course->description = $request->description;
            $course->ordinal = $request->ordinal;

            $course->save();

            return redirect('/back-admin/course-module-content/add-course-module-content')->withStatus('Berhasil menambah data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
    
    public function edit($id)
    {
        try {
            $this->param['getCourseModuleContentDetail'] = CourseModuleContent::find($id);
            $this->param['getCourseModule'] = \DB::table('course_modules')
                                            ->select('course_modules.id', 'course_modules.module_name', 'courses.course_name')
                                            ->join('courses', 'course_modules.course_id', 'courses.id')
                                            ->get();

            return view('admin.pages.course-module-content.edit', $this->param);
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
                'title_module_content' => 'required|min:4',
                'description' => 'required|min:4',
                'video_link' => 'required|min:4',
                'ordinal' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
                'title_module_content.min' => 'Minimal panjang karakter 4.',
                'description.min' => 'Minimal panjang karakter 4.',
                'video_link.min' => 'Minimal panjang karakter 4.',
            ],
            [
                'title_module_content' => 'Judul Modul Konten',
                'description' => 'Deskripsi',
                'video_link' => 'Thumbnail Video',
                'ordinal' => 'Urutan',
            ],
        );

        try {
            $date = date('H-i-s');
            $random = \Str::random(5);

            $course = CourseModuleContent::find($id);
            $course->course_module_id = $request->course_module;
            $course->title_module_content = $request->title_module_content;
            $course->slug = \Str::slug($request->title_module_content);
            $course->video_link = $request->video_link;

            if ($request->file('pdf_file')) {
                $request->file('pdf_file')->move('image/upload/course/pdf-course-module-content', $date.$random.$request->file('pdf_file')->getClientOriginalName());
                $course->pdf_file = $date.$random.$request->file('pdf_file')->getClientOriginalName();
            }
            
            $course->description = $request->description;
            $course->ordinal = $request->ordinal;

            $course->save();

            return redirect('/back-admin/course-module-content/list-course-module-content')->withStatus('Berhasil menambah data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            CourseModuleContent::find($id)->delete();
            return redirect('/back-admin/course-module-content/list-course-module-content')->withStatus('Berhasil menghapus data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
