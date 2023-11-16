<?php 
 $conn=mysqli_connect("localhost","root","","test");
 require 'vendor/autoload.php';
if(isset($_POST['name']))
{
    $Name=$_POST['name'];
    $dob=$_POST['dob'];
    $ph_number=$_POST['ph_number'];
    $email=$_POST['e_mail'];
    $address=$_POST['address'];
    $date=date("Y/m/d");
    $sql="INSERT INTO `qr`(`name`, `dob`, `ph_no`, `e_mail`, `address`, `date`)
    VALUES ('$Name','$dob','$ph_number','$email','$address','$date')";
    $restul=mysqli_query($conn,$sql);
    if($restul)
    {
        echo "1";
    }
    else
    {
        echo "0";
    }
    // print_r($_POST);
}

if(isset($_POST['id']))
{
    $id=$_POST['id'];
    $sql="SELECT * FROM `qr` WHERE `id`='$id'";
    $result=mysqli_query($conn,$sql);
    foreach($result as $row)
    {
        $dataToEncode = $row['name'] . $row['dob'] . $row['ph_no'] . $row['e_mail'] . $row['address'];
        $googleChartApiUrl = 'https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=' . urlencode($dataToEncode);
        echo "<img src='" . $googleChartApiUrl . "'>";
        $qrCodeImage = file_get_contents($googleChartApiUrl);
        $QrpathImage='QrCodes/'.$row['name'].'.jpg';
        file_put_contents($QrpathImage, $qrCodeImage);


    }
}

if(isset($_POST['barcodeid']))
{
    $id=$_POST['barcodeid'];
    $sql="SELECT * FROM `qr` WHERE `id`='$id'";
    $result=mysqli_query($conn,$sql);
    foreach($result as $row)
    {
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        echo $generator->getBarcode($row['ph_no'],  $generator::TYPE_CODE_128);
        $generator = new Picqer\Barcode\BarcodeGeneratorJPG();
        file_put_contents('BarCodes/'.$row['name'].'.jpg', $generator->getBarcode($row['ph_no'], $generator::TYPE_CODABAR));

    }
}
?>