<?php
require_once 'Pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    private $sk_ikatan_dinas;
    private $instansi_sponsor;

    public function __construct($id, $nama, $sekolah, $nilai, $biaya_dasar, $sk = null, $sponsor = null) {
        parent::__construct($id, $nama, $sekolah, $nilai, $biaya_dasar);
        $this->sk_ikatan_dinas = $sk;
        $this->instansi_sponsor = $sponsor;
    }

    // Tahap 4: Query Spesifik
    public static function getDaftarKedinasan($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Kedinasan'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Tahap 5: Overriding dengan Surcharge 25%
    public function hitungTotalBiaya() {
        return $this->biaya_pendaftaran_dasar * 1.25;
    }

    public function tampilkanInfoJalur() {
        return "Instansi: {$this->instansi_sponsor} | SK: {$this->sk_ikatan_dinas}";
    }
}
?>