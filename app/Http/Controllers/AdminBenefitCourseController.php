<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseBenefit;
use App\Models\Course;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class AdminBenefitCourseController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Admin']);
    }

    private $param;
    public function index(){
        try {
            $this->param['getCourse'] = Course::all();
            // $this->param['getcBenefit'] = CourseBenefit::all();
            $this->param['getcBenefit'] = \DB::table('course_benefits')
                                            ->select('course_benefits.*', 'courses.course_name')
                                            ->join('courses', 'course_benefits.course_id', 'courses.id')
                                            ->get();
            
            return view('admin.pages.course-benefit.list', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function store(Request $request){
        $this->validate($request, 
            [
                'benefit' => 'required|min:4',
            ],
            [
                'required' => ':attribute harus diisi.',
                'benefit.min' => 'Minimal panjang karakter 4.',
            ],
            [
                'benefit' => 'Keuntungan',
            ],
        );

        try {
            $benefit = new CourseBenefit();
            $benefit->course_id = $request->course;
            $benefit->benefit = $request->benefit;
            $benefit->save();

            return redirect('/back-admin/benefit-course/list-benefit-course')->withStatus('Berhasil menambahkan data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            CourseBenefit::find($id)->delete();
            return redirect('/back-admin/benefit-course/list-benefit-course')->withStatus('Berhasil menghapus data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
