<?php 
class Produk {
    public $jmlMochi;
    public $jmlCilok;
    public $hargaMochi;
    public $hargaCilok;
    public $totalSeluruh;
    public $totalHargaMochi;
    public $totalHargaCilok;

    function __construct() {
        $this->hargaMochi = 2000;
        $this->hargaCilok = 3000;
    }
}

class Jumlah extends Produk {
    public function getJumlah($jmlMochi, $jmlCilok) {
        $this->jmlMochi = $jmlMochi;
        $this->jmlCilok = $jmlCilok;
    }

    public function setHarga() {
        $this->totalHargaMochi = $this->hargaMochi * $this->jmlMochi;
        $this->totalHargaCilok = $this->hargaCilok * $this->jmlCilok;
        $this->totalSeluruh = $this->totalHargaMochi + $this->totalHargaCilok;
    }

    public function cetakStruk() {
        echo "******* <b> STRUK PEMBELANJAAN </b> *******";
        echo "<br><br>";
        echo "Cilok : $this->jmlCilok porsi x Rp. $this->hargaCilok : <b>$this->totalHargaCilok</b>";
        echo "<br>";
        echo "Mochi : $this->jmlMochi porsi x Rp. $this->hargaMochi : <b>$this->totalHargaMochi</b>";
        echo "<br><br>";
        echo "Total bayar : Rp. <b>$this->totalSeluruh</b>";
        echo "<br><br>";
        echo "****************************************";
        
    }
}