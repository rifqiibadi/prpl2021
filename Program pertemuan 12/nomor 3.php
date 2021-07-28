<?php
interface Shape{
    public function rumus();
}
class PersegiPanjang implements Shape{
    private $panjang;
    private $lebar;

    public function rumus(){
        return "Bangun Ruang:Luas Persegi Panjang"."<br>Panjang:".$this->panjang."<br>Lebar:".$this->lebar ."<br>Volume Kubus:" . $this->panjang * $this->lebar;
    }
}

class Bola implements Shape{
    private $jarijari;
    public function rumus(){
        return "Bangun Ruang:Volume Bola"."<br>jarijaribola:".$this->jarijari."<br>Volume Bola:" . 4/3 * (pi() * $this->jarijari * $this->jarijari * $this->jarijari );
    }
}

class Kerucut implements Shape{
    private $jarijari;
    private $tinggi;

    public function rumus(){
        return "Bangun Ruang:Volume Kerucut"."<br>jarijarikerucut:". $this->jarijari ."<br>tinggikerucut:" . $this->tinggi."<br>Volume Kerucut:" . 1/3 * (pi() * $this->jarijari * $this->jarijari * $this->tinggi );
    }
}

class Kubus implements Shape{
    private $sisi = 12;

    public function rumus()
    {
        return "Bangun Ruang:Volume Kubus"."<br>Panjang sisi:".$this->sisi."<br>Volume Kubus:".$this->sisi * $this->sisi * $this->sisi . " m2 ";
    }
}

class Lingkaran implements Shape{
    private $jarijari;
    public function rumus(){
        return "Bangun Ruang:Keliling Lingkaran"."<br>jarijarilingkaran:".$this->jarijari."<br>Keliling Lingkaran:" . 2 * (pi() * $this->jarijari);
    }
}

class KalkulatorBangunRuangFactory
{
    public function initializePayment($type)
    {
        if ($type === 'Luas Persegi Panjang') {
            return new PersegiPanjang();
        }
        if ($type == 'Volume Bola') {
            return new Bola();
        }
        if ($type === 'Volume Kerucut') {
            return new Kerucut();
        }
         if ($type === 'Volume Kubus') {
            return new Kubus(12);
        }
          if ($type === 'Keliling Lingkaran') {
            return new Lingkaran();
        }

        throw new Exception("Unsupported payment method");
    }
}

$pilihanKalkulatorBangunRuang = 'Volume Kubus';
$KalkulatorBangunRuangFactory = new KalkulatorBangunRuangFactory();
$hasilKalkulatorBangunRuang = $KalkulatorBangunRuangFactory->initializePayment($pilihanKalkulatorBangunRuang);
print_r($hasilKalkulatorBangunRuang->rumus());

?>