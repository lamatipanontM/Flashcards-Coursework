<!-- Login Page - to let users input their details and post them to the loginprocess -->
<!DOCTYPE html>
<html>
    <head>
    <title>Login</title>
    </head>
<body>
    <!-- Creates a form that lets user input username and password -->
<form action ="loginprocess.php" method="POST">
    User name:<input type="text" name="Username"><br>
    Password =<input type="password" name="password"><br>
        <input type="submit" value="Login">
</form>
<!-- Redirects the user to a page where they create their account -->
<a href="users.php">If you don't have an account click here</a>

</body>
</html>