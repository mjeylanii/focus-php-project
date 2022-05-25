<h1>A  web project for finals using PHP for the backend</h1>

<p>Sources</p>
<pre>
printf("Hello markdown");
</pre>
<h2></h2>
<ul>
<li></li>
</ul>


//CHECK IF THE LOGIN BUTTON WAS CLICKED
/*if (isset($_POST['submit_login'])) {
////////////////////////////////////////////////////////////////////////////
$mail = $_POST["email"];
$pass = MD5($_POST["pass"]);
////////////////////////////////////////////////////////////////////////////
$sql = "SELECT  * FROM users WHERE user_email='$mail' AND user_password ='$pass'";
$count = $conn->query($sql);

    if (($count->rowCount()) <= 0) {
        //WARN USER THAT GIVEN USER DOES NOT EXIST
        //WARN USER THAT EMAIL DOES NOT EXIST
        header('location:http://localhost/focus/index.php'); //REDIRECT USER TO LOGIN/REGISTRATION PAGE
        echo '<script>alert("Wrong email or password");</script>';
    } else {
        ////////////////////////////////////////////////////////////////////////////
        $sql = "SELECT user_type FROM users WHERE user_email='$mail'";
        $result = $conn->query($sql);
        ///////////////////////////////////////////////////////////////////////////
        /* A CONDITIONAL STATEMENT THAT CHECKS IF THE QUERY RETURN ANYTHING */
      /*  if ($result->fetchColumn() == 1) {
            $sql = "SELECT * FROM users WHERE user_email='$mail'"; //A QUERY TO FETCH COLUMNS WHERE THE MAIL COLUMN EQUALS THE VARIABLE '$mail'
            $data = $conn->query($sql); //EXECUTING THE QUERY AND STORING THE VALUES TO $DATA VARIABLE
            $dataArray = $data->fetch(PDO::FETCH_ASSOC); //STORING THE VALUES FROM DATA TO AND ARRAY OF DATA
            $_SESSION['user'] = $dataArray['user_id']; //SETTING THE USER SESSION VALUE TO CORRESPONDING ID
            $_SESSION['type'] = $dataArray['user_type']; //SETTING THE TYPE SESSION VALUE TO CORRESPONDING TYPE
            $_SESSION['full-name'] = $dataArray['user_name'] . " " . $dataArray['user_surname'];
            $_SESSION['name'] = $dataArray['user_name'];
            $_SESSION['email'] = $dataArray['user_email'];
            $_SESSION['registration'] = $dataArray['registration_date'];
            header('location:http://localhost/focus/index.php'); //DIRECT USER TO ADMIN PAGE
        } else {
            $sql = "SELECT * FROM users WHERE user_email='$mail'"; //SQL CODE TO QUERY COLUMNS FROM THE USERS TABLE
            $data = $conn->query($sql);
            $dataArray = $data->fetch(PDO::FETCH_ASSOC);
            $_SESSION['user'] = $dataArray['user_id'];
            $_SESSION['type'] = $dataArray['user_type'];
            $_SESSION['full-name'] = $dataArray['user_name'] . " " . $dataArray['user_surname'];
            $_SESSION['name'] = $dataArray['user_name'];
            $_SESSION['email'] = $dataArray['user_email'];
            $_SESSION['registration'] = $dataArray['registration_date'];
            if ($dataArray['user_status'] == NULL) {
                $_SESSION['status'] = "NOT VERIFIED";
                header('location:http://localhost/focus/index.php');
            }
        }
    }
}*/

