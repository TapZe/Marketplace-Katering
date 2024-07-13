<?php

namespace App\Http\Controllers;

use App\Models\User\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
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
            'name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'contact'=> ['required', 'numeric'],
            'description'=> ['required', 'string'],
        ]);
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        $created = UserProfile::createOrRestore($data);

        if ($created) {
            session()->flash('status', 'Berhasil menambah data diri!');
        }
        return redirect()->route('userProfile.index');
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
        $updateData = UserProfile::findOrFail($id);
        $request->validate([
            'name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'contact'=> ['required', 'numeric'],
            'description'=> ['required', 'string'],
        ]);
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        $updateData->update($data);

        if ($updateData) {
            session()->flash('status', 'Berhasil mengubah data diri!');
        }
        return redirect()->route('userProfile.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
