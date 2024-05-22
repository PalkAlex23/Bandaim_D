<?php

    class Adatbazis {
        private $host = "localhost";
        private $felhasznalonev = "root";
        private $jelszo = "";
        private $adatbazis = "bandaim";
        private $kapcsolat;

        public function __construct()
        {
            $this -> kapcsolat = new mysqli(
                $this -> host,
                $this -> felhasznalonev,
                $this -> jelszo,
                $this -> adatbazis
            );
            $this->kapcsolat->query("SET NAMES UTF8");

            // Teszt a sikeres kapcsolódásról:

            /*$siker = 0;
            if ($this->kapcsolat->connect_errno) {
                $siker = "Nem sikerült a kapcsolat";
            } else {
                $siker = "Sikeres kapcsolódás!";
            }
            echo $siker;*/

        }

        public function adatBeszurOrszag($orszagAzon, $nev) {
            $sql = "INSERT INTO orszag (orszagAzon, nev) VALUES ('$orszagAzon', '$nev')";
            return $this->kapcsolat->query($sql);
        }

        public function adatLeker($tabla, $oszlop1, $oszlop2, $oszlop3) {
            $sql = "SELECT $oszlop1, $oszlop2, $oszlop3 FROM $tabla";
            return $this->kapcsolat->query($sql);
        }

        public function adatMegjelenit($matrix) {
            while ($sor = $matrix->fetch_row()) {
                echo "<div class=\"elem\">
                    <h2>AB dolgozat</h2>
                    <b>Azonosító száma: $sor[0]</b>
                    <p>Banda tagszáma: $sor[1]</p>
                    <p>Banda neve: $sor[2]</p>
                </div>";
            }
            echo "<table>";
        }

        public function adatTorol($tabla, $hol, $mit) {
            $sql = "DELETE FROM $tabla WHERE $hol = $mit";
            return $this->kapcsolat->query($sql);
        }

        public function kapcsolatBezar() {
            $this->kapcsolat->close();
        }
    }

?>