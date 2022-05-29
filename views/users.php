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
            $users = $params;
            foreach ($users as $user) {
                echo '
                    <tr class="">
                     <td  class="align-middle">' . $user['user_id'] . '</td>' .
                    '<td  class="align-middle">' . $user['user_firstname'] . '</td>' .
                    '<td  class="align-middle">' . $user['user_lastname'] . '</td>' .
                    '<td  class="align-middle">' . $user['user_email'] . '</td>' .
                    '<td  class="align-middle">' . $user['registration_date'] . '</td>' .
                    '<td  class="align-middle">' . $user['user_status'] . '</td>';
                if ($user['user_status'] == 'VERIFIED') {
                    echo
                        '<td><a class="btn btn-danger text-light ms-1" href="users?id=' . $user["user_id"] .
                        '"><span data-feather="trash-2"></span></a>' . '</td></tr>';
                } else {
                    echo '<td><a class="btn btn-success text-light" href="users?id=' . $user["user_id"] . '"><span data-feather="check-circle"></span>
                     </a><a class="btn btn-danger text-light ms-1" href="users?id=' . $user["user_id"] . '"><span data-feather="trash-2"></span></a>' .
                        '</td></td>' .
                        '<td></tr>';

                }
            }
            ?>
            </tbody>
        </table>
    </div>
    <script>
        feather.replace({
            'aria-hidden': 'true'
        })
    </script>
</main>