<?php

namespace App\Http\Controllers;

use App\Utils\DptUtils;
use Illuminate\Http\Request;
use App\Models\Coordinator;
use App\Models\Village;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class CoordinatorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.coordinator.index', [
            'coordinators' => Coordinator::all()
        ]);
    }

    public function create()
    {
        return view('pages.coordinator.create', [
            'villages' => Village::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|max:16|unique:coordinators',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8'
        ]);

        $dpt = DptUtils::find($request->get('nik'));

        if ($dpt != null) {
            $village = Village::query()->where('name', 'like', "%$dpt->kelurahan%")->first();

            $validatedData['name']       = $dpt->nama;
            $validatedData['address']    = $dpt->alamat;
            $validatedData['village_id'] = $village->id;
            $validatedData['password']   = Hash::make($validatedData['password']);

            Coordinator::create($validatedData);
            return redirect('/coordinator')->with('success', 'Data Koordinator Berhasil ditambahkan');
        } else {
            throw ValidationException::withMessages([
                'nik' => ['NIK tidak ditemukan'],
            ]);
        }
    }

    public function destroy(Coordinator $coordinator)
    {
        $coordinator->delete();
        return redirect('/coordinator')->with('success', 'Data Pendukung Berhasil dihapus');
    }

    public function edit(Coordinator $coordinator)
    {
        return view('pages.coordinator.edit',[
            'coordinator' => $coordinator,
            'villages' => Village::all()
        ]);
    }

    public function update(Request $request, Coordinator $coordinator)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'nik' => 'required|max:16',
            'email' => 'required|email',
            'address' => 'required',
            'village_id' => 'required',
        ]);

        Coordinator::where('id', $coordinator->id)
                    ->update($validatedData);

        return redirect('/coordinator')->with('success', 'Data Koordinator Berhasil diubah');
    }
}
