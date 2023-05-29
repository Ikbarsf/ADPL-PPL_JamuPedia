<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserEmployee;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    private $param;
    public function listCustomer()
    {
        try {
            $dataCustomer = User::whereHas('roles', function($thisRole){
                $thisRole->where('name', 'customer');
            })->select('users.*')
            ->get();

            $this->param['getCustomer'] = $dataCustomer; 
            return view('admin.pages.customer.list', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
    
    public function listMitra()
    {
        try {
            $dataMitra = User::whereHas('roles', function($thisRole){
                $thisRole->where('name', 'mitra');
            })->select('users.*')
            ->get();

            $this->param['getMitra'] = $dataMitra; 
            return view('admin.pages.mitra.list', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }



    public function storeEmployee(Request $request)
    {
        $this->validate($request, 
            [
                'first_name' => 'required|min:1',
                'email' => 'required|min:4|email',
                'password' => 'required|min:4',
                'phone_number' => 'required|min:9',
            ],
            [
                'required' => ':attribute harus diisi.',
                'first_name.min' => 'Minimal panjang karakter 1.',
                'email.email' => 'Format email tidak benar.',
                'email.min' => 'Minimal panjang karakter 4.',
                'password.min' => 'Minimal panjang karakter 4.',
                'phone_number.min' => 'Minimal panjang karakter 9.',
            ],
            [
                'first_name' => 'Nama Depan',
                'email' => 'Email',
                'password' => 'Password',
                'phone_number' => 'Nomor Telepon',
            ],
        );
        try {
            $date = date('H-i-s');
            $random = \Str::random(5);

            $employee = new User();
            $employee->name = $request->first_name . " " . $request->last_name;
            $employee->email = $request->email;
            $employee->email_verified_at = now();
            $employee->password = bcrypt($request->password);
            $employee->remember_token = \Str::random(60);
            $employee->save();
            
            $employeeDetail = new UserEmployee();
            $employeeDetail->user_id = $employee->id;
            
            if ($request->file('avatar')) {
                $request->file('avatar')->move('image/upload/avatar-user', $date.$random.$request->file('avatar')->getClientOriginalName());
                $employeeDetail->avatar = $date.$random.$request->file('avatar')->getClientOriginalName();
            } else {
                $employeeDetail->avatar = 'default.png';
            }
            
            $employeeDetail->phone_number = $request->phone_number;
            $employeeDetail->about_me = $request->about_me;
            $employeeDetail->position_id = $request->position;
            $employeeDetail->status_user = $request->status_user;
            $employeeDetail->save();
            
            $employee->assignRole('Employee');
            return redirect('/back-admin/user/add-employee')->withStatus('Berhasil menambah data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
    public function storeMentor(Request $request)
    {
        $this->validate($request, 
            [
                'first_name' => 'required|min:1',
                'email' => 'required|min:4|email',
                'password' => 'required|min:4',
                'phone_number' => 'required|min:9',
            ],
            [
                'required' => ':attribute harus diisi.',
                'first_name.min' => 'Minimal panjang karakter 1.',
                'email.email' => 'Format email tidak benar.',
                'email.min' => 'Minimal panjang karakter 4.',
                'password.min' => 'Minimal panjang karakter 4.',
                'phone_number.min' => 'Minimal panjang karakter 9.',
            ],
            [
                'first_name' => 'Nama Depan',
                'email' => 'Email',
                'password' => 'Password',
                'phone_number' => 'Nomor Telepon',
            ],
        );
        try {
            $date = date('H-i-s');
            $random = \Str::random(5);

            $mentor = new User();
            $mentor->name = $request->first_name . " " . $request->last_name;
            $mentor->email = $request->email;
            $mentor->email_verified_at = now();
            $mentor->password = bcrypt($request->password);
            $mentor->remember_token = \Str::random(60);
            $mentor->save();
            
            $mentorDetail = new UserEmployee();
            $mentorDetail->user_id = $mentor->id;
            
            if ($request->file('avatar')) {
                $request->file('avatar')->move('image/upload/avatar-user', $date.$random.$request->file('avatar')->getClientOriginalName());
                $mentorDetail->avatar = $date.$random.$request->file('avatar')->getClientOriginalName();
            } else {
                $mentorDetail->avatar = 'default.png';
            }
            
            $mentorDetail->phone_number = $request->phone_number;
            $mentorDetail->about_me = $request->about_me;
            $mentorDetail->status_user = $request->status_user;
            $mentorDetail->save();
            
            $mentor->assignRole('Mentor');
            return redirect('/back-admin/user/add-mentor')->withStatus('Berhasil menambah data.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function resetEmployee($id)
    {
        try {
            $employee = User::find($id);
            $employee->password = bcrypt('@bePro123');
            $employee->save();
            
            return redirect('/back-admin/user/list-employee')->withStatus('Berhasil mereset password.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
    public function resetMentor($id)
    {
        try {
            $mentor = User::find($id);
            $mentor->password = bcrypt('@bePro123');
            $mentor->save();
            
            return redirect('/back-admin/user/list-mentor')->withStatus('Berhasil mereset password.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function deactiveEmployee($id)
    {
        try {
            $employee = UserEmployee::where('user_id', '=', $id)->firstOrFail();
            $employee->status_user = 'deactive';
            $employee->save();
            
            return redirect('/back-admin/user/list-employee')->withStatus('Berhasil menonaktifkan karyawan.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
    public function activeEmployee($id)
    {
        try {
            $employee = UserEmployee::where('user_id', '=', $id)->firstOrFail();
            $employee->status_user = 'active';
            $employee->save();
            
            return redirect('/back-admin/user/list-employee')->withStatus('Berhasil mengaktifkan karyawan.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }

    public function deactiveMentor($id)
    {
        try {
            $employee = UserEmployee::where('user_id', '=', $id)->firstOrFail();
            $employee->status_user = 'deactive';
            $employee->save();
            
            return redirect('/back-admin/user/list-mentor')->withStatus('Berhasil menonaktifkan mentor.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
    public function activeMentor($id)
    {
        try {
            $employee = UserEmployee::where('user_id', '=', $id)->firstOrFail();
            $employee->status_user = 'active';
            $employee->save();
            
            return redirect('/back-admin/user/list-mentor')->withStatus('Berhasil mengaktifkan mentor.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
