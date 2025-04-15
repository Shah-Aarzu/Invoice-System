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
                            <a href="selectparty.php" class="nav-link active bg">
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
                <form action="updateselectedparty.php" method="post" class="shadow p-5 rounded"
                    style="width:30vw;margin:100px">
                    <div class="mb-3">
                        <div>
                            <select name="partyid" required class="p-2 w-100">
                                <option value="Select Party Name">Select Party Name</option>
                                <?php
                                while ($row = mysqli_fetch_assoc($data)) {
                                    echo "<option value='$row[Id]'>$row[PartyName]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div>
                        <div><input type="submit" value="Update" name="selectedParty" class="w-100 btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            <?php include("footer.php") ?>
        </div>
    </div>
</body>

</html>