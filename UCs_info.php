<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <!-- Nav-Bar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary ">
        <div class="container-fluid">
            <button class="btn btn-primaryy" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon  "></span>
            </button>
            <a class="navbar-brand ps-3" href="#"></i> &nbsp;Demo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

<!-- Side-Bar -->
    <div class="offcanvas offcanvas-start shadow-lg   bg-body-success rounded " data-bs-scroll="true" tabIndex="-1"
        id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title ps-3" id="offcanvasWithBothOptionsLabel">Menu Bar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body ">
            <ul class="nav flex-column ">
                <a href="/" class="nav-link  border-bottom  text-dark justify-content-start "> <i
                        class="fa-solid fa-house"></i> &nbsp;Home </a>
                <a href="/" class="nav-link border-bottom text-dark justify-content-start "><i
                        class="fa-solid fa-border-all"></i> &nbsp;Dashboard</a>
                <a href="/" class="nav-link border-bottom text-dark justify-content-start "><i
                        class="fa-solid fa-money-check"></i> &nbsp; Account Section</a>
                <a href="/" class="nav-link border-bottom text-dark justify-content-start "><i
                        class="fa-solid fa-cart-shopping"></i> &nbsp;Payment Method</a>
                <a href="/" class="nav-link border-bottom text-dark justify-content-start "> <i
                        class="fa-solid fa-chalkboard-user"></i> &nbsp; Print Challan</a>
            </ul>
        </div>
        <div class="offcanvas-footer ps-3">
            <ul class='nav flex-column '>
                <li class="nav-item"><a href="/" class="nav-link text-dark border-bottom"><i
                            class="fa-solid fa-gear"></i> &nbsp; Setting</a></li>
                <li class="nav-item"><a href="/" class="nav-link text-dark"><i
                            class="fa-solid fa-right-from-bracket"></i> &nbsp; Logout</a></li>
                <li class="nav-item"><a href="/" class="nav-link text-dark"><i
                            class="fa-solid fa-arrow-right-to-bracket"></i> &nbsp; Log In</a></li>
            </ul>
        </div>
    </div>


    <!-- Body Content -->

    <!-- <div class="container mt-5">
        <h4 class="text-center">District Swat & Its Associate Tehsils Information Dashboard: </h4>
    </div> -->
    <div class="container mt-5">
        <h4 class="text-center">District Swat & Its Associate Tehsils Information Dashboard:</h4>
        <form method="post" action="">
            <button type="submit" name="show_districts" class="btn btn-outline-success">Show Districts</button>
        </form>

        <?php
        // Include the database connection file
        include 'db_connection.php';

        // Check if the form is submitted to show districts
        if (isset($_POST["show_districts"])) {
            $sql_query = "SELECT district_name FROM DistrictTable";
            $result = mysqli_query($conn, $sql_query);

            if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                echo "<div class='container'>";
                echo "<div class='text-center'>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "District Name: " . $row["district_name"] . "<br>"; 
                }
                echo "</div>"; // closing text-center div
                echo "</div>"; // closing container div
            } else {
                echo "0 results";
            }
        }

        // Check if the form is submitted to add a district
        if (isset($_POST["add_district"])) {
            // Ensure that the district name is provided
            if (!empty($_POST["district_name"])) {
                // Prepare the district name for insertion (to prevent SQL injection)
                $district_name = mysqli_real_escape_string($conn, $_POST["district_name"]);

                // Insert the new district into the database
                $sql_query = "INSERT INTO DistrictTable (district_name) VALUES ('$district_name')";
                if (mysqli_query($conn, $sql_query)) {
                    echo "<div class='alert alert-info' role='alert'>District added successfully!</div>";
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Error adding district: " . mysqli_error($conn) . "</div>";
                }
            } else {
                echo "<div class='alert alert-danger' role='alert'>District name cannot be empty!</div>";
            }
        }

        // Check if the form is submitted to show tehsils
        if (isset($_POST["show_tehsils"])) {
            $sql_query = "SELECT tehsil_name FROM TehsilTable";
            $result = mysqli_query($conn, $sql_query);

            if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                echo "<div class='container mt-3'>";
                echo "<div class='text-center'>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "Tehsil Name: " . $row["tehsil_name"] . "<br>"; 
                }
                echo "</div>"; // closing text-center div
                echo "</div>"; // closing container div
            } else {
                echo "0 results";
            }
        }

        // Check if the form is submitted to add a tehsil
        if (isset($_POST["add_tehsil"])) {
            // Ensure that the tehsil name is provided
            if (!empty($_POST["tehsil_name"])) {
                // Prepare the tehsil name for insertion (to prevent SQL injection)
                $tehsil_name = mysqli_real_escape_string($conn, $_POST["tehsil_name"]);

                // Insert the new tehsil into the database
                $sql_query = "INSERT INTO TehsilTable (tehsil_name) VALUES ('$tehsil_name')";
                if (mysqli_query($conn, $sql_query)) {
                    echo "<div class='alert alert-info' role='alert'>Tehsil added successfully!</div>";
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Error adding tehsil: " . mysqli_error($conn) . "</div>";
                }
            } else {
                echo "<div class='alert alert-danger' role='alert'>Tehsil name cannot be empty!</div>";
            }
        }
        ?>

        <!-- Form to add a new district -->
        <form method="post" action="">
            <div class="mb-3">
                <label for="districtName" class="form-label">District Name</label>
                <input type="text" class="form-control" id="districtName" name="district_name">
            </div>
            <button type="submit" name="add_district" class="btn btn-primary">Add District</button>
        </form>

        <!-- Show Tehsil Button -->
        <form method="post" action="">
            <button type="submit" name="show_tehsils" class="btn btn-outline-success mt-3">Show Tehsils</button>
        </form>

        <!-- Form to add a new tehsil -->
        <form method="post" action="">
            <div class="mb-3">
                <label for="tehsilName" class="form-label">Tehsil Name</label>
                <input type="text" class="form-control" id="tehsilName" name="tehsil_name">
            </div>
            <button type="submit" name="add_tehsil" class="btn btn-primary">Add Tehsil</button>
        </form>

    </div>

   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>