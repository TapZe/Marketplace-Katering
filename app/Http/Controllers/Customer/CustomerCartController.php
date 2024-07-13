<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd("ini view cart pembeli");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        dd("ini view penambahan cart pembeli");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'merchant_menu_id' => ['required', 'numeric'],
        ]);
        $data = $request->all();
        $merchant_menu_id = $data[0]->merchant_menu_id;

        $userCart = auth()->user()->userProfile()->shopCart();
        $userCart->syncWithoutDetaching($merchant_menu_id);
        $portion = $userCart->where('merchant_menu_id', $merchant_menu_id)->first()->pivot->portion + 1;
        $userCart->updateExistingPivot($merchant_menu_id, ['portion' => $portion]);
        return redirect()->back();
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
        $merchant_menu_id = $id;
        $userCart = auth()->user()->userProfile()->shopCart();
        $portion = $userCart->where('merchant_menu_id', $merchant_menu_id)->first()->pivot->portion - 1;
        if ($portion <= 0) {
            $userCart->detach($merchant_menu_id);
        } else {
            $userCart->updateExistingPivot($merchant_menu_id, ['portion' => $portion]);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteCart = auth()->user()->userProfile()->shopCart();
        $deleteCart->detach();
        return redirect()->back();
    }
}
