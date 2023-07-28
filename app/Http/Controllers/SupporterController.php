<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupporterRequest;
use App\Models\Coordinator;
use App\Models\Supporter;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.supporter.index', [
            'supporters' => Supporter::all()
        ]);
    }

    public function create()
    {
        return view('pages.supporter.create', [
            'coordinators' => Coordinator::all()
        ]);
    }

    public function store(SupporterRequest $request)
    {
        Supporter::create($request->validated());
        return redirect('/supporter')->with('success', 'Data Pendukung Berhasil ditambahkan');
    }

    public function destroy(Supporter $supporter)
    {
        $supporter->delete();
        return redirect('/supporter')->with('success', 'Data Pendukung Berhasil diubah');
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
