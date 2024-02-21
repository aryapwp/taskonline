<?php
class TrafficLight {
    private $colors = ['merah', 'kuning', 'hijau'];
    private $index = 0;

    public function getCurrentColor() {
        $currentColor = $this->colors[$this->index];
        $this->index = ($this->index + 1) % count($this->colors);
        return $currentColor;
    }
}

// Membuat objek TrafficLight
$trafficLight = new TrafficLight();

// Menggunakan objek untuk mendapatkan nilai secara berurutan
echo $trafficLight->getCurrentColor() . PHP_EOL;  // Output: merah
echo $trafficLight->getCurrentColor() . PHP_EOL;  // Output: kuning
echo $trafficLight->getCurrentColor() . PHP_EOL;  // Output: hijau
echo $trafficLight->getCurrentColor() . PHP_EOL;  // Output: merah

?>