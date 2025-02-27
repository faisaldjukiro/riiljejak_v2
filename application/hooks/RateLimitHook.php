<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RateLimitHook {
    public function check() {
        $CI =& get_instance();
        
        if (!$CI) {
            log_message('error', '⛔ get_instance() mengembalikan null');
            return;
        }

        $CI->load->driver('cache', ['adapter' => 'file']);

        log_message('error', 'CACHE BERFUNGSI NORMAL');

        $config = $CI->config->item('rate_limit');
        if (!$config) {
            log_message('error', '⛔ Konfigurasi Rate Limit tidak ditemukan');
            return;
        }

        $ip_address = $CI->input->ip_address();
        if ($ip_address == "::1") { 
            $ip_address = "127.0.0.1";
        }

        $cache_key = 'rate_limit_' . $ip_address;
        $requests = json_decode($CI->cache->get($cache_key), true);

        $current_time = time();

        // Jika cache kosong atau timestamp lebih lama dari time_frame, reset counter
        if (!$requests || ($current_time - $requests['timestamp'] >= $config['time_frame'])) {
            $requests = [
                'count' => 1,
                'timestamp' => $current_time
            ];
        } else {
            // Jika masih dalam time_frame dan jumlah request melebihi batas
            if ($requests['count'] >= $config['max_requests']) {
                log_message('error', '🚨 RATE LIMIT AKTIF UNTUK IP: ' . $ip_address);
                header("HTTP/1.1 429 Too Many Requests");
                exit("Terlalu banyak request, coba lagi nanti.");
            }

            $requests['count']++;
        }

        // Simpan ulang ke cache dengan waktu simpan sesuai time_frame
        $CI->cache->save($cache_key, json_encode($requests), $config['time_frame']);

        log_message('error', '✅ Simpan Cache Rate Limit: IP: ' . $ip_address . ' | Hitungan: ' . $requests['count']);
    }
}