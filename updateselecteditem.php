<?php
include "dbconfig.php";

if (isset($_POST["selectedItem"])) {
    if ($_POST["itemid"] == "Select Item Name")
        header("location:selectitem.php");
    else {
        try {
            $sql = "SELECT * FROM 22b112_itemmaster WHERE Id = '$_POST[itemid]'";
            $data = mysqli_query($con, $sql);
            $row = mysqli_fetch_row($data);
        } catch (Exception $err) {
            echo "<script>alert('Server Error.')</script>";
        }
    }
}

if (isset($_POST["update"])) {
    $id = $_POST["id"];
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
            $sql = "UPDATE `22b112_itemmaster` SET `ItemName`='$itemname',`HSNCode`='$hsncode',`PurchaseRate`='$purchaserate',`SalesRate`='$salesrate' WHERE Id = '$id'";

            if (mysqli_query($con, $sql)) {
                echo "<script>alert('Item Updated Successfully.')</script>";
                echo "<script>location = 'selectitem.php'</script>";
            } else {
                echo "<script>alert('Item Not Updated.')</script>";
            }
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
                    <a class="nav-link active bg">
                        Item
                    </a>
                    <ul class="subMenu">
                        <li>
                            <a href="additem.php" class="nav-link bg">
                                Add Item
                            </a>
                        </li>
                        <li>
                            <a href="selectitem.php" class="nav-link active bg">
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
            <div class="d-flex justify-content-center">
                <form method="post" class="shadow my-5 p-5 rounded" style="width:30vw">
                    <h3 class="text-center">ITEM DETAILS</h3>
                    <div class="mb-3 d-none">
                        <div class="mb-1"><label for="id">Item Name</label></div>
                        <div><input type="text" Id="id" name="id" value=<?php echo $row[0] ?> required
                                class="p-2 w-100"></div>
                    </div>
                    <div class="mb-3">
                        <div class="mb-1"><label for="itemname">Item Name</label></div>
                        <div><input type="text" Id="itemname" name="itemname" value=<?php echo $row[1] ?> required
                                class="p-2 w-100"></div>
                    </div>
                    <div class="mb-3">
                        <div class="mb-1"><label for="hsncode">HSN Code</label></div>
                        <div><input type="number" id="hsncode" name="hsncode" value=<?php echo $row[2] ?> required
                                class="p-2 w-100"></div>
                    </div>
                    <div class="mb-3">
                        <div class="mb-1"><label for="purchaserate">Purchase Rate</label></div>
                        <div><input type="number" id="purchaserate" name="purchaserate" value=<?php echo $row[3] ?>
                                required class="p-2 w-100">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="mb-1"><label for="salesrate">Sales Rate</label></div>
                        <div><input type="number" id="salesrate" name="salesrate" value=<?php echo $row[4] ?> required
                                class="p-2 w-100"></div>
                    </div>
                    <div>
                        <div><input type="submit" value="Update" name="update" class="w-100 btn btn-primary"></div>
                    </div>
                </form>
            </div>
            <?php include("footer.php") ?>
        </div>
    </div>
</body>

</html>