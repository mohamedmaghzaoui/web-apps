<?php
//userManager class
class userManager
{
    protected $db;
    protected $connected;

    public function __construct()
    {
        // Connect to the database
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

    public function isConnected()
    {
        return $this->connected;
    }

    // Sign up user
    public function addUser(user $user)
    {
        // Check if username already exists
        $req = $this->db->prepare("SELECT COUNT(*) FROM user WHERE username = ?");
        $req->execute([$user->getUsername()]);
        $count = $req->fetchColumn();
        if ($count > 0) {
            $errorMessage = "Username already exists";
            echo "<script>alert('$errorMessage'); window.location.href='../signup/signup.html';</script>";
            exit;
        }

        // Check if email already exists
        $req = $this->db->prepare("SELECT COUNT(*) FROM user WHERE email = ?");
        $req->execute([$user->getEmail()]);
        $count = $req->fetchColumn();
        if ($count > 0) {
            $errorMessage = "Email already exists";
            echo "<script>alert('$errorMessage'); window.location.href='../signup/signup.html';</script>";
            exit;
        }

        // Get user data
        $username = $user->getUsername();
        $password = $user->getPassword();
        $email = $user->getEmail();
        $gender = $user->getGender();

        // Insert the user data into the database
        $sql = "INSERT INTO user (username, hashedPassword, email, gender) VALUES (?, ?, ?, ?)";
        $req = $this->db->prepare($sql);

        if (!$req) {
            $errorMessage = "SQL error: " . $this->db->errorInfo()[2];
            echo "<script>alert('$errorMessage'); window.location.href='../signup/signupInterface.php';</script>";
            exit;
        }

        $req->bindParam(1, $username);
        $req->bindParam(2, $password);
        $req->bindParam(3, $email);
        $req->bindParam(4, $gender);

        if ($req->execute()) {
            echo "Signup successful";
        } else {
            $errorMessage = "Error: " . $req->errorInfo()[2];
            echo "<script>alert('$errorMessage'); window.location.href='../signup/signupInterface.php';</script>";
            exit;
        }

        $req->closeCursor();
    }
}
