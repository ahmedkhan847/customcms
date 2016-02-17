<?php
include 'DbConnection.php';

class comment
{
    private $db;
    public function __construct()
    {
        $this->db = new DbConnection();
    }

    public function addcomment($aid, $cname, $cemail, $cweb, $comment)
    {
        $con     = $this->db->OpenCon();
        $name    = $con->real_escape_string($cname);
        $email   = $con->real_escape_string($cemail);
        $web     = $con->real_escape_string($cweb);
        $comment = $con->real_escape_string($comment);
        $query   = $con->prepare("INSERT INTO comments(article_id, cname, cemail, cweb, comment) VALUES ( ( SELECT article_id FROM articles WHERE articles.article_id = ? ), ?,? , ? )");
        $query->bind_param("issss", $aid, $name, $email, $web, $comment);
        $result = $query->execute();
        if (!$result) {

            $error = $con->error;

            $this->db->CloseCon();
            return $error;
        }
        $this->db->CloseCon();
        $result = 'true';
        return $result;

    }

}
