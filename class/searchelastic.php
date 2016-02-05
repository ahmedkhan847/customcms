<?php
require 'vendor/autoload.php';
require 'dbconfig.php';

Class SearchElastic
{
	private $elasticclient = null;

	public function __construct()
	{
		
		$this->elasticclient =Elasticsearch\ClientBuilder::create()->build();
		
	}


	private function Connect()
	{
		$servername = servername;
		$dbname = dbname;
		$username = username;
		$password = password;
		

		try {
		    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		   
		   		return $conn;
		    }
		catch(PDOException $e)
		    {
		    echo $sql . "<br>" . $e->getMessage();
		    }

		
	}

	function InsertData()
	{
		$conn = $this->Connect();
		$client = $this->elasticclient;
		$stmt = $conn->prepare("SELECT articles.article_id,articles.article_name,articles.article_content,articles.img,articles.url,categories.category_name,CONCAT(users.u_fname,' ',users.u_lname) AS username,DATE_FORMAT(articles.date,'%d-%m-%Y') AS dates FROM article INNER JOIN users ON users.user_id = article.user_Id INNER JOIN articles ON articles.article_id = article.article_id INNER JOIN categories ON categories.category_id = articles.category_id "); 
    	$stmt->execute();
    	$params = null;   		
    	
    		
    	 while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    	 {
    	 	$params['body'][] = array(
    	 		'index'=>array(
    	 			'_index' => 'articles',
                    '_type' => 'article',
                    '_id' => $row['article_id']
    	 		)
    	 		);

			    $params['body'][] = [
			        'article_name' => $row['article_name'],
			        'article_content' => $row['article_content'],
			        'article_url' => $row['article_id'],
			        'category_name' => $row['category_name'],
			        'username' => $row['username'],
			        'date' =>$row['dates'],
			        'article_img'=>$row['img'],
			    ];    	
    	  }
    	$responses = $client->bulk($params);  
		print_r($responses);
		$conn = null;
		
	}

	function Search($query)
	{
		$client = $this->elasticclient;
		$result = array();

			$i = 0;
		
			$params = [
	    'index' => 'articles',
	    'type' => 'article',
	    'body' => [
	        'query' => [
	            'match' => ['article_content' => $query]
				        ]
				    ]
				];
			$query = $client->search($params);
			$hits = sizeof($query['hits']['hits']);
			$hit = $query['hits']['hits'];
			$result['searchfound'] = $hits;
				while($i<$hits)
				{
					
					$result['result'][$i] = $query['hits']['hits'][$i]['_source'];
					
					$i++;
				}
		
			



			return $result;
	}

	public function limit_text($text) {
			$new =  strip_tags($text);
			$str2 = explode(' ', $new);
			//$str3 = explode('\r\n', $str2);
			//print_r($str2);
			$result = null;

			for ($i=0; $i <sizeof($str2) ; $i++) { 

				if($i == 50)
				{
					break;
				}	
				$result .= $str2[$i] . " ";

			}
			$result = str_replace('\r\n', '', $result);
        return $result;
        
    }


}




?>