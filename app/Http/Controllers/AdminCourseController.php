<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CourseCategory;
use Illuminate\Support\Facades\DB;

class AdminCourseController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['role:admin']);
    // }

    private $param;
    public function index()
    {
        $course = Course::all();
        return view('admin.pages.course.list', [
            'course' => $course
        ]);
    }
    
    public function create()
    {
        return view('admin.pages.course.add');
    }

    public function add()
    {
        try {
            $this->param['getMentor'] = User::whereHas('roles', function($thisRole){
                $thisRole->where('name', 'Mentor');
            })->get();
            $this->param['getcCategory'] = CourseCategory::all();

            return view('admin.pages.course.add', $this->param);
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
                'course_name' => 'required|min:4',
                'harga' => 'required|min:4',
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'thumbnail_video' => 'required|min:4',
            ],
            [
                'required' => 'kolom ini harus diisi.',
                'course_name.min' => 'Minimal panjang karakter 4.',
                'description.min' => 'Minimal panjang karakter 4.',
                'thumbnail_video.min' => 'Minimal panjang karakter 4.',
            ],
            [
                'course_name' => 'Nama Course',
                'description' => 'Deskripsi',
                'thumbnail_video' => 'Thumbnail Video',
            ],
        );

        try {
            $date = date('H-i-s');
            $random = Str::random(5);

            $course = new Course();
            $course->course_name = $request->course_name;

            if ($request->file('avatar')) {
                $request->file('avatar')->move('image/upload/course/thumbnail', $date.$random.$request->file('avatar')->getClientOriginalName());
                $course->thumbnail_image = $date.$random.$request->file('avatar')->getClientOriginalName();
            } else {
                $course->thumbnail_image = 'default.png';
            }

            $course->thumbnail_video = $request->thumbnail_video;
            $course->category_id = $request->category;
            $course->slug = Str::slug($request->course_name);
            $course->user_id = $request->mentor;
            $course->save();

            return redirect('/back-admin/course/add-course')->withStatus('Berhasil menambah data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $this->param['getCourseDetail'] = Course::find($id);
            $this->param['getMentor'] = User::whereHas('roles', function($thisRole){
                $thisRole->where('name', 'Mentor');
            })->get();
            $this->param['getcCategory'] = CourseCategory::all();

            return view('admin.pages.course.edit', $this->param);
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
                'course_name' => 'required|min:4',
                'description' => 'required|min:4',
                'thumbnail_video' => 'required|min:4',
            ],
            [
                'required' => ':attribute harus diisi.',
                'course_name.min' => 'Minimal panjang karakter 4.',
                'description.min' => 'Minimal panjang karakter 4.',
                'thumbnail_video.min' => 'Minimal panjang karakter 4.',
            ],
            [
                'course_name' => 'Nama Course',
                'description' => 'Deskripsi',
                'thumbnail_video' => 'Thumbnail Video',
            ],
        );

        try {
            $date = date('H-i-s');
            $random = Str::random(5);

            $course = Course::find($id);
            $course->course_name = $request->course_name;
            $course->description = $request->description;

            if ($request->file('avatar')) {
                $request->file('avatar')->move('image/upload/course/thumbnail', $date.$random.$request->file('avatar')->getClientOriginalName());
                $course->thumbnail_image = $date.$random.$request->file('avatar')->getClientOriginalName();
            }

            $course->thumbnail_video = $request->thumbnail_video;
            $course->category_id = $request->category;
            $course->slug = Str::slug($request->course_name);
            $course->user_id = $request->mentor;
            $course->save();

            return redirect('/back-admin/course/list-course')->withStatus('Berhasil memperbarui data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Course::find($id)->delete();
            return redirect('/back-admin/course/list-course')->withStatus('Berhasil menghapus data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
