<?php 

   
    include('header.php');


    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $sql = 'SELECT * FROM users WHERE id = :id';
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $id]);

    $user = $query->fetch();
	
	if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        $sql = 'UPDATE users SET name = :name, email = :email, role = :role WHERE id = :id ';
        $query = $pdo->prepare($sql);
        $query->bindParam('name', $name);
        $query->bindParam('email', $email);
        $query->bindParam('role', $role);
        $query->bindParam('id', $id);

        $query->execute();

        header("Location: login.php");
    }
?>

<div class="contactPage">
    <form method="post">
        <input type="text" name="name" value="<?php echo $user['name']; ?>" placeholder="Enter your name"
            required data-validation="custom" 
            data-validation-regexp="^([a-zA-Z]+)$"
            data-validation-error-msg="You did not enter a valid name"><br>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" placeholder="Enter your email"
            data-validation="required email"><br>
        <label for="role">Your role</label><br>
        <select name="role">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>

<?php 
    
    include('footer.php');
?>