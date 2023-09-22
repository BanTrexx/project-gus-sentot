<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoordinatorRegisterRequest;
use App\Models\Coordinator;
use App\Models\Village;
use App\Utils\DptUtils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class CoordinatorAuthController extends Controller
{
    public function login()
    {
        return view('auth.coordinator.login');
    }

    public function register()
    {
        return view('auth.coordinator.register');
    }

    public function loged(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/dashboard');
        }

        return redirect()->back();
    }

    public function registered(CoordinatorRegisterRequest $request)
    {
        $dpt = DptUtils::find($request->get('nik'));

        if ($dpt != null) {
            $village = Village::query()->where('name', 'like', "%$dpt->kelurahan%")->first();

            $validatedData = $request->validated();
            $validatedData['name']       = $dpt->nama;
            $validatedData['address']    = $dpt->alamat;
            $validatedData['village_id'] = $village->id;
            $validatedData['password']   = Hash::make($validatedData['password']);

            Coordinator::create($validatedData);
            return redirect('/coordinator/login')->with('success', 'Data Berhasil ditambahkan. Silakan login.');
        } else {
            throw ValidationException::withMessages([
                'nik' => ['NIK tidak ditemukan'],
            ]);
        }
    }
}