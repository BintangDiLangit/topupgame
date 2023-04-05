<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Admin\IklanCarouselHelper;
use App\Helpers\MasterKategoriHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IklanCarouselController extends Controller
{
    protected $carouselHelper;

    public function __construct()
    {
        $this->carouselHelper = new IklanCarouselHelper();
    }
    public function index()
    {
        $getAllData = $this->carouselHelper->listForAdmin();
        $masterKategoris = new MasterKategoriHelper();
        $masterKategoris = $masterKategoris->listMKAdmin();
        return view('admin.iklanweb.index', compact('getAllData','masterKategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'master_kategori_id' => 'required|numeric',
            'nama_iklan' => 'required|max:255',
            'link' => 'nullable|url',
            'image' => 'required|mimes:png,jpg,jpeg,gif',
            'status' => 'required|IN:1,0',
        ]);
        
        $iklanCarousel = new IklanCarouselHelper();
        $iklanCarousel->store($request->all());
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'master_kategori_id' => 'required|numeric',
            'nama_iklan' => 'required|max:255',
            'link' => 'nullable|url',
            'image' => 'nullable|mimes:png,jpg,jpeg,gif',
            'status' => 'required|IN:1,0',
        ]);
        $iklanCarousel = new IklanCarouselHelper();
        $iklanCarousel->update($request->all(), $id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        
    }
}
