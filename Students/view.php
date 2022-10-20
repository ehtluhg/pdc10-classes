<?php
require(dirname(dirname(__FILE__)) . '/init.php');

use App\Student;
use App\Course;

$id = $_GET['id'];
$getClasses = new Student('');
$getClasses->setConnection($connection);
$classes = $getClasses->viewClasses($id);

$studentName = new Student('');
$studentName->setConnection($connection);
$student = $studentName->getById($id);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDC10 - Class Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="m-5 p-3">
        <ul class="nav nav-pills shadow p-3 mb-5 bg-body rounded">
            <li class="nav-item">
                <a class="nav-link text-bg-light" href="/pdc10-class-management/Courses/index.php">Classes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-bg-dark active" aria-current="page" href="index.php">Students</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-bg-light" href="/pdc10-class-management/Teachers/index.php">Teachers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-bg-light" href="/pdc10-class-management/Class-rosters/index.php">Class Rosters</a>
            </li>
        </ul>
        <div class="m-3 p-2">
            <div class="card mb-4 shadow">
                <div class="card-header">
                    <?php echo $student['name'] ?>'s Courses
                </div>
                <div class="card-body">
                    <a role="button" class="btn btn-outline-secondary m-3" href="index.php">Back to Students</a>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Course Code</th>
                                <th>Course Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($classes as $info) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $info['id'] ?></th>
                                    <td><?php echo $info['classesCode'] ?></td>
                                    <td><?php echo $info['className'] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>