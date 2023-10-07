<?php

namespace App\Http\Controllers;

use App\Models\Coordinator;
use App\Models\Responsible;
use App\Models\Supporter;
use App\Models\Village;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function exportVoterList(Request $request)
    {
        return view('pages.export.index', [
            'responsibles' => Responsible::all(),
        ]);
    }

    public function exportedVoterList(Request $request)
    {
        $responsible_id = $request->get('responsible_id');

        $supporters = Supporter::query()->where('responsible_id', $responsible_id)->get();
        $responsible = Responsible::query()->where('id', $responsible_id)->first();

        $data = [
            'district'    => $responsible->coordinator->village->district->name,
            'village'     => $responsible->coordinator->village->name,
            'coordinator' => $responsible->coordinator,
            'responsible' => $responsible,
            'supporters'  => $supporters,
        ];

        return view('pages.export.voter-list', $data);
    }
}
