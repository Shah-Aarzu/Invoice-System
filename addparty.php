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
                            <a href="addparty.php" class="nav-link active bg">
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
                <form action="addpartyhandler.php" method="post" class="shadow my-5 p-5 rounded" style="width:30vw">
                    <h3 class="text-center">PARTY DETAILS</h3>
                    <div class="mb-3">
                        <div class="mb-1"><label for="name">Name</label></div>
                        <div><input type="text" Id="name" name="name" required class="p-2 w-100"></div>
                    </div>
                    <div class="mb-3">
                        <div class="mb-1"><label for="address">Address</label></div>
                        <div><input type="text" Id="address" name="address" required class="p-2 w-100"></div>
                    </div>
                    <div class="mb-3">
                        <div class="mb-1"><label for="gstin">GSTIN</label></div>
                        <div><input type="text" id="gstin" name="gstin" required class="p-2 w-100"></div>
                    </div>
                    <div class="mb-3">
                        <div class="mb-1"><label for="phoneno">Phone No</label></div>
                        <div><input type="number" id="phoneno" name="phoneno" required class="p-2 w-100"></div>
                    </div>
                    <div class="mb-3">
                        <div class="mb-1"><label for="email">Email Id</label></div>
                        <div><input type="email" id="email" name="email" required class="p-2 w-100"></div>
                    </div>
                    <div>
                        <div><input type="submit" value="Save" name="save" class="w-100 btn btn-primary"></div>
                    </div>
                </form>
            </div>
            <?php include("footer.php") ?>
        </div>
    </div>
</body>

</html>