<?php
include "dbconfig.php";

if (isset($_POST["selectedParty"])) {
    if ($_POST["partyid"] == "Select Party Name")
        header("location:selectparty.php");
    else {
        try {
            $sql = "SELECT * FROM 22b112_partymaster WHERE Id = '$_POST[partyid]'";
            $data = mysqli_query($con, $sql);
            $row = mysqli_fetch_row($data);
        } catch (Exception $err) {
            echo "<script>alert('Server Error.')</script>";
        }
    }
}

if (isset($_POST["update"])) {
    $Id = $_POST["Id"];
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
            $sql = "UPDATE `22b112_partymaster` SET `PartyName`='$name',`Address`='$address',`GSTIN`='$gstin',`PhoneNo`='$phoneno',`EmailId`='$email' WHERE Id = '$Id'";

            if (mysqli_query($con, $sql)) {
                echo "<script>alert('Data Updated Successfully.')</script>";
                echo "<script>location = 'selectparty.php'</script>";
            } else {
                echo "<script>alert('Data Not Updated.')</script>";
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
                    <a class="nav-link active bg">
                        Party
                    </a>
                    <ul class="subMenu">
                        <li>
                            <a href="addparty.php" class="nav-link bg">
                                Add Party
                            </a>
                        </li>
                        <li>
                            <a href="updateparty.php" class="nav-link active bg">
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
                            <a href="updateitem.php" class="nav-link bg">
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
                            <a href="purchasedetails.php" class="nav-link bg">
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
                            <a href="saledetails.php" class="nav-link bg">
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
                    <h3 class="text-center">PARTY DETAILS</h3>
                    <div class='mb-3 d-none'>
                        <div><input type='text' value=<?php echo $row[0] ?> Id='Id' name='Id' required
                                class='p-2 w-100'></div>
                    </div>
                    <div class='mb-3'>
                        <div class='mb-1'><label for='name'>Name</label></div>
                        <div><input type='text' value=<?php echo $row[1] ?> Id='name' name='name' required
                                class='p-2 w-100'></div>
                    </div>
                    <div class='mb-3'>
                        <div class='mb-1'><label for='address'>Address</label></div>
                        <div><input type='text' value=<?php echo $row[2] ?> Id='address' name='address' required
                                class='p-2 w-100'></div>
                    </div>
                    <div class='mb-3'>
                        <div class='mb-1'><label for='gstin'>GSTIN</label></div>
                        <div><input type='text' value=<?php echo $row[3] ?> id='gstin' name='gstin' required
                                class='p-2 w-100'>
                        </div>
                    </div>
                    <div class='mb-3'>
                        <div class='mb-1'><label for='phoneno'>Phone No</label></div>
                        <div><input type='number' value=<?php echo $row[4] ?> id='phoneno' name='phoneno' required
                                class='p-2 w-100'></div>
                    </div>
                    <div class='mb-3'>
                        <div class='mb-1'><label for='email'>Email Id</label></div>
                        <div><input type='email' value=<?php echo $row[5] ?> id='email' name='email' required
                                class='p-2 w-100'></div>
                    </div>
                    <div>
                        <div><input type='submit' value='Update' name='update' class='w-100 btn btn-primary'></div>
                    </div>
                </form>
            </div>
            <?php include("footer.php") ?>
        </div>
    </div>
</body>

</html>