<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\DataUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use function PHPSTORM_META\map;

class DataUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Menampilkan halaman data user
    public function index()
    {
        $users = DB::table('users')
            ->where('role_id', '=', '2')
            ->get();
        return view('admin.datauser.viewuser', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //menampilkan halaman tambah data user
    public function create()
    {
        $password = Str::random(10);
        return view('admin.datauser.tambahuser', ['roles' => Role::all(), 'password' => $password]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //menyimpan data user
    public function store(Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            'nama' => 'required|min:5',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required',
            'role_id' => 'required',
            'status' => 'required'
        ]);
        $validateData['password'] = Hash::make($validateData['password']);

        $receiver = $validateData['email'];
        $subject = "Registrasi Akun Kuisioner Kinerja Monster Group";
        $body = $validateData['email'];
        $body2 = $request->password;

        DataUser::create($validateData);
        $this->sendEmail($receiver, $subject, $body, $body2);
        return redirect()->route('viewuser')->with('success', 'User baru telah ditambahkan dan telah dikirimkan melalui email!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataUser  $dataUser
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataUser  $dataUser
     * @return \Illuminate\Http\Response
     */

    //menampilkan halaman edit data user
    public function edit($id)
    {
        $data = DataUser::find($id);
        return view('admin.datauser.updateuser', ['data' => $data, 'roles' => Role::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataUser  $dataUser
     * @return \Illuminate\Http\Response
     */

    //Menyimpan update data user
    public function update(Request $request, DataUser $id)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:5',
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:255',
            'role_id' => 'required',
            'status' => 'required'
        ]);
        $validateData['password'] = Hash::make($validateData['password']);
        $id->update($validateData);
        return redirect()->route('viewuser')->with('success', 'Sukses update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataUser  $dataUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataUser $id)
    {
        DataUser::destroy($id->id);
        return redirect()->route('viewuser')->with('sukses', 'User telah dihapus!');
    }

    public function sendEmail($receiver, $subject, $body, $body2)
    {
        if ($this->isOnline()) {
            $email = [
                'recepient' => $receiver,
                'fromEmail' => 'admin@kuisioner.com',
                'fromName' => 'Monster Group',
                'subject' => $subject,
                'body' => $body,
                'body2' => $body2,
            ];

            Mail::send('auth.email', $email, function ($message) use ($email) {
                $message->from($email['fromEmail'], $email['fromName']);
                $message->to($email['recepient']);
                $message->subject($email['subject']);
            });
        }
    }

    public function isOnline($site = "https://www.youtube.com/")
    {
        if (@fopen($site, "r")) {
            return true;
        } else {
            return false;
        }
    }
}
