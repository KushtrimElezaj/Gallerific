<?php 

    
    include('header.php');

    if( isset($_SESSION['user_id']) ){
        header("Location: webi.php");
    }

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $role = $_POST['role'];
        $gjinia = $_POST['gjinia'];
        $message = '';

        $sql = 'INSERT INTO users (name, email, password, role, gjinia) VALUES (:name, :email, :password, :role,:gjinia)';
        $query = $pdo->prepare($sql);
        $query->bindParam('name', $name);
        $query->bindParam('email', $email);
        $query->bindParam('password', $password);
        $query->bindParam('role', $role);
        $query->bindParam('gjinia', $gjinia);
        
        if($query->execute()) {
            header("Location: login.php");
        } else {
            $message = "A problem occurred creating your account";
        }
    }
?>

<div class="contactPage">
    <div class="container">
        <?php 
            if(!empty($message)) {
                echo "<p>$message</p>";
            } 
        ?>
        <h1>Register</h1>
        <span>or <a href="login.php">login here</a></span>
        <br> <br> 
        <form action="signup.php" method="post">
            <input type="text" name="name" placeholder="Enter your name" required
                data-validation="custom" 
                data-validation-regexp="^([a-zA-Z]+)$"
                data-validation-error-msg="You did not enter a valid name"><br><br> 
            <input type="email" name="email" placeholder="Enter your email"
                required data-validation="required email"><br><br> 
            <input type="password" name="password" placeholder="Enter your password" required
                data-validation="required length" 
                data-validation-length="min5"><br><br> 
            <label for="role">Your role</label><br>
            <select name="role">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <label>Mashkull
            <input type="radio" name="gjinia" value="0">
        </label>
        <label>Femer
            <input type="radio" name="gjinia" value="1">
        </label><br><br> 
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</div>

<br>
<?php 
  
    include('footer.php');
?>