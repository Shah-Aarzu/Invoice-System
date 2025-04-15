<?php
include("dbconfig.php");

try {
    $sql = "SELECT Id , PartyName FROM 22b112_partymaster";
    $data = mysqli_query($con, $sql);
} catch (Exception $err) {
    echo "<script>alert('Server Error.')</script>";
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
                    <a class="nav-link bg">
                        Purchase
                    </a>
                    <ul class="subMenu">
                        <li>
                            <a href="addpurchase.php" class="nav-link bg">
                                Add Purchase
                            </a>
                        </li>
                        <li>
                            <a href="selectpurchaseinvoice.php" class="nav-link bg">
                                View Purchase Details
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu">
                    <a class="nav-link active bg">
                        Sales
                    </a>
                    <ul class="subMenu">
                        <li>
                            <a href="addsales.php" class="nav-link active bg">
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
            <div class="d-flex justify-content-center">
                <form action="addsaleshandler.php" method="post" class="shadow my-5 p-5 rounded" style="width:70vw">
                    <h3 class="text-center">SALES DETAILS</h3>
                    <div class="row">
                        <div class="mb-3 col-4">
                            <div class="mb-1"><label for="invoiceno">Invoice No</label></div>
                            <div><input type="text" Id="invoiceno" name="invoiceno" class="p-2 w-100" required></div>
                        </div>
                        <div class="mb-3 col-4">
                            <div class="mb-1"><label for="invoicedate">Invoice Date</label></div>
                            <div><input type="date" Id="invoicedate" name="invoicedate" class="p-2 w-100" required>
                            </div>
                        </div>
                        <div class="mb-3 col-4">
                            <div class="mb-1"><label for="partyname">Party Name</label></div>
                            <div>
                                <select class="p-2 w-100" name="partyid" id="partyname" required>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($data)) {
                                        echo "<option value='$row[Id]'>$row[PartyName]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 col-4">
                            <div class="mb-1"><label for="itemname">Item Name</label></div>
                            <div><input type="text" id="itemname" name="itemname" class="p-2 w-100" required></div>
                        </div>
                        <div class="mb-3 col-4">
                            <div class="mb-1"><label for="totalqty">Total Qty</label></div>
                            <div><input type="number" id="totalqty" name="totalqty" class="p-2 w-100"
                                    onchange="onchangeHandler(event)" required></div>
                        </div>
                        <div class="mb-3 col-4">
                            <div class="mb-1"><label for="purchaserate">Sales Rate</label></div>
                            <div><input type="number" id="salesrate" name="salesrate" class="p-2 w-100"
                                    onchange="onchangeHandler(event)" required>
                            </div>
                        </div>
                        <div class="mb-3 col-4">
                            <div class="mb-1"><label for="totalamount">Total Amount</label></div>
                            <div><input type="number" id="totalamount" name="totalamount" class="p-2 w-100" required
                                    readonly></div>
                        </div>
                        <div class="mb-3 col-4">
                            <div class="mb-1"><label for="totalsgst">Total SGST</label></div>
                            <div><input type="number" Id="totalsgst" name="totalsgst" class="p-2 w-100" required
                                    readonly></div>
                        </div>
                        <div class="mb-3 col-4">
                            <div class="mb-1"><label for="totalcgst">Total CGST</label></div>
                            <div><input type="number" Id="totalcgst" name="totalcgst" class="p-2 w-100" required
                                    readonly></div>
                        </div>
                        <div class="mb-3 col-4">
                            <div class="mb-1"><label for="grandtotal">Grand Total</label></div>
                            <div><input type="number" id="grandtotal" name="grandtotal" class="p-2 w-100" required
                                    readonly></div>
                        </div>
                        <div class="d-flex align-items-end mb-3 col-4">
                            <div class="w-100"><input type="submit" value="Save" name="save"
                                    class="w-100 btn btn-primary"></div>
                        </div>
                    </div>
                </form>
            </div>
            <?php include("footer.php") ?>
        </div>
    </div>
</body>
<script>
    let qty = 0;
    let rate = 0;
    function onchangeHandler(event) {
        if (event.target.id == "totalqty") {
            qty = event.target.value;
        }
        else if (event.target.id == "salesrate") {
            rate = event.target.value;
        }
        if (qty != 0 && rate != 0) {
            let totalamount = document.getElementById('totalamount').value = qty * rate;
            let totalsgst = document.getElementById('totalsgst').value = totalamount * 0.09;
            let totalcgst = document.getElementById('totalcgst').value = totalamount * 0.09;
            document.getElementById('grandtotal').value = totalamount + totalsgst + totalcgst;
        }
    }
</script>

</html>