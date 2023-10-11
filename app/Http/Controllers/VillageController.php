<?php

namespace App\Http\Controllers;

use App\Http\Middleware\PermissionMiddleware;
use Illuminate\Http\Request;
use App\Models\Village;
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
        $this->middleware(PermissionMiddleware::class . ':edit')->only(['edit', 'update']);
    }

    /**
     * Show the application dashboard.
     *
//     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.village.index', [
            'villages' => Village::query()->chunkMap(function ($data) {
//                $responsibleCount = $data->coordinators()->chunkMap(function ($coordinator) {
//                    return $coordinator->responsibles()->count();
//                })->toArray();

                $supporterCountArray = $data->coordinators()->chunkMap(function ($coordinator) {
                    return $coordinator->responsibles()->chunkMap(function ($responsible) {
                        return $responsible->supporters->count();
                    });
                })->toArray();

                $supporterCount = call_user_func_array("array_merge", $supporterCountArray);

                $data->coordinator_count = $data->coordinators()->count();
//                $data->responsible_count = array_sum($responsibleCount);
                $data->supporter_count = array_sum($supporterCount);
                return $data;
            })
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
