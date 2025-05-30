<?php 
session_start(); 
include('file/header.php');
include('include/connected.php'); 
// if(!isset($_SESSION['id'])){
//     header("Location:admin/login.php");
//     exit();
// }

@$user_id = $_SESSION['id'];

$sql = "SELECT * FROM users WHERE ID = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "User not found.";
    // exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    if (!empty($_POST['password1']) && !empty($_POST['password2'])) {
        $new_password = $_POST['password1'];
        $confirm_password = $_POST['password2'];

        // Validate the password
        if ($new_password !== $confirm_password) {
            echo "Passwords do not match.";
            exit();
        }
        $hashed_password = sha1($new_password, PASSWORD_DEFAULT);
    }

    $update_sql = "UPDATE users SET UserName = :name, Email = :email . isset($hashed_password) ? , Password = :password WHERE ID = :id";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $update_stmt->bindParam(':email', $email, PDO::PARAM_STR);
    if (isset($hashed_password)) {
        $update_stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
    }
    $update_stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
    // if ($update_stmt->execute()) {
    //     // Redirect to logout after successful update
    //     header("Location:admin/logout.php");
    //     exit();
    // } else {
        echo "An error occurred while updating your information.";
 //   }
}
?>
    
<!-------------------- account page ----------->  
<div class="account-page">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <img src="img/thumb-1.jpg" width="10%">
            </div>
            <div class="col-2">
                <div class="form-container" style="height: 500px; overflow:auto;">
                    <h2>Edit Profile</h2>
                    <form action="" method="POST" onsubmit="return validateForm()">
                        <table class="table">
                            <tr>
                                <th>Name:</th>
                                <td><input type="text" name="name" value="<?php echo htmlspecialchars($user['UserName']); ?>" required></td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td><input type="email" name="email" value="<?php echo htmlspecialchars($user['Email']); ?>" required></td>
                            </tr>
                            <tr>
                                <th>User Type:</th>
                                <td><?php echo $user['user_type'] == 1 ? 'admin' : 'user'; ?></td>
                            </tr>
                            <tr>
                                <th>New Password:</th>
                                <td><input type="password" name="password1" placeholder="Enter new password"></td>
                            </tr>
                            <tr>
                                <th>Confirm New Password:</th>
                                <td><input type="password" name="password2" placeholder="Confirm new password"></td>
                            </tr>
                        </table>
                        <input type="submit" class="btn" value="Update Information">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-------------------- Footer ----------------------->
<?php
include('file/footer.php'); 
?>

<!-- Internal CSS -->
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .account-page {
        padding: 50px;
    }

    .form-container {
        background-color: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        margin-bottom: 20px;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 10px;
    }

    input[type="submit"] {
        width: 100%;
        padding: 15px;
        background-color:#4d4f1fa3;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    .btn {
        background-color: #007bff;
        color: white;
    }

    .btn:hover {
        background-color: #0056b3;
    }
</style>

<!-- JavaScript Validation -->
<script>
function validateForm() {
    // Email validation
    const email = document.querySelector('input[name="Email"]').value;
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!email.match(emailPattern)) {
        alert("Please enter a valid email address.");
        return false;
    }
// Phone validation (only numbers, length between 10 and 15)
const phone = document.querySelector('input[name="phone"]').value;
const phonePattern = /^[0-9]{1,9}$/; // Allows only digits (0-9) with a length of 1 to 9

if (!phone.match(phonePattern)) {
    alert("Please enter a valid phone number (only digits, 1-9 characters).");
    return false;
}


    // Password validation (check if new password and confirm password match)
    const newPassword = document.querySelector('input[name="new_password"]').value;
    const confirmPassword = document.querySelector('input[name="confirm_password"]').value;

    if (newPassword && confirmPassword && newPassword !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }

    return true; // If all validations pass, submit the form
}
</script>
