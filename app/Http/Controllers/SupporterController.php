<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupporterRequest;
use App\Models\Coordinator;
use App\Models\Supporter;
use App\Utils\DptUtils;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SupporterController extends Controller
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
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('pages.supporter.index', [
            'supporters' => Supporter::all()
        ]);
    }

    public function create(): Renderable
    {
        return view('pages.supporter.create', [
            'coordinators' => Coordinator::all()
        ]);
    }

    public function store(SupporterRequest $request)
    {
        $dpt = DptUtils::find($request->get('nik'));

        if ($dpt != null) {
            $tps = sprintf("%s, %s, Kecamatan %s", $dpt->tps, $dpt->kelurahan, $dpt->kecamatan);
            $data = $request->validated();
            $data['dpt_tps'] = $tps;
            $data['name'] = $dpt->nama;
            Supporter::create($data);
            return redirect('/supporter')->with('success', 'Data Pendukung Berhasil ditambahkan');
        } else {
            throw ValidationException::withMessages([
                'nik' => ['Data DPT Tidak Di temukan'],
            ]);
        }

    }

    public function destroy(Supporter $supporter)
    {
        $supporter->delete();
        return redirect('/supporter')->with('success', 'Data Pendukung Berhasil dihapus');
    }

    public function edit(Supporter $supporter)
    {
        return view('pages.supporter.edit', [
            'supporter' => $supporter,
            'coordinators' => Coordinator::all()
        ]);
    }

    public function update(SupporterRequest $request, Supporter $supporter)
    {
        $supporter->update($request->validated());
        return redirect('/supporter')->with('success', 'Data Pendukung Berhasil diubah');
    }
}
