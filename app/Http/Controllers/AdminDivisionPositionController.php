<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\Position;

class AdminDivisionPositionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Admin']);
    }

    private $param;
    public function listDivision()
    {
        try {
            $this->param['getDivision'] = Division::all(); 
            return view('admin.pages.division.list', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
    
    public function listPosition()
    {
        try {
            // $this->param['getPosition'] = Division::all();
            $this->param['getPosition'] = \DB::table('positions')
                                                ->select('positions.*', 'divisions.division_name')
                                                ->join('divisions', 'positions.division_id', 'divisions.id')
                                                ->get();
            return view('admin.pages.position.list', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function addDivision()
    {
        try {
            return view('admin.pages.division.add');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function addPosition()
    {
        $this->param['getDivision'] = Division::all();
        try {
            return view('admin.pages.position.add', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function storeDivision(Request $request)
    {
        $this->validate($request, 
            [
                'division_name' => 'required|min:4',
            ],
            [
                'required' => ':attribute harus diisi.',
                'division_name.min' => 'Minimal panjang karakter 4.',
            ],
            [
                'division_name' => 'Nama Divisi',
            ],
        );
        try {
            $division = new Division();
            $division->division_name = $request->division_name;
            $division->save();

            return redirect('/back-admin/division-position/add-division')->withStatus('Berhasil menambah data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function storePosition(Request $request)
    {
        $this->validate($request, 
            [
                'position_name' => 'required|min:4',
            ],
            [
                'required' => ':attribute harus diisi.',
                'position_name.min' => 'Minimal panjang karakter 4.',
            ],
            [
                'position_name' => 'Nama Jabatan',
            ],
        );
        try {
            $position = new Position();
            $position->division_id = $request->division;
            $position->position_name = $request->position_name;
            $position->save();

            return redirect('/back-admin/division-position/add-position')->withStatus('Berhasil menambah data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function editDivision($id)
    {
        try {
            $this->param['getDetailDivision'] = Division::find($id);
            return view('admin.pages.division.edit', $this->param);
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function editPosition($id)
    {
        try {
            $this->param['getDivision'] = Division::all();
            $this->param['getDetailPosition'] = Position::find($id);
            return view('admin.pages.position.edit', $this->param);
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function updateDivision(Request $request, $id)
    {
        $this->validate($request, 
            [
                'division_name' => 'required|min:4',
            ],
            [
                'required' => ':attribute harus diisi.',
                'division_name.min' => 'Minimal panjang karakter 4.',
            ],
            [
                'division_name' => 'Nama Divisi',
            ],
        );
        try {
            $division = Division::find($id);
            $division->division_name = $request->division_name;
            $division->save();

            return redirect('/back-admin/division-position/list-division')->withStatus('Berhasil memperbarui data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function updatePosition(Request $request, $id)
    {
        $this->validate($request, 
            [
                'position_name' => 'required|min:4',
            ],
            [
                'required' => ':attribute harus diisi.',
                'position_name.min' => 'Minimal panjang karakter 4.',
            ],
            [
                'position_name' => 'Nama Divisi',
            ],
        );
        try {
            $position = Position::find($id);
            $position->division_id = $request->division;
            $position->position_name = $request->position_name;
            $position->save();

            return redirect('/back-admin/division-position/list-position')->withStatus('Berhasil memperbarui data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function destroyDivision($id)
    {
        try {
            Division::find($id)->delete();
            return redirect('/back-admin/division-position/list-division')->withStatus('Berhasil menghapus data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function destroyPosition($id)
    {
        try {
            Position::find($id)->delete();
            return redirect('/back-admin/division-position/list-position')->withStatus('Berhasil menghapus data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
