<?php
$sql = $conn->query("SELECT * FROM users WHERE user_type='2'");
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Registration Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Verify/Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($userData = $sql->fetch(PDO::FETCH_ASSOC)) {
                    echo '
                    <tr class="">
                    <td>' . $userData['user_id'] . '</td>' .
                        '<td>' . $userData['user_name'] . '</td>' .
                        '<td>' . $userData['user_surname'] . '</td>' .
                        '<td>' . $userData['user_email'] . '</td>' .
                        '<td>' . $userData['registration_date'] . '</td>' .
                        '<td>' . $userData['user_status'] . '</td>' .
                        '<td>' . '<a class="btn btn-success text-light" href="modules/delete-verify-users.php?delete=0&id=' . $userData["user_id"] . '">Verify</a>' .
                        '<a class="btn btn-danger text-light ms-1" href="modules/delete-verify-users.php?delete=1&id=' . $userData["user_id"] . '">Delete</a>' . '</td>' .
                        '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</main>