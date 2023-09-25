<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoordinatorRegisterRequest;
use App\Models\Coordinator;
use App\Models\Village;
use App\Providers\RouteServiceProvider;
use App\Utils\DptUtils;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Auth\LoginController as DefaultLoginController;

class CoordinatorAuthController extends Controller
{
    public function register()
    {
        return view('auth.coordinator.register');
    }

    public function registered(CoordinatorRegisterRequest $request)
    {
        $dpt = DptUtils::find($request->get('nik'));

        if ($dpt != null) {
            DB::beginTransaction();

            $village = Village::query()->where('name', 'like', "%$dpt->kelurahan%")->first();

            $validatedData = $request->validated();
            $validatedData['name']       = $dpt->nama;
            $validatedData['address']    = $dpt->alamat;
            $validatedData['village_id'] = $village->id;
            $validatedData['password']   = Hash::make($validatedData['password']);

            Coordinator::create($validatedData)->assignRole(['coordinator']);

            DB::commit();
            return redirect('/coordinator/login')->with('success', 'Data Berhasil ditambahkan. Silakan login.');
        } else {
            DB::rollBack();
            throw ValidationException::withMessages([
                'nik' => ['NIK tidak ditemukan'],
            ]);
        }
    }
}
