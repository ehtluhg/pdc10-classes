<?php
require(dirname(dirname(__FILE__)) . '/init.php');

use App\ClassRoster;
use App\Course;
use App\Student;

$id = $_GET['id'];
$courses = new Course('');
$courses->setConnection($connection);
$course = $courses->getAll();

$students = new Student('');
$students->setConnection($connection);
$student = $students->getAll();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enroll Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="card mx-auto" style="width: 1000px; margin-top: 100px;">
        <div class="card-body">
            <h2 class="card-title">Enroll Student</h2>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Course</label>
                    <select class="form-select" name="classCode">
                        <option selected>Select Course</option>
                        <?php foreach ($course as $subject) { ?>
                            <option value="<?php echo $subject['id'] ?>"><?php echo $subject['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <!-- <input type="hidden" value="<?php echo $student['id'] ?>" name="studentID"> -->
                    <label class="form-label">Student Name</label>
                    <select class="form-select" name="studentID">
                        <option selected>Select Student</option>
                        <?php foreach ($student as $pupil) { ?>
                            <option value="<?php echo $pupil['id'] ?>"><?php echo $pupil['name'] ?></option>
                        <?php } ?>
                    </select>
                    
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Submit" name="enrollStudent">
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>

<?php

if (isset($_POST['enrollStudent'])) {

    try {
        $roster = new ClassRoster($_POST['classCode'], $_POST['studentID']);
        $roster->setConnection($connection);
        $roster->save();
        header("Location: " . "view.php?" . "id=". $_GET['id'] );
        exit();
    } catch (Exception $e) {
        error_log($e->getMessage());
    }
}
