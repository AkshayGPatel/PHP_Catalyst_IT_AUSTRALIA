<?php
require 'db_conn.php';
if (isset($_POST["Import_CSV"])) {

    $filename = $_FILES["uploaded_file"]["tmp_name"];

    if ($_FILES["uploaded_file"]["size"] > 0) {
        $file = fopen($filename, "r");
        $count = 0;
        while (($getCSVData = fgetcsv($file, 10000, ",")) !== FALSE) {
            if ($count == 0) {
                $count = 1;
            } else {
                // check if e-mail address is well-formed
                if (filter_var($getCSVData[2], FILTER_VALIDATE_EMAIL)) {
                    $getCSVData[0] = ucfirst(strtolower($getCSVData[0]));
                    $getCSVData[1] = ucfirst(strtolower($getCSVData[1]));
                    $getCSVData[2] = strtolower($getCSVData[2]);
                    $sql = "INSERT into users (name,surname,email) 
                   values ('" . $conn->real_escape_string($getCSVData[0]) . "','" . $conn->real_escape_string($getCSVData[1]) . "','" . $conn->real_escape_string($getCSVData[2]) . "')";
                    $result = $conn->query($sql);
                    //echo $sql;
                } else {
                    $emailErr = "Invalid email format";
                    echo $emailErr . '<br>';
                }

            }
        }

        fclose($file);
        echo "<script type=\"text/javascript\">
        window.location = \"index.php\"
      </script>";
    }
}
?>