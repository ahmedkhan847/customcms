<?php
include "DbConnection.php";
include "searchelastic.php";

class Articles
{

    protected $db = null;
    protected $elastic = null;

    public function __construct()
    {

        $this->db = new DbConnection();
        $this->elastic = new searchelastic();

    }

    public function updatearticle($a_id, $a_content, $a_name, $a_image)
    {
        $update = $this->elastic;
        $con = $this->db->OpenCon();
        $title    = $con->real_escape_string($a_name);
        $content  = $con->real_escape_string($a_content);
        $img      = $con->real_escape_string($imgname);
        $sql = "UPDATE articles SET article_name = '$title' , article_content = '$content', img = '$image' WHERE article_id = '$a_id'";

        $result = $con->query($sql);
        if (!$result) {
            $error = $con->error;

            $this->db->CloseCon();
            return $error;
        }
        else
        {
            if($updat->UpdateNode($a_id, $con) === true)
            {
                $this->db->CloseCon();
                return "true";
            }
        }

        

    }

    public function getarticleforupdate($aid)
    {
        $con = $this->db->OpenCon();

        $stmt = "SELECT * FROM articles WHERE article_id = $aid";

        $result = $con->query($stmt);

        if ($result->num_rows == 1) {
            $sql = $result;
        } else {
            $sql = "No articles";
        }

        $this->db->CloseCon();

        return $sql;
    }

    public function friendly_seo_string($vp_string)
    {

        $vp_string = trim($vp_string);

        $vp_string = html_entity_decode($vp_string);

        $vp_string = strip_tags($vp_string);

        $vp_string = strtolower($vp_string);

        $vp_string = preg_replace('~[^ a-z0-9_.]~', ' ', $vp_string);

        $vp_string = preg_replace('~ ~', '-', $vp_string);

        $vp_string = preg_replace('~-+~', '-', $vp_string);

        return $vp_string;
    }

    public function insertarticle($a_name, $a_content, $a_category, $user_name, $imgname)
    {
        $insert = $this->elastic;
        $con      = $this->db->OpenCon();
        $title    = $con->real_escape_string($a_name);
        $content  = $con->real_escape_string($a_content);
        $category = $con->real_escape_string($a_category);
        $img      = $con->real_escape_string($imgname);
        $url      = $this->friendly_seo_string($title);
        $query    = $con->prepare("INSERT INTO articles( article_name, article_content, category_id, img, url ) VALUES( ?, ?, ( SELECT category_id FROM categories WHERE categories.category_id = ? ), ?, ?)");
        $query->bind_param("ssiss", $title, $content, $category, $img, $url);
        $result = $query->execute();
        if (!$result) {

            $error = $con->error;

            $this->db->CloseCon();
            return $error;
        }

        $id    = $con->insert_id;
        $query = $con->prepare("INSERT INTO article(article_id,user_Id) VALUES ((SELECT article_id FROM articles where articles.article_id = ?),(SELECT user_id FROM users WHERE users.user_name = ?))");
        $query->bind_param("is", $id, $user_name);
        $result = $query->execute();

        if (!$result) {

            $error = $con->error;

            $this->db->CloseCon();
            return $error;
        }
        else
        {
            if($insert->InsertNode($id,$con) === true)
            {
                $result = 'true';
            }
        }
        $this->db->CloseCon();
        
        return $result;
    }

    public function getcategories()
    {

        $con    = $this->db->OpenCon();
        $sql    = "SELECT * FROM categories";
        $result = $con->query($sql);
        if ($result->num_rows == 0) {
            $result = "error getting files";
        }
        $this->db->CloseCon();
        return $result;
    }

    public function articlelist($username)
    {
        $con  = $this->db->OpenCon();
        $name = $con->real_escape_string($username);

        $stmt = "SELECT article.article_id, articles.article_name,articles.article_content,categories.category_name
			 FROM users
			 INNER JOIN article
			 ON article.user_Id = users.user_id
			 INNER JOIN articles
			 ON articles.article_id = article.article_id
			 INNER JOIN categories
			 ON categories.category_id = articles.category_id
			 WHERE users.user_name = '$name'";

        $result = $con->query($stmt);

        if ($result->num_rows > 0) {
            $sql = $result;
        } else {
            $sql = "No articles";
        }

        $this->db->CloseCon();

        return $sql;
    }

    public function limit_text($text)
    {
        $new  = strip_tags($text);
        $str2 = explode(' ', $new);
        //print_r($str2);
        $result = null;

        for ($i = 0; $i < sizeof($str2); $i++) {

            if ($i == 50) {
                break;
            }
            $result .= $str2[$i] . " ";

        }
        return $result;

    }

    public function deletearticle($id)
    {
        $del = $this->elastic;
        $con    = $this->db->OpenCon();
        $sql    = "DELETE FROM articles WHERE article_id = '$id'";
        $result = $con->query($sql);

        if (!$result) {

            $error = $con->error;

            $this->db->CloseCon();
            return $error;
        }
        else
        {
            if($del->DeleteNode($id) === true)
            {
                $result = "true";
            }
        }

        

        return $result;
    }

    public function getarticle($articleid)
    {
        $con = $this->db->OpenCon();

        $stmt = "SELECT articles.article_name,articles.article_content,categories.category_name,articles.img,users.u_fname,users.u_lname,DATE_FORMAT(articles.date,'%d %b, %Y') as dates
			 FROM article
			 INNER JOIN users
			 ON users.user_id = article.user_Id
			 INNER JOIN articles
			 ON articles.article_id = article.article_id
			 INNER JOIN categories
			 ON categories.category_id = articles.category_id
			 WHERE articles.article_id = '$articleid'";

        $result = $con->query($stmt);

        if ($result->num_rows == 1) {
            $sql = $result;
        } else {
            $sql = "No articles";
        }

        $this->db->CloseCon();

        return $sql;

    }

    public function viewarticles()
    {
        $con = $this->db->OpenCon();

        $stmt = "SELECT articles.article_id,articles.article_name,articles.article_content,articles.url,categories.category_name,articles.img,users.u_fname,users.u_lname,DATE_FORMAT(articles.date,'%d-%m-%Y') AS dates FROM article INNER JOIN users ON users.user_id = article.user_Id INNER JOIN articles ON articles.article_id = article.article_id INNER JOIN categories ON categories.category_id = articles.category_id ";

        $result = $con->query($stmt);

        if ($result->num_rows != 0) {
            $sql = $result;
        } else {
            $sql = $con->error;
        }

        $this->db->CloseCon();

        return $sql;

    }

}
