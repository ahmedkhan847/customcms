<?php
//It autoloads the class
function __autoload($className)
{
    include_once $className . '.php';
}

class User
{

    protected $db = null;

    public function __construct()
    {

        $this->db = new DbConnection();

    }

    public function createuser($user_fname, $user_lname, $user_name, $user_psw, $user_email, $imgname, $user_city, $user_country)
    {
        $con     = $this->db->OpenCon();
        $fname   = $con->real_escape_string($user_fname);
        $lname   = $con->real_escape_string($user_lname);
        $uname   = $con->real_escape_string($user_name);
        $pswd    = $con->real_escape_string($user_psw);
        $email   = $con->real_escape_string($user_email);
        $city    = $con->real_escape_string($user_city);
        $country = $con->real_escape_string($user_country);

        $stmt = $con->prepare("INSERT INTO users(u_fname,u_lname,user_name, user_psw, user_email,img,user_city,user_country) VALUES (?,?,?,?,?,?,?,?)");
        $psw  = password_hash($pswd, PASSWORD_DEFAULT);
        $stmt->bind_param("ssssssss", $fname, $lname, $uname, $psw, $email, $imgname, $city, $country);
        $result = $stmt->execute();
        if (!$result) {
            return $con->error;
        }

        return "true";
    }

    public function imageupload()
    {
        $target_dir    = "userimages/";
        $image         = rand(1, 100);
        $target_file   = $target_dir . basename($_FILES["u_img"]["name"]);
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $imgname       = $image . "." . $imageFileType;
        move_uploaded_file($_FILES["u_img"]["tmp_name"], $target_dir . $imgname);
    }

    public function verifyuserpsw($user_name, $user_psw)
    {
        $con  = $this->db->OpenCon();
        $name = $con->real_escape_string($user_name);
        $pswd = $user_psw;
        $stmt = "SELECT user_id,user_psw FROM users WHERE user_name = '$name'";
        //echo "$stmt";
        $result = $con->query($stmt);
        $sql    = "Invalid Username or Password";
        //var_dump($result);
        if ($result->num_rows === 1) {
            while ($row = $result->fetch_assoc()) {

                $psw = $row['user_psw'];

                if (password_verify($pswd, $psw)) {
                    $sql = "true";

                }

            }
        } else {
            $sql = "Invalid Username or Password";
        }
        $this->db->CloseCon();

        return $sql;

    }

    public function verifyuser($user_name, $useremail)
    {
        $con    = $this->db->OpenCon();
        $user   = $con->real_escape_string($user_name);
        $email  = $con->real_escape_string($useremail);
        $stmtu  = "SELECT 1 FROM users WHERE user_name = '$user'";
        $stmte  = "SELECT 1 FROM users WHERE user_email = '$email'";
        $sql    = "true";
        $result = $con->query($stmte);
        if ($result->num_rows == 1) {
            $sql = "false";

        } else {
            $result = $con->query($stmtu);
            if ($result->num_rows == 1) {
                $sql = "false";

            }

        }

        $this->db->CloseCon();

        return $sql;
    }

    public function getUserarticles($user_name)
    {
        $con = $this->db->OpenCon();

        $user = $con->real_escape_string($user_name);
        $stmt = "SELECT users.u_fname,users.u_lname,users.img,users.user_city,users.user_country,COUNT(article.article_id) as tarticle FROM users
INNER JOIN article
ON article.user_id = users.user_id
WHERE users.user_name = '$user_name'";
        $sql    = "true";
        $result = $con->query($stmt);

        if ($result->num_rows == 1) {
            //echo 'here';
            $sql = $result;
        }
        $this->db->CloseCon();

        return $sql;

    }

    public function getUser($user_name)
    {
        $con = $this->db->OpenCon();

        $user   = $con->real_escape_string($user_name);
        $stmt   = "SELECT * FROM users WHERE user_name = '$user_name'";
        $sql    = "true";
        $result = $con->query($stmt);

        if ($result->num_rows == 1) {
            //echo 'here';
            $sql = $result;
        }
        $this->db->CloseCon();

        return $sql;

    }

    public function updateuser($user_fname, $user_lname, $user_psw, $imgname, $user_city, $user_country, $userid)
    {
        $con   = $this->db->OpenCon();
        $fname = $con->real_escape_string($user_fname);
        $lname = $con->real_escape_string($user_lname);
        //$uname = $con->real_escape_string($user_name);
        $pswd = $con->real_escape_string($user_psw);
        //$email = $con->real_escape_string($user_email);
        $city    = $con->real_escape_string($user_city);
        $country = $con->real_escape_string($user_country);

        $stmt = $con->prepare("UPDATE users SET u_fname = ?,u_lname = ?, user_psw = ?, img = ?,user_city = ? ,user_country = ? WHERE user_id = ?");
        $psw  = password_hash($pswd, PASSWORD_DEFAULT);
        $stmt->bind_param("ssssssi", $fname, $lname, $psw, $imgname, $city, $country, $userid);
        $result = $stmt->execute();
        if (!$result) {
            return $con->error;
        }

        return "true";
    }

}
