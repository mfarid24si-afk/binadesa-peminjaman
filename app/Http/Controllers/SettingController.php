<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display the settings page.
     */
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->toArray();

        // Default values
        $defaults = [
            'nama_desa'              => 'Desa',
            'alamat_balai'           => '',
            'nomor_kontak'           => '',
            'batas_maksimal_hari'    => '7',
            'biaya_sewa_per_hari'    => '0',
        ];

        foreach ($defaults as $key => $default) {
            if (!isset($settings[$key])) {
                $settings[$key] = $default;
            }
        }

        return view('pages.settings', compact('settings'));
    }

    /**
     * Update settings.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'nama_desa'           => 'required|string|max:255',
            'alamat_balai'        => 'nullable|string|max:500',
            'nomor_kontak'        => 'nullable|string|max:20',
            'batas_maksimal_hari' => 'required|integer|min:1|max:365',
            'biaya_sewa_per_hari' => 'required|numeric|min:0',
        ]);

        foreach ($validated as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'description' => $this->getDescription($key)]
            );
        }

        return redirect()->route('settings.index')
            ->with('success', 'Pengaturan berhasil disimpan.');
    }

    /**
     * Get human-readable description for each setting key.
     */
    private function getDescription(string $key): string
    {
        return match ($key) {
            'nama_desa'           => 'Nama desa untuk ditampilkan di sistem',
            'alamat_balai'        => 'Alamat lengkap balai/kantor desa',
            'nomor_kontak'        => 'Nomor telepon yang bisa dihubungi',
            'batas_maksimal_hari' => 'Batas maksimal hari peminjaman fasilitas',
            'biaya_sewa_per_hari' => 'Biaya sewa per hari (dalam Rupiah)',
            default               => '',
        };
    }
}
