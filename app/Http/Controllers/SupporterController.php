<?php

namespace App\Http\Controllers;

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
        return view('pages.supporter.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:districts'
        ]);

        Supporter::create($validatedData);

        return redirect('/supporter')->with('success', 'Data Pendukung Berhasil ditambahkan');
    }

    public function destroy(Supporter $supporter)
    {
        // delete data here
    }

    public function edit(Supporter $supporter)
    {
        return view('pages.supporter.edit', [
            'supporter' => $supporter
        ]);
    }

    public function update(Request $request, Supporter $supporter)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255'
        ]);

        Supporter::where('id', $supporter->id)
            ->update($validatedData);

        return redirect('/supporter')->with('success', 'Data Pendukung Berhasil diubah');
    }
}
