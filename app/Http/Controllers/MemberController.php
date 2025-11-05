<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Setting;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Milon\Barcode\Facades\DNS2DFacade as DNS2D;
// use Barryvdh\DomPDF\Facade\Pdf;
// atau untuk versi lama:
// use PDF;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('member.index');
    }

    public function data()
    {
        $member = Member::orderBy('kode_member')->get();

        return datatables()
            ->of($member)
            ->addIndexColumn()
            ->addColumn('select_all', function ($produk) {
                return '
                    <input type="checkbox" name="id_member[]" value="'. $produk->id_member .'">
                ';
            })
            ->addColumn('kode_member', function ($member) {
                return '<span class="label label-success">'. $member->kode_member .'<span>';
            })
            ->addColumn('aksi', function ($member) {
                return '
                <div class="btn-group">
                    <button type="button" onclick="editForm(`'. route('member.update', $member->id_member) .'`)" class="btn btn-success btn-sm me-3" style="padding: 6px 15px; font-size: 18px; border-radius: 4px; box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;"><i class="fa fa-pencil"></i></button>


                    <button type="button" onclick="deleteData(`'. route('member.destroy', $member->id_member) .'`, `'. $member->nama .'`)" class="btn btn-danger btn-sm me-3" style="padding: 6px 15px; font-size: 18px; border-radius: 4px; box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi', 'select_all', 'kode_member'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $member = Member::latest()->first() ?? new Member();
        $kode_member = (int) $member->kode_member +1;

        $member = new Member();
        $member->kode_member = tambah_nol_didepan($kode_member, 5);
        $member->nama = $request->nama;
        $member->telepon = $request->telepon;
        $member->alamat = $request->alamat;
        $member->save();

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);

        return response()->json($member);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $member = Member::find($id)->update($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();

        return response(null, 204);
    }

    public function deleteSelected(Request $request)
    {
        foreach ($request->id_member as $id) {
            $member = Member::find($id);
            $member->delete();
        }

        return response(null, 204);
    }
   

    public function cetakMember(Request $request)
    {
        $datamember = [];

        foreach ($request->id_member as $id) {
            $member = Member::find($id);
            if (!$member) {
                return "Member dengan id $id tidak ditemukan";
            }
            $datamember[] = $member;
        }

        $setting = Setting::first();

        // Ambil path absolut untuk gambar
        $setting->path_kartu_member = public_path($setting->path_kartu_member);

        // Buat PDF
        $pdf = Pdf::loadView('member.cetak', compact('datamember', 'setting'))
            ->setPaper('a4', 'portrait');

        // Izinkan DomPDF akses ke file lokal
        $pdf->getDomPDF()->set_option('isRemoteEnabled', true);

        return $pdf->download('kartu_member.pdf');
    }

}
