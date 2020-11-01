<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{

    public function index()
    {
        $units = Unit::selection();
        return view('dashboard.unit.index', compact('units'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $unit = Unit::create([
            'unit' => $request->unit ,
            'status'=>1
        ]);
        return response()->json(
            [
                'ajax_status' => true,
                'message' => ' تمت عملية الاضافة بنجاح',
                'unit' => $unit->unit,
                'id' => $unit->id ,
                'status'=>$unit->status
            ]);
    }

    public function show(Unit $unit)
    {
        return view('dashboard.unit.show', compact('unit'));
    }

    public function edit(Unit $unit)
    {
    }

    public function update(Request $request, Unit $unit)
    {
        $unit->update([
            'unit' => $request->unitEdit
        ]);
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();
        return redirect()->route('dashboard.unit.index');

    }

    public function updateUnitStatus($id)
    {
        $unit = Unit::find($id);

        if (\Illuminate\Support\Facades\Request::ajax()) {
            if (\request()->status == "1") {
                $unit->update(['status' => "1"]);
            } else
                {
                    $unit->update(['status' => "0"]);
                }
        }

    }

}
