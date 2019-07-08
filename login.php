<?php 

    include('header.php');

    if(isset($_SESSION['user_id']) && $_SESSION['role']!=='admin'){
        header("Location: webi.php");
    }

    if(isset($_POST['submit'])):
        $email = $_POST['email'];
        $password = $_POST['password'];
        $message = '';
    
        $query = $pdo->prepare('SELECT id,name, email, password, role FROM users WHERE email = :email');
        $query->bindParam(':email', $email);
        $query->execute();
    
        $user = $query->fetch();
    
        if(($user) !== null && password_verify($password, $user['password']) ){
  
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role'];

            if(strcmp($user['role'], "admin") == 0)
            {
                header("Location: webi.php");
            }
            else
            {
                header("Location: webi.php");
            }
        } else {
            $message = 'Sorry, those credentials do not match';
        }

    endif;
    
?><?php 
   if(isset($_SESSION['role'])){ 
if($_SESSION['role']=='admin'){
    include('admintable.php');
}}

?>

<div class ="contactPage">
    <?php if(!empty($message)): ?>
            <p><?php echo $message ?></p>
    <?php endif; ?>

        <h1>Login</h1>
        <span>or <a href="signup.php">signup here</a></span>    
        <br><br> 
        <form action="login.php" method="POST">
            <input type="text" placeholder="Enter your name" name="name" 
                required data-validation="custom" 
                data-validation-regexp="^([a-zA-Z]+)$"
                data-validation-error-msg="You did not enter a valid name"><br>

            <input type="email" placeholder="Enter your email" name="email" required data-validation="required email"><br>

            <input type="password" placeholder="and password" name="password" required
                data-validation="required length" 
                data-validation-length="min5"><br><br>     
            <input type="submit" name="submit" value="Submit">
        </form>
</div>

<br><br><br><br>
<?php 
    
    include('footer.php');
?>