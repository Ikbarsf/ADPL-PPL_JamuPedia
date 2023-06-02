<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enroll;
use Illuminate\Http\Request;

class CustomerTransaksiCourseController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:customer']);
    }

    private $param;
    public function index(Request $request)
    {
        try {
            $this->param['getMyCourse'] = \DB::table('enrolls')
                                ->select('courses.*')
                                ->join('courses', 'courses.id', 'enrolls.course_id')
                                ->where('enrolls.user_id', \Auth::user()->id)
                                ->where('enrolls.status', 'belum bayar')
                                ->get();
            $this->param['getPrice'] = \DB::table('enrolls')
                                        ->select('courses.*')
                                        ->join('courses', 'courses.id', 'enrolls.course_id')
                                        ->where('enrolls.user_id', \Auth::user()->id)
                                        ->where('status','=', 'belum bayar')
                                        ->sum('harga');
                return view('customer.pages.transaksi.transaksi-course', $this->param);
            } catch (\Exception $e) {
                return redirect()->back()->withError($e->getMessage());
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
            }
    }

    public function bayar()
    {
        try {
            \DB::table('enrolls')->where('status', '=', 'belum bayar')->update(array('status' => 'sudah bayar'));
            return redirect('/back-customer/course/list-course')->withStatus('Berhasil membayar kelas');
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


            return view('customer.pages.my-course.detail', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
