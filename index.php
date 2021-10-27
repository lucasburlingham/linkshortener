<?php

include 'config.php'; 


if(isset($_POST)) {
    // Sanitize and validate the data passed in from the form.
    $_POST = array_map('stripslashes', $_POST);
    $_POST = array_map('htmlspecialchars', $_POST);

    // Submit the data to the database.
    submitData($_POST);
    // If files are uploaded, send them to be sent to the $storage_dir folder.
}

function submitData($data) {
    // Set the variables from the form.
    $slash = $data['SLASH'];
    $location = $data['LOCATION'];
    $dateCreated = date("Y-m-d H:i:s");
    
    // Create the directory with redirects
    mkdir("l/$slash/", 0777);
    $content_php = "<?php header(\"Location: $location \"); // Date: $dateCreated?>";
file_put_contents('l/'. $slash . '/index.php', $content_php);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo $branding_style_url; ?>">
    <!-- Comes with Bootstrap 5 styling and dependancies by default. -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <title><?php echo $branding_title; ?></title>
</head>

<body>

    <nav class="navbar navbar-expand navbar-dark text-light bg-dark">
        <div class="container-fluid">
            <div class="nav navbar-brand "><?php echo $branding_title; ?></div>
        </div>
    </nav>

    <form name="submitForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="container">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <label for="LOCATION" class="h5 pt-1">Location: (eg. https://google.com/)</label>
                    <input type="url" name="LOCATION" class="form-control" placeholder="https://..." required>
                    <br>
                </div>
                <div class="col-4"></div>
            </div>
            <br>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <label for="SLASH" class="h5 pt-1">Short link: (golca.org/yourlinkhere)</label>
                    <input type="text" name="SLASH" class="form-control" placeholder="Under 50 characters..." required>
                    <br>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" name="submit" class="mt-2 btn btn-primary form-control">Submit</button>
                    </div>
                </div>
                <div class="col-4"></div>
            </div>

        </div>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>