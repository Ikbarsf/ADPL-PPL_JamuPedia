<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseCategory;

class AdminCategoryCourseController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Admin']);
    }

    private $param;
    public function index()
    {
        try {
            $this->param['getcCategory'] = CourseCategory::all();
            
            return view('admin.pages.course-category.list', $this->param);
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
                'category_name' => 'required|min:4',
            ],
            [
                'required' => ':attribute harus diisi.',
                'category_name.min' => 'Minimal panjang karakter 4.',
            ],
            [
                'category_name' => 'Nama Kategori',
            ],
        );
        try {
            $cCategory = new CourseCategory();
            $cCategory->category_name = $request->category_name;
            $cCategory->save();

            return redirect('/back-admin/category-course/list-category-course')->withStatus('Berhasil menambah data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $this->param['getDetailcCategory'] = CourseCategory::find($id);
            return view('admin.pages.course-category.edit', $this->param);
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, 
            [
                'category_name' => 'required|min:4',
            ],
            [
                'required' => ':attribute harus diisi.',
                'category_name.min' => 'Minimal panjang karakter 4.',
            ],
            [
                'category_name' => 'Nama Kategori',
            ],
        );
        try {
            $cCategory = CourseCategory::find($id);
            $cCategory->category_name = $request->category_name;
            $cCategory->save();

            return redirect('/back-admin/category-course/list-category-course')->withStatus('Berhasil memperbarui data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            CourseCategory::find($id)->delete();
            return redirect('/back-admin/category-course/list-category-course')->withStatus('Berhasil menghapus data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
