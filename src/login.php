/* set the page title */
$page_title = 'Login';
/* put 2 text fields in the form */
$page_content = '
    <form action="login.php" method="post">
        <fieldset>
            <legend>Login</legend>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" />
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" />
            <input type="submit" name="login" value="Login" />
        </fieldset>
    </form>
/* if the login button was clicked */
if (isset($_POST["login"])) {
    /* get the email and password from the form */
    $email = $_POST["email"];
    $password = $_POST["password"];
    /* check google's account database for a match */
    $result = $db->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
    /* if there is a match */
    if ($result->num_rows == 1) {
        /* get the user's data */
        $user = $result->fetch_assoc();
        /* set the session variables */
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["user_name"] = $user["name"];
        $_SESSION["user_email"] = $user["email"];
        /* redirect to the home page for the members */
        header("Location: index_loggedin.html");