<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Village;
use App\Models\Coordinator;
use App\Models\Supporter;
use App\Models\District;

class VillageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.village.index', [
            'villages' => [
                'village' => Village::all(),
                'coor_count' => Coordinator::where('village_id', Village::select('id'))->count()
                ]
        ]);
    }

    public function create()
    {
        return view('pages.village.create', [
            'districts' => District::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:villages',
            'district_id' => 'required'
        ]);

        Village::create($validatedData);

        return redirect('/village')->with('success', 'Data Desa Berhasil ditambahkan');
    }

    public function destroy(Village $village)
    {
        $village->delete();
        return redirect('/village')->with('success', 'Data Pendukung Berhasil dihapus');
    }

    public function edit(Village $village)
    {
        return view('pages.village.edit', [
            'village' => $village,
            'districts' => District::all()
        ]);
    }

    public function update(Request $request, Village $village)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'district_id' => 'required'
        ]);

        Village::where('id', $village->id)
                ->update($validatedData);

        return redirect('/village')->with('success', 'Data Desa Berhasil diubah');
    }
}
