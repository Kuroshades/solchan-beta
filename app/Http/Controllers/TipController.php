<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\Tip;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // group tips by tipper_name and sum their amount and return the result sorted by descending amount
        $tips = Tip::selectRaw('tipper_name, sum(amount) as total_amount')
            ->groupBy('tipper_name')
            ->orderBy('total_amount', 'desc')
            ->paginate(10);
        $price = Price::orderBy('timestamp', 'desc')->first()->price;

        return Inertia::render('Tips/Index', [
            'tips' => $tips,
            'price' => $price,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
