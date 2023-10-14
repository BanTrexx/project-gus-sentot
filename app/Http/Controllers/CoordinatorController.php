<?php

namespace App\Http\Controllers;

use App\Http\Middleware\PermissionMiddleware;
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
        $this->middleware(PermissionMiddleware::class . ':edit')->only(['edit', 'update']);
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
            'nik'          => 'nullable|max:16',
            'village_id'   => 'required|exists:villages,id',
            'name'         => 'required|string',
            'address'      => 'nullable|string',
            'phone_number' => 'nullable|string',
        ]);

        Coordinator::create($validatedData);
        return redirect('/coordinator')->with('success', 'Data Koordinator Berhasil ditambahkan');
    }

    public function destroy(Coordinator $coordinator)
    {
        $coordinator->delete();
        return redirect('/coordinator')->with('success', 'Data Koordinator Berhasil dihapus');
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
            'name'         => 'required|max:255',
            'nik'          => 'nullable|max:16',
            'address'      => 'nullable',
            'village_id'   => 'required|exists:villages,id',
            'phone_number' => 'nullable|string',
        ]);

        Coordinator::where('id', $coordinator->id)->update($validatedData);
        return redirect('/coordinator')->with('success', 'Data Koordinator Berhasil diubah');
    }
}
