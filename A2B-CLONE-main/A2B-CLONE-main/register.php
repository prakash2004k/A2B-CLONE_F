<html>
    <body>
        <?php
        $username = $_POST['username'];
        $email  = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        if (!empty($username) || !empty($email) || !empty($password) || !empty($password2)) {
            if ($password != $password2) {
                echo "<script>alert('Passwords do not match. Please enter the password correctly');window.location='register.html'</script>";
            } else {
                $host = "localhost";
                $dbusername = "root";
                $dbpassword = "";
                $dbname = "project";

                // Create connection
                $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
                if (mysqli_connect_error()) {
                    die('Connect Error (' . mysqli_connect_errno() . ') '
                        . mysqli_connect_error());
                } else {
                    $SELECT = "SELECT email From register Where email = ? Limit 1";
                    $INSERT = "INSERT Into register (username , email ,password, password2 )values(?,?,?,?)";

                    // Prepare statement
                    $stmt = $conn->prepare($SELECT);
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $stmt->bind_result($email);
                    $stmt->store_result();
                    $rnum = $stmt->num_rows;

                    // Checking username
                    if ($rnum == 0) {
                        $stmt->close();
                        $stmt = $conn->prepare($INSERT);
                        $stmt->bind_param("ssss", $username, $email, $password, $password2);
                        $stmt->execute();
                        // Close prepared statement
                        $stmt->close();
                        // Close database connection
                        $conn->close();
                        // JavaScript code to display popup message and redirect to index.html
                        echo "<script>alert('User ID has been created successfully'); window.location = 'index.html';</script>";
                    } else {
                        echo "Someone already registered using this email";
                    }
                    $stmt->close();
                    $conn->close();
                }
            }
        } else {
            echo "All fields are required";
            die();
        }
        ?>
    </body>
</html>
