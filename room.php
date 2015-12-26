<?php
$file = 'room-num.txt';
$content = file_get_contents($file);
$array = explode("\r\n", $content);
for ($i = 0; $i < count($array); $i++) {
    $room_num = $array[$i];
    $h3c_content = "system-view
vlan 150
vlan $room_num
interface Ethernet 1/0/1
port link-type trunk
port trunk permit vlan all
interface Ethernet 1/0/2
port link-type access
port access vlan $room_num
interface Ethernet 1/0/3
port link-type access
port access vlan $room_num";
    $room_txt = fopen("$room_num.txt", "w+");
    fwrite($room_txt, $h3c_content);
    fclose($room_txt);
}
?>