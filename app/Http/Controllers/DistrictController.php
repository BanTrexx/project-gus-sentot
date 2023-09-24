<?php

namespace App\Http\Controllers;

use App\Http\Middleware\PermissionMiddleware;
use Illuminate\Http\Request;
use App\Models\District;

class DistrictController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(PermissionMiddleware::class . ':edit')->only('edit');
        $this->middleware(PermissionMiddleware::class . ':edit')->only('update');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.district.index', [
            'districts' => District::all()
        ]);
    }

    public function create()
    {
        return view('pages.district.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:districts'
        ]);

        District::create($validatedData);

        return redirect('/district')->with('success', 'Data Kecamatan Berhasil ditambahkan');
    }

    public function destroy(District $district)
    {
        $district->delete();
        return redirect('/district')->with('success', 'Data Pendukung Berhasil dihapus');
    }

    public function edit(District $district)
    {
        return view('pages.district.edit', [
            'district' => $district
        ]);
    }

    public function update(Request $request, District $district)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255'
        ]);

        District::where('id', $district->id)
                ->update($validatedData);

        return redirect('/district')->with('success', 'Data Kecamatan Berhasil diubah');
    }
}
