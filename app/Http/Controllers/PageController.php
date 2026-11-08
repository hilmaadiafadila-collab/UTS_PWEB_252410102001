<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private function dataTanaman(): array
    {
        return [
            ['nama' => 'Jahe', 'latin' => 'Zingiber officinale', 'kategori' => 'Rimpang',
             'manfaat' => 'Menghangatkan badan, meredakan mual dan masuk angin.', 'gambar' => 'jahe.jpg'],
            ['nama' => 'Kunyit', 'latin' => 'Curcuma longa', 'kategori' => 'Rimpang',
             'manfaat' => 'Membantu meredakan nyeri haid dan gangguan pencernaan.', 'gambar' => 'kunyit.jpg'],
            ['nama' => 'Temulawak', 'latin' => 'Curcuma zanthorrhiza', 'kategori' => 'Rimpang',
             'manfaat' => 'Menjaga kesehatan hati dan menambah nafsu makan.', 'gambar' => 'temulawak.jpg'],
            ['nama' => 'Kencur', 'latin' => 'Kaempferia galanga', 'kategori' => 'Rimpang',
             'manfaat' => 'Meredakan batuk dan pegal-pegal.', 'gambar' => 'kencur.jpg'],
            ['nama' => 'Lidah Buaya', 'latin' => 'Aloe vera', 'kategori' => 'Daun',
             'manfaat' => 'Menyejukkan luka bakar ringan dan melembapkan kulit.', 'gambar' => 'lidah-buaya.jpg'],
            ['nama' => 'Sirih', 'latin' => 'Piper betle', 'kategori' => 'Daun',
             'manfaat' => 'Antiseptik alami untuk kebersihan mulut dan luka kecil.', 'gambar' => 'sirih.jpg'],
            ['nama' => 'Kumis Kucing', 'latin' => 'Orthosiphon aristatus', 'kategori' => 'Daun',
             'manfaat' => 'Melancarkan buang air kecil.', 'gambar' => 'kumis-kucing.jpg'],
            ['nama' => 'Serai', 'latin' => 'Cymbopogon citratus', 'kategori' => 'Batang',
             'manfaat' => 'Menghangatkan badan dan mengurangi pegal.', 'gambar' => 'serai.jpg'],
        ];
    }

    public function login()
    {
        return view('login');
    }

    public function prosesLogin(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:30',
        ]);

        // redirect ke dashboard sambil membawa username di URL
        return redirect()->route('dashboard', ['username' => $validated['username']]);
    }

    public function dashboard(Request $request)
    {
        $tanaman = $this->dataTanaman();

        return view('dashboard', [
            'username'      => $request->query('username', 'Tamu'),
            'totalTanaman'  => count($tanaman),
            'totalKategori' => count(array_unique(array_column($tanaman, 'kategori'))),
            'pilihanTanaman' => [$tanaman[0], $tanaman[5], $tanaman[7]],
        ]);
    }

    public function profile(Request $request)
    {
        return view('profile', [
            'username' => $request->query('username', 'Tamu'),
        ]);
    }

    public function pengelolaan(Request $request)
    {
        $tanaman  = $this->dataTanaman();
        $kategori = $request->query('kategori');
        $cari     = trim($request->query('q', ''));

        if ($kategori) {
            $tanaman = array_filter($tanaman, fn ($t) => $t['kategori'] === $kategori);
        }

        if ($cari !== '') {
            $tanaman = array_filter($tanaman, fn ($t) =>
                str_contains(mb_strtolower($t['nama'] . ' ' . $t['latin']), mb_strtolower($cari))
            );
        }

        return view('pengelolaan', [
            'username'       => $request->query('username', 'Tamu'),
            'tanaman'        => $tanaman,
            'kategoriAktif'  => $kategori,
            'cari'           => $cari,
            'daftarKategori' => array_values(array_unique(array_column($this->dataTanaman(), 'kategori'))),
        ]);
    }
}