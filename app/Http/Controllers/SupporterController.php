<?php

namespace App\Http\Controllers;

use App\Http\Middleware\PermissionMiddleware;
use App\Http\Requests\SupporterRequest;
use App\Models\Coordinator;
use App\Models\Responsible;
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
        $this->middleware(PermissionMiddleware::class . ':edit')->only(['edit', 'update']);
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
            'responsibles' => Responsible::all()
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
        return redirect('/supporter')->with('success', 'Data Pendukung Berhasil dihapus');
    }

    public function edit(Supporter $supporter)
    {
        return view('pages.supporter.edit', [
            'supporter' => $supporter,
            'responsibles' => Responsible::all()
        ]);
    }

    public function update(SupporterRequest $request, Supporter $supporter)
    {
        $supporter->update($request->validated());
        return redirect('/supporter')->with('success', 'Data Pendukung Berhasil diubah');
    }
}
