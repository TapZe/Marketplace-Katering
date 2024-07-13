<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merchant\MerchantMenu;
use Illuminate\Support\Facades\Storage;

class MerchantMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd("ini view menu penjual", MerchantMenu::where('user_profile_id', auth()->user()->userProfile()->id)->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        dd("ini view menambah menu penjual");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['string'],
            'foto' => ['image|mimes:jpeg,png,jpg,gif', 'max:10240'],
            'price' => ['required', 'numeric'],
            'menu_type_id' => ['required', 'numeric'],
        ]);

        $data = $request->all();
        $profile = auth()->user()->userProfile();
        $data['user_profile_id'] = $profile->id;

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $extension = $request->image->extension();
            $imageName = time() . "_" . Str::random(30) . '.' . $extension;
            $image->storeAs('public/' . $profile->name, $imageName);
            $data['foto'] = $profile->name . '/' . $imageName;
        }
        $addData = MerchantMenu::create($data);

        if ($addData) {
            session()->flash('status', 'success');
            session()->flash('message', 'Berhasil menambahkan menu!');
        }

        return redirect()->route('cart.index')->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd("ini view sebuah menu penjual", MerchantMenu::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editData = MerchantMenu::findOrFail($id);
        dd("ini view sebuah menu penjual", $editData);
        return view('merchant.menu.edit')->with($editData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['string'],
            'description' => ['string'],
            'foto' => ['image|mimes:jpeg,png,jpg,gif', 'max:10240'],
            'price' => ['numeric'],
            'menu_type_id' => ['numeric'],
        ]);

        $data = $request->all();
        $editData = MerchantMenu::findOrFail($id);
        $profile = auth()->user()->userProfile();

        if ($request->hasFile('foto')) {
            if ($editData->foto && Storage::exists('public/' . basename($editData->foto))) {
                Storage::delete('public/' . basename($editData->foto));
            }

            $image = $request->file('foto');
            $extension = $request->image->extension();
            $imageName = time() . "_" . Str::random(30) . '.' . $extension;
            $image->storeAs('public/' . $profile->name, $imageName);
            $data['foto'] = $profile->name. '/' . $imageName;
        }
        $editData->update($data);

        if ($editData) {
            session()->flash('status', 'success');
            session()->flash('message', 'Berhasil memodifikasi barang dari menu!');
        }

        return redirect()->route('cart.index')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteData = MerchantMenu::findOrFail($id);
        if ($deleteData->foto && Storage::exists('public/' . basename($deleteData->foto))) {
                Storage::delete('public/' . basename($deleteData->foto));
            }
        $deleteData->delete();

        if ($deleteData) {
            session()->flash('status', 'success');
            session()->flash('message', 'Berhasil menghapus barang dari menu!');
        }

        return redirect()->route('cart.index')->withInput();
    }
}
