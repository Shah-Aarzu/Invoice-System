<?php
include "dbconfig.php";

if (isset($_POST["submit"])) {
    $itemname = $_POST["itemname"];
    $hsncode = $_POST["hsncode"];
    $purchaserate = $_POST["purchaserate"];
    $salesrate = $_POST["salesrate"];
    if (strlen(trim($itemname)) == 0 || strlen($itemname) > 50 || strlen(trim($hsncode)) == 0 || strlen($hsncode) > 6 || strlen(trim($purchaserate)) == 0 || strlen(trim($salesrate)) == 0) {
        if (strlen(trim($itemname)) == 0 || strlen($itemname) > 50) {
            echo "<script>alert('Item Name Should Not More Than 50 Characters Or Equal To 0.')</script>";
        }
        if (strlen(trim($hsncode)) == 0 || strlen($hsncode) > 6) {
            echo "<script>alert('HSNCODE Should Not More Than 6 Characters Or Equal To 0.')</script>";

        }
        if (strlen(trim($purchaserate)) == 0) {
            echo "<script>alert('Purchase Rate Should Not Equal To 0.')</script>";
        }
        if (strlen(trim($salesrate)) == 0) {
            echo "<script>alert('Sales Rate Should Not Equal To 0.')</script>";
        }
        echo "<script>location = 'additem.php'</script>";
    } else {
        try {
            $hsncode = (int) $_POST["hsncode"];
            $purchaserate = (int) $_POST["purchaserate"];
            $salesrate = (int) $_POST["salesrate"];
            $sql = "INSERT INTO `22b112_itemmaster`(`ItemName`, `HSNCode`, `PurchaseRate`, `SalesRate`) VALUES ('$itemname','$hsncode','$purchaserate','$salesrate')";

            if (mysqli_query($con, $sql)) {
                echo "<script>alert('Data Inserted Successfully.')</script>";
                echo "<script>location = 'additem.php'</script>";
            } else {
                echo "<script>alert('Data Not Inserted.')</script>";
            }
        } catch (Exception $err) {
            echo "<script>alert('Server Error.')</script>";
        }

    }
}
?>