<?php

function wigo(){
	$link = mysql_connect('localhost', 'root','');
	// mysql_select_db('wigo_fdr');
	// mysql_close($link);
}

function local(){
	mysql_connect('localhost', 'root','');
	mysql_select_db('tire');
}

migrateContent();

function migrateContent()
{
	wigo();
	$dataArr = [];
	$sql = "select * from wigo_fdr.content where cl_id = 9";
	$res = mysql_query($sql);
	while($data = mysql_fetch_assoc($res)) {
		$dataArr[] = $data;
	}
	// echo '<pre>';
	// print_r($dataArr);
	// exit;
	// local();
	if ($dataArr) {

		$fields = ['slug','title','brief','description','category','image','banner','author_id','status','view','created_at','updated_at'];
		
		$i = 0;
		foreach ($dataArr as $key => $value) {
			$values = [];
			$ins = false;

			$values[] = "'".$value['c_code']."'";
			$values[] = "'".addslashes($value['c_title'])."'";
			$values[] = "'".addslashes($value['c_content_intro'])."'";
			$values[] = "'".addslashes($value['c_content_full'])."'";
			$values[] = "'news'";
			$values[] = "'".$value['c_banner']."'";
			$values[] = "'".strtolower($value['c_show_banner'])."'";
			$values[] = 7;
			
			if (trim($value['c_publish_status']) == 'Published') $values[] = "'publish'";
			else $values[] = "'unpublish'";

			$values[] = "'".$value['c_hit']."'";
			$values[] = "'".$value['c_entry']."'";
			$values[] = "'".$value['c_entry']."'";
			
			$tmpF = implode(',', $fields);
			$tmpV = implode(',', $values);
			
			$ins = "insert into tire.news_contents ({$tmpF}) values ({$tmpV})";
			// $ins = "select * from tire.news_contents";
			$res = mysql_query($ins);
			
			echo "record -".$i; 
			echo "\n";
			$i++;
			if ($i == 100) {
				$i = 0;
				sleep(1);	
			} 
		}
	}
	
}

?>