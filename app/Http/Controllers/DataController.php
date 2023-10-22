<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    // public function index()
    // {
    //     $data_pengguna = Data::all();
    //     return view('hasil', ['data_pengguna' => $data_pengguna]);
    // }
    public function index()
    {
        $data_pengguna = Data::whereIn('class', [2, 1])->orderBy('class', 'desc')->get();

        return view('hasil', ['data_pengguna' => $data_pengguna]);
    }

    public function index2()
    {
        $data_pengguna = Data::whereIn('class', [2, 1])->orderBy('class', 'desc')->get();

        return view('hasiladmin', ['data_pengguna' => $data_pengguna]);
    }

    public function create()
    {
        return view('data_pengguna.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'asal' => 'required',
            'jurusan' => 'required',
            'nilai1' => 'required||min:0|max:100',
            'nilai2' => 'required|string|min:0|max:100',
            'nilai3' => 'required|string|min:0|max:100',
            'nilai4' => 'required|string|min:0|max:100',
            'nilai5' => 'required|string|min:0|max:100',
            'nilai6' => 'required|string|min:0|max:100',
            'nilai7' => 'required|string|min:0|max:100',
            'nilai8' => 'required|string|min:0|max:100',
            'nilai9' => 'required|string|min:0|max:100',
            'nilai10' => 'required|string|min:0|max:100',
            'bidang' => 'required|min:1',
            'cita' => 'required',
            'univ' => 'required',
            'prodi1' => 'required',
            // 'prodi2' => 'required',
        ]);

        Data::create([
            'nama' => $request->nama,
            'asal' => $request->asal,
            'jurusan' => $request->jurusan,
            'nilai1' => $request->nilai1,
            'nilai2' => $request->nilai2,
            'nilai3' => $request->nilai3,
            'nilai4' => $request->nilai4,
            'nilai5' => $request->nilai5,
            'nilai6' => $request->nilai6,
            'nilai7' => $request->nilai7,
            'nilai8' => $request->nilai8,
            'nilai9' => $request->nilai9,
            'nilai10' => $request->nilai10,
            'bidang' => implode(',', $request->bidang),
            'cita' => $request->cita,
            'univ' => $request->univ,
            'prodi1' => $request->prodi1,
            // 'prodi2' => $request->prodi2,
        ]);

        $maxIterasi = 10;
        $iterasi = 0;

        // Melakukan pengulangan untuk setiap iterasi
        while ($iterasi < $maxIterasi) {
            // Membandingkan jumlah anggota pada setiap cluster sebelumnya
            $temp1 = DB::table('cluster')->where('id', 1)->value('jumlah_anggota');
            $temp2 = DB::table('cluster')->where('id', 2)->value('jumlah_anggota');

            // Mengambil data pada tabel data
            $data = DB::table('data')->get();

            // Melakukan perulangan untuk setiap data
            foreach ($data as $d) {
                $nilai1 = $d->nilai1;
                $nilai2 = $d->nilai2;
                $nilai3 = $d->nilai3;
                $nilai4 = $d->nilai4;
                $nilai5 = $d->nilai5;
                $nilai6 = $d->nilai6;
                $nilai7 = $d->nilai7;
                $nilai8 = $d->nilai8;
                $nilai9 = $d->nilai9;
                $nilai10 = $d->nilai10;

                // Menghitung jarak antara data dengan setiap cluster
                $center1id1 = DB::table('cluster')->where('id', 1)->value('center1');
                $center2id1 = DB::table('cluster')->where('id', 1)->value('center2');
                $center3id1 = DB::table('cluster')->where('id', 1)->value('center3');
                $center4id1 = DB::table('cluster')->where('id', 1)->value('center4');
                $center5id1 = DB::table('cluster')->where('id', 1)->value('center5');
                $center6id1 = DB::table('cluster')->where('id', 1)->value('center6');
                $center7id1 = DB::table('cluster')->where('id', 1)->value('center7');
                $center8id1 = DB::table('cluster')->where('id', 1)->value('center8');
                $center9id1 = DB::table('cluster')->where('id', 1)->value('center9');
                $center10id1 = DB::table('cluster')->where('id', 1)->value('center10');

                $jarak1 = sqrt(pow(($nilai1 - $center1id1), 2) + pow(($nilai2 - $center2id1), 2) + pow(($nilai3 - $center3id1), 2) + pow(($nilai4 - $center4id1), 2) + pow(($nilai5 - $center5id1), 2) + pow(($nilai6 - $center6id1), 2) + pow(($nilai7 - $center7id1), 2) + pow(($nilai8 - $center8id1), 2) + pow(($nilai9 - $center9id1), 2) + pow(($nilai10 - $center10id1), 2));

                $center1id2 = DB::table('cluster')->where('id', 2)->value('center1');
                $center2id2 = DB::table('cluster')->where('id', 2)->value('center2');
                $center3id2 = DB::table('cluster')->where('id', 2)->value('center3');
                $center4id2 = DB::table('cluster')->where('id', 2)->value('center4');
                $center5id2 = DB::table('cluster')->where('id', 2)->value('center5');
                $center6id2 = DB::table('cluster')->where('id', 2)->value('center6');
                $center7id2 = DB::table('cluster')->where('id', 2)->value('center7');
                $center8id2 = DB::table('cluster')->where('id', 2)->value('center8');
                $center9id2 = DB::table('cluster')->where('id', 2)->value('center9');
                $center10id2 = DB::table('cluster')->where('id', 2)->value('center10');

                $jarak2 = sqrt(pow(($nilai1 - $center1id2), 2) + pow(($nilai2 - $center2id2), 2) + pow(($nilai3 - $center3id2), 2) + pow(($nilai4 - $center4id2), 2) + pow(($nilai5 - $center5id2), 2) + pow(($nilai6 - $center6id2), 2) + pow(($nilai7 - $center7id2), 2) + pow(($nilai8 - $center8id2), 2) + pow(($nilai9 - $center9id2), 2) + pow(($nilai10 - $center10id2), 2));

                // Menentukan cluster yang terdekat dengan data
                if ($jarak1 <= $jarak2) {
                    $out = 1;
                } else {
                    $out = 2;
                }

                // Menyimpan hasil clustering pada tabel data
                DB::table('data')->where('id', $d->id)->update(['c1' => $jarak1, 'c2' => $jarak2, 'Class' => $out]);

                // Menambah jumlah anggota pada cluster yang terpilih
                DB::table('cluster')->where('id', $out)->increment('jumlah_anggota');
            }
            // Menghitung rata-rata untuk setiap kolom pada setiap cluster
            $mean1 = DB::table('data')->where('Class', 1)->avg('nilai1');
            $mean2 = DB::table('data')->where('Class', 1)->avg('nilai2');
            $mean3 = DB::table('data')->where('Class', 1)->avg('nilai3');
            $mean4 = DB::table('data')->where('Class', 1)->avg('nilai4');
            $mean5 = DB::table('data')->where('Class', 1)->avg('nilai5');
            $mean6 = DB::table('data')->where('Class', 1)->avg('nilai6');
            $mean7 = DB::table('data')->where('Class', 1)->avg('nilai7');
            $mean8 = DB::table('data')->where('Class', 1)->avg('nilai8');
            $mean9 = DB::table('data')->where('Class', 1)->avg('nilai9');
            $mean10 = DB::table('data')->where('Class', 1)->avg('nilai10');

            DB::table('cluster')->where('id', 1)->update(['center1' => $mean1, 'center2' => $mean2, 'center3' => $mean3, 'center4' => $mean4, 'center5' => $mean5, 'center6' => $mean6, 'center7' => $mean7, 'center8' => $mean8, 'center9' => $mean9, 'center10' => $mean10]);
            // Menghitung rata-rata untuk setiap kolom pada setiap cluster
            $mean11 = DB::table('data')->where('Class', 2)->avg('nilai1');
            $mean12 = DB::table('data')->where('Class', 2)->avg('nilai2');
            $mean13 = DB::table('data')->where('Class', 2)->avg('nilai3');
            $mean14 = DB::table('data')->where('Class', 2)->avg('nilai4');
            $mean15 = DB::table('data')->where('Class', 2)->avg('nilai5');
            $mean16 = DB::table('data')->where('Class', 2)->avg('nilai6');
            $mean17 = DB::table('data')->where('Class', 2)->avg('nilai7');
            $mean18 = DB::table('data')->where('Class', 2)->avg('nilai8');
            $mean19 = DB::table('data')->where('Class', 2)->avg('nilai9');
            $mean20 = DB::table('data')->where('Class', 2)->avg('nilai10');
            // Mengupdate nilai tengah pada setiap cluster dengan rata-rata terbaru
            DB::table('cluster')->where('id', 2)->update(['center1' => $mean11, 'center2' => $mean12, 'center3' => $mean13, 'center4' => $mean14, 'center5' => $mean15, 'center6' => $mean16, 'center7' => $mean17, 'center8' => $mean18, 'center9' => $mean19, 'center10' => $mean20]);

            // Memeriksa apakah jumlah anggota pada setiap cluster telah stabil
            if ($temp1 == DB::table('cluster')->where('id', 1)->value('jumlah_anggota') && $temp2 == DB::table('cluster')->where('id', 2)->value('jumlah_anggota')) {
                break;
            }

            // Menaikkan jumlah iterasi
            $iterasi++;
        }

        return redirect('/hasil')->with('success', 'Data berhasil disimpan!');
    }

    public function show($data_pengguna)
    {
        $result = Data::find($data_pengguna);

        $hasil = $result->Class;

        if ($hasil == 2) {
            $status = 'Lulus';
            $color = 'green';
        } else {
            $status = 'Belum Lulus';
            $color = 'red';
        }

        return view('show', ['data_pengguna' => $result, 'status' => $status, 'color' => $color]);
    }

    public function edit($id)
    {
        $data_pengguna = Data::find($id);

        return view('edit_data_pengguna', compact('data_pengguna'));
    }

    public function update(Request $request, $id)
    {
        $pengguna = Data::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'asal' => 'required',
            'jurusan' => 'required',
            'nilai1' => 'required|text|min:0|max:100',
            'nilai2' => 'required|text|min:0|max:100',
            'nilai3' => 'required|text|min:0|max:100',
            'nilai4' => 'required|text|min:0|max:100',
            'nilai5' => 'required|text|min:0|max:100',
            'nilai6' => 'required|text|min:0|max:100',
            'nilai7' => 'required|text|min:0|max:100',
            'nilai8' => 'required|text|min:0|max:100',
            'nilai9' => 'required|text|min:0|max:100',
            'nilai10' => 'required|text|min:0|max:100',
            'bidang' => 'required|string|min:1',
            'cita' => 'required',
            'univ' => 'required',
            'prodi1' => 'required',
            // 'prodi2' => 'required',
        ]);
        $data_pengguna = Data::find($id);
        $data_pengguna->nama = $request->nama;
        $data_pengguna->asal = $request->asal;
        $data_pengguna->jurusan = $request->jurusan;
        $data_pengguna->nilai1 = $request->nilai1;
        $data_pengguna->nilai2 = $request->nilai2;
        $data_pengguna->nilai3 = $request->nilai3;
        $data_pengguna->nilai4 = $request->nilai4;
        $data_pengguna->nilai5 = $request->nilai5;
        $data_pengguna->nilai6 = $request->nilai6;
        $data_pengguna->nilai7 = $request->nilai7;
        $data_pengguna->nilai8 = $request->nilai8;
        $data_pengguna->nilai9 = $request->nilai9;
        $data_pengguna->nilai10 = $request->nilai10;
        $data_pengguna->bidang = implode(',', $request->bidang);
        $data_pengguna->cita = $request->cita;
        $data_pengguna->univ = $request->univ;
        $data_pengguna->prodi1 = $request->prodi1;
        // $data_pengguna->prodi2 = $request->prodi2;
        $data_pengguna->save();

        return redirect()->back()->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $data_pengguna = Data::find($id);

        if (! $data_pengguna) {
            return redirect()->back()->with('error', 'Data tidak ditemukan!');
        }

        $data_pengguna->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }

    public function showUser()
    {
        $email = auth()->user()->email; // Mendapatkan email pengguna yang sedang login
        $user = User::where('email', $email)->first(); // Mengambil data pengguna berdasarkan email

        return view('profil', ['user' => $user]);
    }

    public function showUser2()
    {
        $email = auth()->user()->email; // Mendapatkan email pengguna yang sedang login
        $user = User::where('email', $email)->first(); // Mengambil data pengguna berdasarkan email

        return view('profiladmin', ['user' => $user]);
    }
}
