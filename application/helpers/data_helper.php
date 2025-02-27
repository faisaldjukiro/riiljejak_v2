<?php
if (!function_exists('tanggal_indo')) {
    function tanggal_indo($tanggal, $jam = '')
    {
        if ($tanggal !== null) { // Pastikan $tanggal tidak null
            $hari = array(
                'Minggu',
                'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat',
                'Sabtu'
            );

            $bulan = array(
                1 => 'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );

            $tanggal_terpecah = explode('-', $tanggal);
            if (count($tanggal_terpecah) == 3) {
                $tahun = $tanggal_terpecah[0];
                $bulan_angka = (int)$tanggal_terpecah[1];
                $tanggal_hari = $tanggal_terpecah[2];

                $tanggal_unix = strtotime($tanggal);
                $hari_indonesia = $hari[date('w', $tanggal_unix)];

                $tanggal_format = $hari_indonesia . ', ' . $tanggal_hari . ' ' . $bulan[$bulan_angka] . ' ' . $tahun;
                
                if ($jam !== '') {
                    $tanggal_format .= ' | ' . $jam . ' WIB';
                }

                return $tanggal_format;
            } else {
                return '';
            }
        } else {
            return '';
        }
    }
}

?>