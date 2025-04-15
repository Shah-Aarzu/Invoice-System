<?php
include "dbconfig.php";

if (isset($_POST["selectedpurchaseinvoice"])) {
    if ($_POST["purchaseid"] == "Select Invoice No")
        header("location:selectpurchaseinvoice.php");
    else {
        try {
            $sql = "SELECT * FROM 22b112_purchasemaster INNER JOIN 22b112_purchasedetails ON 22b112_purchasemaster.PurchaseId = 22b112_purchasedetails.PurchaseId INNER JOIN 22b112_partymaster ON 22b112_purchasemaster.PartyId = 22b112_partymaster.Id WHERE 22b112_purchasemaster.PurchaseId = '$_POST[purchaseid]'";
            $data = mysqli_query($con, $sql);
            $row = mysqli_fetch_row($data);
        } catch (Exception $err) {
            echo "<script>alert('Server Error.')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="d-flex overflow-hidden" style="max-height:100vh;max-width:100vw">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;height:100vh">
            <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <span class="fs-4">Sidebar</span>
            </div>
            <hr>
            <ul class="nav nav-pills flex-column gap-1 mb-auto">
                <li class="nav-item">
                    <a href="/" class="nav-link">
                        Home
                    </a>
                </li>
                <li class="menu">
                    <a class="nav-link bg">
                        Party
                    </a>
                    <ul class="subMenu">
                        <li>
                            <a href="addparty.php" class="nav-link bg">
                                Add Party
                            </a>
                        </li>
                        <li>
                            <a href="selectparty.php" class="nav-link bg">
                                Update Party
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu">
                    <a class="nav-link bg">
                        Item
                    </a>
                    <ul class="subMenu">
                        <li>
                            <a href="additem.php" class="nav-link bg">
                                Add Item
                            </a>
                        </li>
                        <li>
                            <a href="selectitem.php" class="nav-link bg">
                                Update Item
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu">
                    <a class="nav-link active bg">
                        Purchase
                    </a>
                    <ul class="subMenu">
                        <li>
                            <a href="addpurchase.php" class="nav-link bg">
                                Add Purchase
                            </a>
                        </li>
                        <li>
                            <a href="selectpurchaseinvoice.php" class="nav-link active bg">
                                View Purchase Details
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu">
                    <a class="nav-link bg">
                        Sales
                    </a>
                    <ul class="subMenu">
                        <li>
                            <a href="addsales.php" class="nav-link bg">
                                Add Sales
                            </a>
                        </li>
                        <li>
                            <a href="selectsalesinvoice.php" class="nav-link bg">
                                View Sales Details
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="nav-link bg">
                        Print
                    </a>
                </li>
            </ul>
        </div>
        <div class="overflow-auto" style="height:100vh;width:100vw">
            <?php include("header.php") ?>
            <section class="m-auto my-5" style="width:50vw">
                <table class="table table-bordered border border-black">
                    <tbody>
                        <tr>
                            <td colspan="3">
                                <p>Invoice No : <?php echo $row[1] ?></p>
                            </td>
                            <td colspan="3">
                                <P>Invoice Date : <?php echo $row[2] ?></P>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div>
                                    <h6 class="text-uppercase fw-bold"><?php echo $row[15] ?></h6>
                                </div>
                                <div><?php echo $row[16] ?></div>
                                <div><?php echo $row[17] ?></div>
                                <div><?php echo $row[18] ?></div>
                                <div><?php echo $row[19] ?></div>
                            </td>
                            <td colspan="3">
                                <div>
                                    <h6 class="text-uppercase fw-bold">Shah Aarzu Mustafa</h6>
                                </div>
                                <div>House No 186, Royal Park, Kim, Char
                                    Rasta, Surat ,Gujarat - 394110</div>
                                <div>GSTIN</div>
                                <div>95587 59699</div>
                                <div>aarzumustafa4@gmail.com</div>
                            </td>
                        </tr>
                        <tr>
                            <td>Srno</td>
                            <td>Description</td>
                            <td>HSNCODE</td>
                            <td>Qty</td>
                            <td>Purchase Rate </td>
                            <td>Amount </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><?php echo $row[10] ?></td>
                            <td>8482</td>
                            <td><?php echo $row[5] ?></td>
                            <td><?php echo $row[12] ?></td>
                            <td><?php echo $row[13] ?></td>
                        </tr>
                        <tr>
                            <td colspan="4" rowspan="3">REMARKS : ----------------------------</td>
                            <td>Total Amount</td>
                            <td><?php echo $row[4] ?></td>
                        </tr>
                        <tr>
                            <td>SGST @ 9%</td>
                            <td><?php echo $row[6] ?></td>
                        </tr>
                        <tr>
                            <td>CGST @9%</td>
                            <td><?php echo $row[7] ?></td>
                        </tr>
                        <tr>
                            <td colspan="4">Amount in words:</td>
                            <td>Grand Total</td>
                            <td><?php echo $row[8] ?></td>
                        </tr>
                        <tr>
                            <td colspan="6"></td>
                        </tr>
                    </tbody>
                </table>
            </section>
            <?php include("footer.php") ?>
        </div>
    </div>
</body>

</html>