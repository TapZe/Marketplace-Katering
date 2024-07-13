<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Merchant\Invoice;
use Illuminate\Http\Request;

class CustomerInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'address' => ['required', 'string'],
            'contact' => ['required', 'numeric'],
            'delivery_date' => ['required', 'date'],
        ]);
        $userCart = auth()->user()->userProfile()->shopCart();
        $data = $request->all();

        $total_price = 0;
        foreach ($userCart as $item) {
            $total_price += $item->pivot->portion * $item->price;
        }
        $data['$total_price'] = $total_price;
        $created = Invoice::create($data);

        if ($created) {
            session()->flash('status', 'Berhasil membuat invoice!');
        }

        return redirect()->back(); //Change later
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
        $request->validate([
            'payment_time' => ['required', 'date'],
        ]);
        $updateData = Invoice::findOrFail($id);
        $updateData->update($request->all());

        if ($updateData) {
            session()->flash('status', 'Berhasil memperbaharui invoice!');
        }

        return redirect()->back(); //Change later
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $updateData = Invoice::findOrFail($id);
        $updateData->delete();

        if ($updateData) {
            session()->flash('status', 'Berhasil menghapus invoice!');
        }

        return redirect()->back(); //Change later
    }
}
