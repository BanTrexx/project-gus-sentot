<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResponsibleRequest;
use App\Models\Coordinator;
use App\Models\Responsible;
use App\Models\Supporter;
use App\Utils\DptUtils;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ResponsibleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.responsible.index', [
            'responsibles' => Responsible::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.responsible.create', [
            'coordinators' => Coordinator::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ResponsibleRequest $request)
    {
        $dpt = DptUtils::find($request->get('nik'));

        if ($dpt != null) {
            $data = $request->validated();
            $data['name'] = $dpt->nama;
            $data['address'] = $dpt->alamat;
            Responsible::create($data);
            return redirect('/responsible')->with('success', 'Data Penanggung Jawab Berhasil ditambahkan');
        } else {
            throw ValidationException::withMessages([
                'nik' => ['Data DPT Tidak Di temukan'],
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Responsible $responsible)
    {
        return view('pages.responsible.edit', [
            'responsible' => $responsible,
            'coordinators' => Coordinator::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ResponsibleRequest $request, Responsible $responsible)
    {
        $responsible->update($request->validated());
        return redirect('/responsible')->with('success', 'Data Penanggung Jawab Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Responsible $responsible)
    {
        $responsible->delete();
        return redirect('/responsible')->with('success', 'Data Penanggung Jawab Berhasil dihapus');
    }
}
