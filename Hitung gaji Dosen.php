<?php
    class HitungGaji
    {
        private $GajiAwal;
        public function __construct() {
            $this->GajiAwal = 1500000;
        }

        public function SetGajiAwal($GajiAwal)
        {
            $this->GajiAwal = $GajiAwal;
        }

        public function GetGajiAwal()
        {
            return $this->GajiAwal;
        }

    }

    class Dosen extends HitungGaji
    {
        private $GajiTambahanD;
        private $SKS;

        public function SetGajiTambahanDosen($GajiTambahanDosen)
        {
            $this->GajiTambahanD = $GajiTambahanDosen;
        }
        public function SetSKS($SKS)
        {
            $this->SKS= $SKS;
        }

        public function GajiDosen()
        {
            return $this->GetGajiAwal() + $this->GajiTambahanD * $this->SKS;
        }
    }

    class Staff extends HitungGaji
    {
        private $GajiTambahanS;
        private $jmlKHDR;

        public function SetGajiTambahanStaff($GajiTambahanDosen)
        {
            $this->GajiTambahanS = $GajiTambahanDosen;
        }
        public function SetJmlKHDR($jmlKHDR)
        {
            $this->jmlKHDR= $jmlKHDR;
        }

        public function GajiStaff()
        {
            return $this->GetGajiAwal() + $this->GajiTambahanS * $this->jmlKHDR;
        }
    }


    $Gaji = new HitungGaji();
    $Dosen = new Dosen();
    $Staff = new Staff();

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Gaji</title>
    </head>
    <body>
        <header>
            <h1>Hitung Gaji Pegawai</h1>
        </header>
        <form action="index.php" method="post"><br><br>
            <h2>Dosen</h2>
            <label for="namaD">Nama Dosen : </label>
            <input type="text" name="namaD" id="namaD"><br>
            <label for="GajiDosen">Gaji Tambahan : </label>
            <input type="number" name="BanyakGajiD" id="GajiDosen"><br>
            <label for="SKS">SKS Yang Diampuh</label>
            <input type="number" name="SKS" id="SKS">
            <br><br>
            <h2>Staff</h2>
            <label for="namaS">Nama Staff : </label>
            <input type="text" name="namaS" id="namaS"><br>
            <label for="GajiStaff">Gaji Tambahan : </label>
            <input type="number" name="BanyakGajiS" id="GajiStaff"><br>
            <label for="jml">Jumlah Kehadiran : </label>
            <input type="number" name="jml" id="jml"><br>
            <input type="submit" name="submit">
        </form>
        <br><br>
        
    </body>
    </html>

    <?php

    if (isset($_POST['submit'])) {
        echo "Nama Dosen : ".$_POST['namaD'];
        $Dosen->SetGajiTambahanDosen($_POST['BanyakGajiD']);
        $Dosen->SetSKS($_POST['SKS']);
        echo "<br>Gaji awal dosen : ".$Gaji->GetGajiAwal();
        echo "<br>Gaji Dosen : ".$Dosen->GajiDosen();
        echo "<br><br>";

        echo "Nama Staff : ".$_POST['namaS'];
        $Staff->SetGajiTambahanStaff($_POST['BanyakGajiS']);
        $Staff->SetJmlKHDR($_POST['jml']);
        echo "<br>Gaji awal Staff : ".$Gaji->GetGajiAwal();
        echo "<br>Gaji Staff : ".$Staff->GajiStaff();
        echo "<br><br>";
    }
