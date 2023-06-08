<!DOCTYPE html>
<html>

<head>
    <title>SCRIPT TASK</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
        crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require 'db_conn.php';
    ?>
    <div id="wrap">
        <div class="container">
            <div class="row">
                <form class="form-horizontal" action="user_upload.php" method="post" name="upload_csv"
                    enctype="multipart/form-data">
                    <fieldset>
                        <!-- Form -->
                        <legend>Script Task (Import CSV File)</legend>
                        <!-- File Button -->
                        <div class="form-group">
                            <label class="col-md-1 control-label" for="filebutton">Select File</label>
                            <div class="col-md-11">
                                <input type="file" name="uploaded_file" id="uploaded_file" class="input-large">
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" id="submit" name="Import_CSV" class="btn btn-success   button-loading"
                                    data-loading-text="Loading...">Import</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <!-- Display Table -->
            <div class="row">
                <div class='table-responsive'>
                    <table id='myTable' class='table table-striped table-bordered'>
                    <legend>Display User List</legend>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Get member rows from the database
                            $result = $conn->query("SELECT * FROM users ORDER BY id ASC");
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['surname']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['email']; ?>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="3">No user(s) found...</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <br>
</body>

</html>