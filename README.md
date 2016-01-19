# SanAndreasMap

Benutzung:

include("Map.php");
header('Content-type: image/jpeg');

$img = new Map();
$img->addMark(0, 0, "Test1");
$img->addMark(1509.2726,-886.6550, "Test2");
$img->addMark(-2065.1150, -83.5138, "Test3");
$img->addMark(1711.8240,-1894.1769, "Test4");

imagejpeg($img->getImage());
imagedestroy($img->getImage());


Christian Wolf
