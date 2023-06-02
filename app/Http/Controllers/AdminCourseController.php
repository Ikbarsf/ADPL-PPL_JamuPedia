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
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    private $param;
    public function index()
    {
        try {
            $this->param['getCourse'] = \DB::table('courses')
                                        ->select('courses.*')
                                        ->get();
            $this->param['getCategory'] = CourseCategory::all();

            return view('admin.pages.course.list', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }



    public function add()
    {
        try {
            $this->param['getMentor'] = User::whereHas('roles', function($thisRole){
                $thisRole->where('name', 'admin');
            })->get();

            return view('admin.pages.course.add', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        

        try {
            $this->validate($request,
            [
                'course_name' => 'required|min:4',
                'harga' => 'required|min:4',
                'thumbnail_video' => 'required|min:4',
            ],
            [
                'required' => ':attribute harus diisi.',
                'course_name.min' => 'Minimal panjang karakter 4.',
                'thumbnail_video.min' => 'Minimal panjang karakter 4.',
            ],
            [
                'course_name' => 'Nama Course',
                'harga' => 'Harga',
                'thumbnail_video' => 'Thumbnail Video',
            ],
        );
            $date = date('H-i-s');
            $random = \Str::random(5);

            $course = new Course();
            $course->course_name = $request->course_name;
            $course->harga = $request->harga;

            if ($request->file('avatar')) {
                $request->file('avatar')->move('image/upload/course/thumbnail', $date.$random.$request->file('avatar')->getClientOriginalName());
                $course->thumbnail_image = $date.$random.$request->file('avatar')->getClientOriginalName();
            } else {
                $course->thumbnail_image = 'default.png';
            }

            $course->thumbnail_video = $request->thumbnail_video;
            $course->slug = \Str::slug($request->course_name);
            $course->save();

            return redirect('/back-admin/course/list-course')->withStatus('Data Berhasil di Simpan');
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
                $thisRole->where('name', 'admin');
            })->get();

            return view('admin.pages.course.edit', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        

        try {
            $this->validate($request,
            [
                'course_name' => 'required|min:4',
                'harga' => 'required|min:4',
                'thumbnail_video' => 'required|min:4',
            ],
            [
                'required' => ':attribute harus diisi.',
                'course_name.min' => 'Minimal panjang karakter 4.',
                'thumbnail_video.min' => 'Minimal panjang karakter 4.',
            ],
            [
                'course_name' => 'Nama Course',
                'harga' => 'Harga',
                'thumbnail_video' => 'Thumbnail Video',
            ],
        );
            $date = date('H-i-s');
            $random = \Str::random(5);

            $course = Course::find($id);
            $course->course_name = $request->course_name;
            $course->harga = $request->harga;

            if ($request->file('avatar')) {
                $request->file('avatar')->move('image/upload/course/thumbnail', $date.$random.$request->file('avatar')->getClientOriginalName());
                $course->thumbnail_image = $date.$random.$request->file('avatar')->getClientOriginalName();
            }

            $course->thumbnail_video = $request->thumbnail_video;
            $course->slug = \Str::slug($request->course_name);
            $course->save();

            return redirect('/back-admin/course/list-course')->withStatus('Data Berhasil di Simpan');
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


    public function cek_peserta($id)
    {
        try {
            $this->param['getCourse'] = \DB::table('enrolls')
                                        ->select('enrolls.status', 'users.name', 'users.email', 'users.alamat')
                                        ->join('users', 'enrolls.user_id', 'users.id')
                                        ->where('enrolls.course_id', $id)
                                        ->get();

            return view('admin.pages.course.detail_peserta', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
