<?php
session_start();
error_reporting(0);
include('includes1/config.php');
if(strlen($_SESSION['alogin'])==0)
  {
header('location:index.php');
}
else{
  ?>
<!DOCTYPE>
        <html>
           <head>
              <title>Sumbungan Interactive Map</title>
              <link rel = "stylesheet" href = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
           </head>
<body>

<h1>ILIGAN CITY MAP</h1>

<a href="profile.php">HOME</a>
<img src="MP.png" usemap="#image-map" height="800px" width="1200px">

<map name="image-map">
     <area target="" alt="ROGONGON" title="ROGONGON" href="ROGONGON.php" coords="884,231,14" shape="circle">
    <area target="" alt="PANOROGONAN" title="PANOROGONAN" href="PANOROGONAN.php" coords="853,502,8" shape="circle">
    <area target="" alt="DULAG" title="DULAG" href="DULAG.php" coords="598,344,9" shape="circle">
    <area target="" alt="LANIPAO" title="LANIPAO" href="LANIPAO.php" coords="535,267,6" shape="circle">
    <area target="" alt="MANDULOG" title="MANDULOG" href="MANDULOG.php" coords="453,235,9" shape="circle">
    <area target="" alt="HINDANG" title="HINDANG" href="HINDANG.php" coords="550,74,13" shape="circle">
    <area target="" alt="MAINIT" title="MAINIT" href="barangays/MAINIT.php" coords="622,107,14" shape="circle">
    <area target="" alt="DIGKILA-AN" title="DIGKILA-AN" href="barangays/DIGKILA-AN.php" coords="512,168,14" shape="circle">
    <area target="" alt="BUNAWAN" title="BUNAWAN" href="barangays/BUNAWAN.php" coords="438,57,14" shape="circle">
    <area target="" alt="KABACSANAN" title="KABACSANAN" href="barangays/KABACSANAN.php" coords="466,128,12" shape="circle">
    <area target="" alt="BONBONON" title="BONBONON" href="barangays/BONBONON.php" coords="406,170,12" shape="circle">
    <area target="" alt="KIWALAN" title="KIWALAN" href="barangays/KIWALAN.php" coords="367,109,11" shape="circle">
    <area target="" alt="DALIPUGA" title="DALIPUGA" href="barangays/DALIPUGA.php" coords="325,65,16" shape="circle">
    <area target="" alt="ACMAC" title="ACMAC" href="barangays/ACMAC.php" coords="315,156,10" shape="circle">
    <area target="" alt="STA. FILOMENA" title="STA. FILOMENA" href="barangays/STA. FILOMENA.php" coords="302,178,7" shape="circle">
    <area target="" alt="HINAPLANON" title="HINAPLANON" href="barangays/HINAPLANON.php" coords="316,207,11" shape="circle">
    <area target="" alt="UPPER HINAPLANON" title="UPPER HINAPLANON" href="barangays/UPPER HINAPLANON.php" coords="343,198,10" shape="circle">
    <area target="" alt="STO. ROSARIO" title="STO. ROSARIO" href="barangays/STO. ROSARIO.php" coords="293,220,12" shape="circle">
    <area target="" alt="LUINAB" title="LUINAB" href="barangays/LUINAB.php" coords="346,240,12" shape="circle">
    <area target="" alt="BAGONG SILANG" title="BAGONG SILANG" href="barangays/BAGONG SILANG.php" coords="346,239,24" shape="circle">
    <area target="" alt="DEL CARMEN" title="DEL CARMEN" href="barangays/DEL CARMEN.php" coords="325,262,9" shape="circle">
    <area target="" alt="SAN MIGUEL" title="SAN MIGUEL" href="barangays/SAN MIGUEL.php" coords="294,254,9" shape="circle">
    <area target="" alt="SANTIAGO" title="SANTIAGO" href="barangays/SANTIAGO.php" coords="253,220,10" shape="circle">
    <area target="" alt="TIBANGA" title="TIBANGA" href="barangays/TIBANGA.php" coords="237,240,9" shape="circle">
    <area target="" alt="SARAY" title="SARAY" href="barangays/SARAY.php" coords="223,254,8" shape="circle">
    <area target="" alt="VILLIAVERDE" title="VILLIAVERDE" href="barangays/VILLIAVERDE.php" coords="268,263,7" shape="circle">
    <area target="" alt="POBLACION" title="POBLACION" href="barangays/POBLACION.php" coords="240,269,7" shape="circle">
    <area target="" alt="TAMBACAN" title="TAMBACAN" href="barangays/TAMBACAN.php" coords="216,297,11" shape="circle">
    <area target="" alt="MAHAYAHAY" title="MAHAYAHAY" href="barangays/MAHAYAHAY.php" coords="259,277,7" shape="circle">
    <area target="" alt="UBALDO LAYA" title="UBALDO LAYA" href="barangays/UBALDO LAYA.php" coords="311,299,17" shape="circle">
    <area target="" alt="PUGAAN" title="PUGAAN" href="barangays/PUGAAN.php" coords="361,266,11" shape="circle">
    <area target="" alt="TUBOD" title="TUBOD" href="barangays/TUBOD.php" coords="246,301,11" shape="circle">
    <area target="" alt="TOMAS CABILI" title="TOMAS CABILI" href="barangays/TOMAS CABILI.php" coords="225,319,10" shape="circle">
    <area target="" alt="TIPANOY" title="TIPANOY" href="barangays/TIPANOY.php" coords="317,338,12" shape="circle">
    <area target="" alt="SUAREZ" title="SUAREZ" href="barangays/SUAREZ.php" coords="168,334,12" shape="circle">
    <area target="" alt="SANTA ELENA" title="SANTA ELENA" href="barangays/SANTA ELENA.php" coords="225,360,10" shape="circle">
    <area target="" alt="ABUNO" title="ABUNO" href="barangays/ABUNO.php" coords="276,384,12" shape="circle">
    <area target="" alt="MARIA CHRISTINA" title="MARIA CHRISTINA" href="barangays/MARIA CHRISTINA.php" coords="133,361,12" shape="circle">
    <area target="" alt="UPPER TOMINOBO" title="UPPER TOMINOBO" href="barangays/UPPER TOMINOBO.php" coords="208,428,11" shape="circle">
    <area target="" alt="DITUCALAN" title="DITUCALAN" href="barangays/DITUCALAN.php" coords="110,411,11" shape="circle">
    <area target="" alt="BURU-UN" title="BURU-UN" href="barangays/BURU-UN.php" coords="76,373,13" shape="circle">
    <area target="" alt="PALAO" title="PALAO" href="barangays/PALAO.php" coords="282,270,10" shape="circle">
    <area target="" alt="SAN ROQUE" title="SAN ROQUE" href="barangays/SAN ROQUE.php" coords="328,178,11" shape="circle">
    <area target="" alt="KALILANGAN" title="KALILANGAN" href="barangays/KALILANGAN.php" coords="651,435,11" shape="circle">
</map>
    
           
</body>
           
        </html>
        <<?php } ?>