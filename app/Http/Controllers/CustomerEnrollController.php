<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Enroll;
use Illuminate\Http\Request;

class CustomerEnrollController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:customer']);
    }

    private $param;
    public function store(Request $request, $id)
    {
        try {
            $enroll = new Enroll();
            $enroll->course_id = $id;
            $enroll->user_id = \Auth::user()->id;
            $enroll->status = 'belum bayar';
            $enroll->save();

            return redirect('/back-customer/course/list-course')->withStatus('Berhasil melakukan Enrollment.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        // dd($id);
        try {
            Enroll::where('id', $id)->delete();
            // Enroll::query()->find($id)->delete();
            return redirect('/back-customer/course/list-course')->withStatus('Berhasil menghapus data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}

