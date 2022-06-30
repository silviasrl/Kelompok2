<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Mail\ConfirmMail;
use App\Mail\ProcessMail;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();
        if ($request->ajax()) {
            if ($user->role == 'a') {
                $collection = Register::where('name', 'LIKE', '%' . $request->keywords . '%')
                    ->orWhere('nik', 'LIKE', '%' . $request->keywords . '%')
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
                return view('pages.application.list', compact('collection', 'user'));
            } else {
                $collection = Register::where('name', 'LIKE', '%' . $request->keywords . '%')
                    ->where('user_id', $user->id)->orderBy('id', 'desc')
                    ->orWhere('nik', 'LIKE', '%' . $request->keywords . '%')
                    ->where('user_id', $user->id)->orderBy('id', 'desc')
                    ->paginate(10);
                return view('pages.application.list', compact('collection', 'user'));
            }
        }
        return view('pages.application.main', compact('user'));
    }

    public function create()
    {
        return view('pages.application.input', ['data' => new Register]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|unique:registers,nik',
            'name' => 'required',
            'phone' => 'required',
            'kk' => 'required',
            'akta' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nik')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nik'),
                ]);
            } elseif ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            } elseif ($errors->has('phone')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('phone'),
                ]);
            } elseif ($errors->has('kk')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('kk'),
                ]);
            } elseif ($errors->has('akta')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('akta'),
                ]);
            }
        }

        $data = new Register();
        $data->user_id = Auth::user()->id;
        $data->nik = $request->nik;
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->st = 'menunggu konfirmasi';
        $data->verified_by = 0;
        if (request()->file('kk') && request()->file('akta')) {
            $kk = request()->file('kk')->store("public/register");
            $data->kk = explode("public/", $kk)[1];
            $akta = request()->file('akta')->store("public/register");
            $data->akta = explode("public/", $akta)[1];
        }

        $data->save();

        $notification = new Notification();
        $notification->user_id = 1;
        $notification->message = 'Permohonan Baru Dari ' . $data->name . '. Mohon segera di proses.';
        $notification->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Tersimpan',
        ]);
    }

    public function show(Register $register)
    {
        //
    }

    public function edit(Register $register)
    {
        return view('pages.application.input', ['data' => $register]);
    }

    public function update(Request $request, Register $register)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|unique:news,title,' . $register->id,
            'name' => 'required',
            'phone' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nik')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nik'),
                ]);
            } elseif ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            } elseif ($errors->has('phone')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('phone'),
                ]);
            }
        }

        $register->nik = $request->nik;
        $register->name = $request->name;
        $register->phone = $request->phone;

        if (request()->file('kk')) {
            Storage::delete($register->kk);
            $kk = request()->file('kk')->store("public/register");
            $register->kk = explode("public/", $kk)[1];
        }

        if (request()->file('akta')) {
            Storage::delete($register->akta);
            $akta = request()->file('akta')->store("public/register");
            $register->akta = explode("public/", $akta)[1];
        }

        $register->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Terupdate',
        ]);
    }

    public function destroy(Register $register)
    {
        $register->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Terhapus',
        ]);
    }

    public function confirm(Register $register)
    {
        return view('pages.application.confirm', ['data' => $register]);
    }

    public function do_confirm(Request $request, Register $register)
    {
        if ($request->status != null) {
            if ($request->status == 'diterima') {
                $validator = Validator::make($request->all(), [
                    'tanggal_diambil' => 'required',
                    'jam_diambil' => 'required',
                    'lokasi' => 'required',
                ]);

                if ($validator->fails()) {
                    $errors = $validator->errors();
                    if ($errors->has('tanggal_diambil')) {
                        return response()->json([
                            'alert' => 'error',
                            'message' => $errors->first('tanggal_diambil'),
                        ]);
                    } elseif ($errors->has('jam_diambil')) {
                        return response()->json([
                            'alert' => 'error',
                            'message' => $errors->first('jam_diambil'),
                        ]);
                    } elseif ($errors->has('lokasi')) {
                        return response()->json([
                            'alert' => 'error',
                            'message' => $errors->first('lokasi'),
                        ]);
                    }
                }
            } else {
                $validator = Validator::make($request->all(), [
                    'reason' => 'required',
                ]);

                if ($validator->fails()) {
                    $errors = $validator->errors();
                    if ($errors->has('reason')) {
                        return response()->json([
                            'alert' => 'error',
                            'message' => $errors->first('reason'),
                        ]);
                    }
                }
            }
        }

        $register->st = $request->status;
        $register->verified_by = Auth::user()->id;
        if ($request->status == 'diterima') {
            $register->tanggal_diambil = $request->tanggal_diambil;
            $register->jam_diambil = $request->jam_diambil;
            $register->lokasi = $request->lokasi;

            $notification = new Notification();
            $notification->user_id = $register->user_id;
            $notification->message = 'Permohonan Anda Telah Diterima. Silahkan cek email anda untuk informasi lebih lanjut.';
            $notification->save();
        } else {
            $register->reason = $request->reason;
            $notification = new Notification();
            $notification->user_id = $register->user_id;
            $notification->message = 'Permohonan Anda Telah Ditolak. Silahkan cek email anda untuk informasi lebih lanjut.';
            $notification->save();
        }
        $register->update();

        Mail::to($register->user->email)->send(new ConfirmMail($register));

        return response()->json([
            'alert' => 'success',
            'message' => 'Terkonfirmasi',
        ]);
    }

    public function process(Register $register)
    {
        return view('pages.application.process', ['data' => $register]);
    }

    public function do_process(Request $request, Register $register)
    {
        $validator = Validator::make($request->all(), [
            'tanggal_diambil' => 'required',
            'jam_diambil' => 'required',
            'lokasi' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('tanggal_diambil')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tanggal_diambil'),
                ]);
            } elseif ($errors->has('jam_diambil')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('jam_diambil'),
                ]);
            } elseif ($errors->has('lokasi')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('lokasi'),
                ]);
            }
        }
        $register->st = 'selesai';
        $register->tanggal_diambil = $request->tanggal_diambil;
        $register->jam_diambil = $request->jam_diambil;
        $register->lokasi = $request->lokasi;
        $register->update();

        $notification = new Notification();
        $notification->user_id = $register->user_id;
        $notification->message = 'Permohonan Anda Telah Selesai. Silahkan cek email anda untuk informasi lebih lanjut.';
        $notification->save();

        Mail::to($register->user->email)->send(new ProcessMail($register));
        return response()->json([
            'alert' => 'success',
            'message' => 'Terkonfirmasi',
        ]);
    }
}
