<?php
include("dbconfig.php");
print_r($_POST);
if (isset($_POST["save"])) {
    $invoiceno = $_POST["invoiceno"];
    $invoicedate = $_POST["invoicedate"];
    $partyid = $_POST["partyid"];
    $itemname = $_POST["itemname"];
    $totalqty = $_POST["totalqty"];
    $purchaserate = $_POST["purchaserate"];
    $totalamount = $_POST["totalamount"];
    $totalsgst = $_POST["totalsgst"];
    $totalcgst = $_POST["totalcgst"];
    $grandtotal = $_POST["grandtotal"];
    if (strlen(trim($invoiceno)) == 0 || strlen($invoiceno) > 15 || strlen(trim($itemname)) == 0 || strlen($itemname) > 50) {
        if (strlen(trim($invoiceno)) == 0 || strlen($invoiceno) > 15) {
            echo "<script>alert('Invoice No Should Not More Than 15 Characters Or Equal To 0.')</script>";
        }
        if (strlen(trim($itemname)) == 0 || strlen($itemname) > 50) {
            echo "<script>alert('Item Name Should Not More Than 50 Characters Or Equal To 0.')</script>";

        }
    } else {
        try {
            $sql1 = "INSERT INTO `22b112_purchasemaster`(`InvoiceNo`, `InvoiceDate`, `PartyId`, `TotalAmount`, `TotalQty`, `TotalSGST`, `TotalCGST`, `GrandTotal`) VALUES ('$invoiceno','$invoicedate','$partyid','$totalamount','$totalqty','$totalsgst','$totalcgst','$grandtotal')";
            mysqli_query($con, $sql1);
            $inserted_id = mysqli_insert_id($con);
            $sql2 = "INSERT INTO `22b112_purchasedetails`(`PurchaseId`, `ItemName`, `TotalQty`, `PurchaseRate`, `Amount`) VALUES ('$inserted_id','$itemname','$totalqty','$purchaserate','$totalamount')";
            if (mysqli_query($con, $sql2)) {
                echo "<script>alert('Data Inserted Successfully.')</script>";
            } else {
                echo "<script>alert('Data Not Inserted.')</script>";
            }
        } catch (Exception $err) {
            echo "<script>alert('Server Error.')</script>";
        }

    }
    echo "<script>location = 'addpurchase.php'</script>";
}
?>