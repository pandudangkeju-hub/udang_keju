<?php
require_once 'Pendaftaran.php';

class PendaftaranReguler extends Pendaftaran {
    private $pilihan_prodi;
    private $lokasi_kampus;

    public function __construct($id, $nama, $sekolah, $nilai, $biaya_dasar, $prodi = null, $kampus = null) {
        parent::__construct($id, $nama, $sekolah, $nilai, $biaya_dasar);
        $this->pilihan_prodi = $prodi;
        $this->lokasi_kampus = $kampus;
    }

    // Tahap 4: Query Spesifik
    public static function getDaftarReguler($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Reguler'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Tahap 5: Overriding Hitung Total Biaya
    public function hitungTotalBiaya() {
        return $this->biaya_pendaftaran_dasar;
    }

    public function tampilkanInfoJalur() {
        return "Prodi: {$this->pilihan_prodi} | Kampus: {$this->lokasi_kampus}";
    }
}
?>