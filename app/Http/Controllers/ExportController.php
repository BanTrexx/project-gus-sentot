<?php

namespace App\Http\Controllers;

use App\Models\Coordinator;
use App\Models\Supporter;
use App\Models\Village;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function exportVoterList(Request $request)
    {
        return view('pages.export.index', [
            'coordinators' => Coordinator::all(),
        ]);
    }

    public function exportedVoterList(Request $request)
    {
        $coordinator_id = $request->get('coordinator_id');

        $supporters = Supporter::query()->where('coordinator_id', $coordinator_id)->get();
        $coordinator = Coordinator::query()->where('id', $coordinator_id)->first();

        $data = [
            'district'    => $coordinator->village->district->name,
            'village'     => $coordinator->village->name,
            'coordinator' => $coordinator,
            'supporters'  => $supporters,
        ];

        return view('pages.export.voter-list', $data);
    }
}
