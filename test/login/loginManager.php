<?php
//login Manager class
class loginManager
{
    protected $db;
    protected $connected;

    public function __construct()
    {
        //connect to the database
        $dbname = "site";
        $port = 8889;
        $username = "root";
        $password = "root";
        try {
            $this->setDb(new PDO("mysql:host=localhost;dbname=$dbname;port=$port", $username, $password));
            $this->connected = true;
        } catch (PDOException $error) {
            echo $error->getMessage();
            $this->connected = false;
        }
    }

    public function setDb($db)
    {
        $this->db = $db;
    }
    //function to check connectivity
    public function isConnected()
    {
        return $this->connected;
    }
    //function to login a user
    public function loginUser($loginUser)
    {
        //get user data
        $username = $loginUser->getUsername();
        $password = $loginUser->getPassword();

        // Check if the username and password are in database
        $sql = "SELECT * FROM user WHERE username = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            //alert the error message
            $errorMessage = "User does not exist";
            echo "<script>alert('$errorMessage'); window.location.href='../login/loginInterface.php';</script>";
            exit;
        }

        // Verify the password
        if (password_verify($password, $user['hashedPassword'])) {
            echo "Login successful";
            session_start();
            $_SESSION["userId"] = $user['id'];
        } else {
            //alert error message
            $errorMessage = "Incorrect password";
            echo "<script>alert('$errorMessage'); window.location.href='../login/loginInterface.php';</script>";
            exit;
        }
    }
    //function to change the password
    public function changePassword($username, $email, $newPassword)
    {
        // Check if the provided username and email are  in the database
        $sql = "SELECT * FROM user WHERE username = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            //alert error message then go to the forgetPassword.html file
            $errorMessage = "Username does not exist";
            echo "<script>alert('$errorMessage'); window.location.href='forgetPassword.html';</script>";
            exit;
        } elseif ($user['email'] !== $email) {
            $errorMessage = "Incorrect email";
            echo "<script>alert('$errorMessage');</script>";
            return; // Stop execution but continue rendering the form page
        } else {
            // change password
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $sql = "UPDATE user SET hashedPassword = ? WHERE username = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$hashedPassword, $username]);
            echo "<script>alert('password changed succesfully'); window.location.href='forgetPassword.html';</script>";
            return;
        }
    }
  

}
