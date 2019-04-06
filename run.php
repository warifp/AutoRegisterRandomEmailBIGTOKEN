<?php
/** 
    AUTHOR : WAHYU ARIF P
    CREATE : 06 APRIL 2019 15.30
    UPDATE : 06 APRIL 2019 22.30
**/
echo "## AUTO REGISTER WITH RANDOM EMAIL [GENERATOR.EMAIL] ##\n";
echo "JANGAN LUPA DONASI\n";
echo "OVO : 087719090011\n\n";

echo "Refferal \t: ";
$reff = trim(fgets(STDIN));

echo "Jumlah \t\t: ";
$jumlah = trim(fgets(STDIN));

echo "Delay \t\t: ";
$delay = trim(fgets(STDIN));

echo "Save \t\t: ";
$save = trim(fgets(STDIN));

for ($x=1; $x<=$jumlah; $x++){

    $randMail  = ['1', '2','3','4', '5', '6', '7','8'];
    $randMail1 = mt_rand(0, count($randMail) - 4);
    $randMail2 = mt_rand(0, count($randMail) - 3);
    $randMail3 = mt_rand(0, count($randMail) - 6);
    $randNomor = $randMail1.$randMail2.$randMail3;

    /** Domain Email **/
    $randMail  = ['@todayemail.ga', '@mendoanmail.club','@leks.me','@indomovie21.me', '@imouto.pro'];
    $Mail = mt_rand(0, count($randMail) - 1);
    /** echo $randMail[$Mail];**/

    $randNamaDepan  = ['Daniel','Hafid','Isni','Fajar','Rizka','Roofig','Cahyo','Fahri','Adzka','Muh','Novan','Abi','Ani','Adi','Nurul','Widya','Tika','Luna','Maya','Dewi','Atta','Joko','Narno','Mila','Dela'];
    $NamaDepan = mt_rand(0, count($randNamaDepan) - 1);
    /** echo $randNamaDepan[$NamaDepan]; **/

    $randNamaTengah  = ['Daniel','Hafid','Isni','Fajar','Rizka','Roofig','Cahyo','Fahri','Adzka','Muh','Novan','Abi','Ani','Adi','Nurul','Widya','Tika','Luna','Maya','Dewi','Atta','Joko','Narno','Mila','Dela'];
    $NamaTengah = mt_rand(0, count($randNamaTengah) - 6);
    /** echo $randNamaTengah[$NamaTengah]; **/

    $randNamaBelakang  = ['Daniel','Hafid','Isni','Fajar','Rizka','Roofig','Cahyo','Fahri','Adzka','Muh','Novan','Abi','Ani','Adi','Nurul','Widya','Tika','Luna','Maya','Dewi','Atta','Joko','Narno','Mila','Dela'];
    $NamaBelakang = mt_rand(0, count($randNamaBelakang) - 9);

    $email = $randNamaDepan[$NamaDepan].$randNamaTengah[$NamaTengah].$randNamaBelakang[$NamaBelakang].$randNomor.$randMail[$Mail];

    $post = "email=$email&password=%40Aq123456&referral_id=$reff&monetize=1";
    $arr = array("\r"," ");
    $headers = array();
    $headers[] = "content-type: application/x-www-form-urlencoded";
    $headers[] = "Accept-Encoding: gzip";
    $headers[] = "Host: api.bigtoken.com";
    $headers[] = "user-agent: Redmi 5A_7.1.2_1.0.6";
    $headers[] = "accept: application/json";
    $url = "https://api.bigtoken.com/signup";
    $h = explode("\n",str_replace($headers,"",""));

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    $obj = json_encode($result);
    echo "\e[1;92m$x. Register Email => $email\e[0m\n";
    $file = fopen($save,"a+");
    fwrite($file,$email."\n");
    fclose($file);
    print_r($obj);
    echo "\n";
    sleep($delay);
    curl_close($ch); 
}
?>