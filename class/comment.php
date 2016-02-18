<?php
//include 'DbConnection.php';

class comment
{
    private $db;
    public function __construct()
    {
        $this->db = new DbConnection();
    }

    public function addcomment($aid,$cname, $cemail, $cweb, $comment)
    {
        $con     = $this->db->OpenCon();
        $name    = $con->real_escape_string($cname);
        $email   = $con->real_escape_string($cemail);
        $web     = $con->real_escape_string($cweb);
        $comment = $con->real_escape_string($comment);
        $query   = $con->prepare("INSERT INTO comments(article_id, cname, cemail, cweb, comment) VALUES ( ( SELECT article_id FROM articles WHERE articles.article_id = ? ), ?,?,?,? )");
        $query->bind_param("issss", $aid, $name, $email, $web, $comment);
        $result = $query->execute();
        if (!$result) {

            $error = $con->error;

            $this->db->CloseCon();
            return $error;
        }
        $this->db->CloseCon();
        $result = true;
        return $result;

    }

    public function viewcomments($articleid)
    {
        $con   = $this->db->OpenCon();
        $id    = $con->real_escape_string($articleid);
        $stmt = "SELECT comment_id,cname,cweb, comment ,DATE_FORMAT(date,'%d-%m-%Y') AS dates FROM comments WHERE article_id = $id";
        $result = $con->query($stmt);
        $sql    = null;
        if ($result->num_rows > 0) {
            $sql = $result;
        } else {
            $sql = "No Comments";
        }

        $this->db->CloseCon();

        return $sql;
    }

    public function delcommets($commentid)
    {
        $con    = $this->db->OpenCon();
        $id     = $con->real_escape_string($commentid);
        $sql    = "DELETE FROM comments WHERE comment_id = '$id'";
        $result = $con->query($sql);

        if (!$result) {

            $error = $con->error;

            $this->db->CloseCon();
            return $error;
        } else {
            if ($del->DeleteNode($id) === true) {
                $result = "true";
            }
        }

        return $result;
    }

    public function countcoments($id)
    {
        $con = $this->db->OpenCon();

        $stmt = "SELECT COUNT(comment_id) as total FROM comments WHERE article_id = $id";

        $result = $con->query($stmt);

        if ($result->num_rows == 1) {
             while ($row = $result->fetch_assoc()) {
                $sql = $row['total'];
            }
        } else {
            $sql = 0;
        }

        $this->db->CloseCon();

        return $sql;
    } 
}
