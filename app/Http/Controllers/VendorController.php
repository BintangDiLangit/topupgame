<?php

namespace App\Http\Controllers;

use App\Helpers\VendorHelper;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {

        $vendors = new VendorHelper();
        $vendors = $vendors->listVendor();
        return view('admin.vendor.index', compact('vendors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'sumber' => 'nullable|max:255'
        ]);

        $vendor = new VendorHelper();
        $vendor->storeData($request->all());
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'sumber' => 'nullable|max:255'
        ]);
        $vendor = new VendorHelper();
        $vendor->updateData($request->all(), $id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $vendor = new VendorHelper();
        $vendor->deleteData($id);
        return redirect()->back();
    }
}
