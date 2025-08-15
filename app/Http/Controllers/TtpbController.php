<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Location;
use App\Models\Ttpb;
use Illuminate\Http\Request;

class TtpbController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ttpbs = Ttpb::with('lines')->latest()->get();

        return view('ttpbs.index', compact('ttpbs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Item::all();
        $locations = Location::all();

        return view('ttpbs.create', compact('items', 'locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'number' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'from_location_id' => ['required', 'integer'],
            'to_location_id' => ['required', 'integer'],
            'notes' => ['nullable', 'string'],
        ]);

        $lines = $request->input('lines', []);

        $data['created_by'] = $request->user()->id ?? 1;
        $ttpb = Ttpb::create($data);

        foreach ($lines as $line) {
            if (empty($line['item_id']) || empty($line['qty_requested'])) {
                continue;
            }

            $ttpb->lines()->create([
                'item_id' => $line['item_id'],
                'lot_id' => $line['lot_id'] ?? null,
                'qty_requested' => $line['qty_requested'],
                'qty_actual' => $line['qty_actual'] ?? 0,
                'loss_qty' => $line['loss_qty'] ?? 0,
                'loss_percent' => $line['loss_percent'] ?? 0,
                'coly' => $line['coly'] ?? null,
                'spec' => $line['spec'] ?? null,
                'remarks' => $line['remarks'] ?? null,
            ]);
        }

        return redirect()->route('ttpbs.index');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
