<?php
require(dirname(dirname(__FILE__)) . '/init.php');

use App\Student;
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="card mx-auto" style="width: 1000px; margin-top: 100px;">
        <div class="card-body">
            <h2 class="card-title">New Student</h2>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Student Number</label>
                    <input type="text" class="form-control" name="studentNumber">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="phoneNumber">
                </div>
                <div class="mb-3">
                    <label class="form-label">Program</label>
                    <select class="form-select" name="program">
                        <option selected>Select Program</option>
                        <option>BS Computer Science</option>
                        <option>BS Information Technology</option>
                        <option>Bachelor of Multimedia Arts</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Submit" name="submitStudent">
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>

<?php

if (isset($_POST['submitStudent'])) {

    try {

        $student = new Student($_POST['name'], $_POST['studentNumber'], $_POST['email'], $_POST['phoneNumber'],  $_POST['program']);
        $student->setConnection($connection);
        $student->save();
        header("Location: index.php");
        exit();
    } catch (Exception $e) {
        error_log($e->getMessage());
    }
}
