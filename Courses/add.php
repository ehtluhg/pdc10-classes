<?php
require(dirname(dirname(__FILE__)) . '/init.php');

use App\Course;
use App\Teacher;

$teachers = new Teacher('');
$teachers->setConnection($connection);
$teacher = $teachers->getAll();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Class</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="card mx-auto" style="width: 1000px; margin-top: 100px;">
        <div class="card-body">
            <h2 class="card-title">New Class</h2>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" class="form-control" name="description">
                </div>
                <div class="mb-3">
                    <label class="form-label">Class Code</label>
                    <input type="text" class="form-control" name="classCode">
                </div>
                <div class="mb-3">
                    <label class="form-label">Teacher</label>
                    <select class="form-select" name="teacherID">
                        <option selected>Select Teacher</option>
                        <?php foreach ($teacher as $data) { ?>
                            <option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Submit" name="submitClass">
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>

<?php

if (isset($_POST['submitClass'])) {

    try {
        $course = new Course($_POST['name'], $_POST['description'], $_POST['classCode'], $_POST['teacherID']);
        $course->setConnection($connection);
        $course->save();
        header("Location: index.php");
        exit();
    } catch (Exception $e) {
        error_log($e->getMessage());
    }
}
