<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\CourseCategory;
use App\Models\Course;
use App\Models\CourseBenefit;
use App\Models\Enroll;
use App\Models\Division;
use App\Models\Position;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Admin']);
    }

    private $param;
    public function index()
    {
        try {
            $countMentor = User::whereHas('roles', function($thisRole){
                $thisRole->where('name', 'Mentor');
            })->count();

            $countEmployee = User::whereHas('roles', function($thisRole){
                $thisRole->where('name', 'Employee');
            })->count();

            $this->param['countMentor'] = $countMentor;
            $this->param['countEmployee'] = $countEmployee;
            $this->param['countcCategory'] = CourseCategory::count();
            $this->param['countCourse'] = Course::count();
            $this->param['countcBenefit'] = CourseBenefit::count();
            $this->param['countEnroll'] = Enroll::count();
            $this->param['countDivision'] = Division::count();
            $this->param['countPosition'] = Position::count();
            
            return view('admin.pages.dashboard.dashboard', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
