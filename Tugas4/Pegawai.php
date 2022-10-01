
<?php

class Pegawai
{
    protected $nip;
    protected $nama;
    protected $jabatan;
    protected $agama;
    protected $status;
    protected $gapok;
    protected $tunjab;
    protected $tunkel;
    protected $zakat;
    protected $gajibersih;
    public function __construct($nip, $nama, $jabatan, $agama, $status)
    {
        $this->nip = $nip;
        $this->nama = $nama;
        $this->jabatan = $jabatan;
        $this->agama = $agama;
        $this->status = $status;
        $this->setGajiPokok();
        $this->setTunjab();
        $this->setTunkel();
        $this->setZakatProfesi();
        $this->setGajiBersih();
    }
    private function setGajiPokok()
    {
        switch ($this->jabatan) {
            case 'Manager':
                $this->gapok = 15000000;
                break;
            case 'Asmen':
                $this->gapok = 10000000;
                break;
            case 'Kabag':
                $this->gapok = 7000000;
                break;
            default:
                $this->gapok = 4000000;
                break;
        }
    }
    private function setTunjab()
    {
        $this->tunjab = $this->gapok * 0.2;
    }
    private function setTunkel()
    {
        $this->tunkel = ($this->status == 'Menikah') ? $this->gapok * 0.1 : 0;
    }
    private function setZakatProfesi()
    {
        $this->zakat = ($this->agama == 'Islam' && $this->gapok >= 6000000) ? $this->gapok * 0.025 : 0;
    }
    private function setGajiBersih()
    {
        $this->gajibersih = $this->gapok + $this->tunjab + $this->tunkel - $this->zakat;
    }
    public function mencetak()
    {
        echo '<br/>-------------------------------------------';
        echo '<br/>NIP: ' . $this->nip;
        echo '<br/>Nama: ' . $this->nama;
        echo '<br/>Jabatan: ' . $this->jabatan;
        echo '<br/>Agama: ' . $this->agama;
        echo '<br/>Status: ' . $this->status;
        echo '<br/>Gapok: Rp' . number_format($this->gapok);
        echo '<br/>Tunjab: Rp' . number_format($this->tunjab);
        echo '<br/>Tunkel: Rp' . number_format($this->tunkel);
        echo '<br/>Zakat Profesi: -Rp' . number_format($this->zakat);
        echo '<br/><b>Gaji Bersih: Rp' . number_format($this->gajibersih) . '</b>';
        echo '<br/>-------------------------------------------';
    }
}
