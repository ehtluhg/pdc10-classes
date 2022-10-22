<?php
require(dirname(dirname(__FILE__)) . '/init.php');

use App\ClassRoster;
use App\Course;
use App\Teacher;
use App\Student;

$classRoster = new ClassRoster('');
$classRoster->setConnection($connection);
$roster = $classRoster->getRoster();
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
                <a class="nav-link text-bg-light" href="/pdc10-class-management/Students/index.php">Students</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-bg-light" href="/pdc10-class-management/Teachers/index.php">Teachers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-bg-dark active" aria-current="page" href="index.php">Class Rosters</a>
            </li>
        </ul>
        <div class="m-3 p-2">
            <div class="card mb-4 shadow">
                <div class="card-header">
                    Class Rosters
                </div>
                <div class="card-body">
                    <!-- <a role="button" class="btn btn-secondary m-3" href="add.php">Add Roster</a> -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Course Code</th>
                                <th>Course Name</th>
                                <th>Teacher Name</th>
                                <th>Students Enrolled</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($roster as $info) {

                            ?>
                                <tr>
                                    <th scope="row"><?php echo $info['classesCode'] ?></th>
                                    <td><?php echo $info['courseName'] ?></td>
                                    <td><?php echo $info['teacherName'] ?></td>
                                    <td><?php echo $info['studentsEnrolled'] ?></td>
                                    <td>
                                        <a role="button" href="view.php?id=<?php echo $info['classID']; ?>" name="view">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z" />
                                            </svg>
                                        </a>
                                    </td>
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