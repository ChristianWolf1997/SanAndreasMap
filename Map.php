<?php

class Map
{
    private $img = null;
    private $color = null;

    private $font = "fonts/arial.ttf";

    private $height = 620; //Image Size
    private $width = 620; //Image Size

    public function __construct() {
        $this->prepare();

    }

    public function getImage()
    {
        return $this->img;
    }

    private function prepare() {
        $this->img = imagecreatefromjpeg("images/sa_map.jpg");
        $this->color = imagecolorallocate($this->img, 255,255,255);
    }

    public function addMark($x, $y, $text) {
        $calc = $this->convertCoordinates($x, $y);
        imagettftext($this->img, 7, 0, $calc['x'], $calc['y'], $this->color, $this->font, $text);
    }


    private function convertCoordinates($coordX, $coordY)
    {
        $height = 3000;
        $width = 3000;


        $zeroX = $width / 2;
        $zeroY = $height / 2;

        if ($coordX > 0)
            $coordX = $width - ($zeroX - (($coordX) * 0.5));
        else
            $coordX = $zeroX - (-1.0 * ($coordX) * 0.5);

        if ($coordY > 0)
            $coordY = $zeroY - (($coordY) * 0.5);
        else
            $coordY = $height - ($zeroY - (-1.0 * ($coordY) * 0.5));


        $coordX = $coordX / ($width / $this->width);
        $coordY = $coordY / ($height / $this->height);

        return array("x" => $coordX, "y" => $coordY);
    }
}
