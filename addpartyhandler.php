<?php
include("dbconfig.php");
if (isset($_POST["save"])) {
    $name = $_POST["name"];
    $address = $_POST["address"];
    $gstin = $_POST["gstin"];
    $phoneno = $_POST["phoneno"];
    $email = $_POST["email"];
    if (strlen(trim($name)) == 0 || strlen($name) > 50 || strlen(trim($address)) == 0 || strlen($address) > 250 || strlen(trim($gstin)) == 0 || strlen($gstin) > 15 || strlen(trim($phoneno)) == 0 || strlen($phoneno) > 10 || strlen(trim($email)) == 0 || strlen($email) > 25) {
        if (strlen(trim($name)) == 0 || strlen($name) > 50) {
            echo "<script>alert('Name Should Not More Than 50 Characters Or Equal To 0.')</script>";
        }
        if (strlen(trim($address)) == 0 || strlen($address) > 250) {
            echo "<script>alert('Address Should Not More Than 250 Characters Or Equal To 0.')</script>";

        }
        if (strlen(trim($gstin)) == 0 || strlen($gstin) > 15) {
            echo "<script>alert('GSTIN Should Not More Than 15 Characters Or Equal To 0.')</script>";
        }
        if (strlen(trim($phoneno)) == 0 || strlen($phoneno) > 10) {
            echo "<script>alert('Phone No Should Not More Than 10 Digits Or Equal To 0.')</script>";
        }
        if (strlen(trim($email)) == 0 || strlen($email) > 25) {
            echo "<script>alert('Email Should Not More Than 25 Characters Or Equal To 0.')</script>";
        }
    } else {
        try {
            $phoneno = (int) $_POST["phoneno"];
            $sql = "INSERT INTO 22b112_partymaster (PartyName, Address, GSTIN   , PhoneNo, EmailId) VALUES ('$name','$address','$gstin',$phoneno,'$email')";
            if (mysqli_query($con, $sql)) {
                echo "<script>alert('Data Inserted Successfully.')</script>";
            } else {
                echo "<script>alert('Data Not Inserted.')</script>";
            }
        } catch (Exception $err) {
            echo "<script>alert('Server Error.')</script>";
        }

    }
    echo "<script>location = 'addparty.php'</script>";
}
?>