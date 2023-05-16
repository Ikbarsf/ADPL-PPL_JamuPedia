<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MitraECommersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:mitra']);
    }

    private $param;
    public function index()
    {
        try {
            $this->param['getMyCourse'] = \DB::table('enrolls')
                                        ->select('courses.*')
                                        ->join('courses', 'courses.id', 'enrolls.course_id')
                                        ->where('enrolls.user_id', \Auth::user()->id)
                                        // ->where('enrolls.status', 'active')
                                        ->get();
                return view('mitra.pages.barang.list', $this->param);
            } catch (\Exception $e) {
                return redirect()->back()->withError($e->getMessage());
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
            }
    }
}
