<?php

$param = $argv[1];

switch ($param) {
	case 'news':
		$id = 9;
		migrateContent($id);
		break;
	case 'event':
		$id = 12;
		migrateContent($id, 'event');
		break;
	case 'tips':
		$id = 14;
		migrateContent($id, 'tips');
		break;
	case 'fdrnews':
		$id = 13;
		migrateContent($id, 'fdrnews');
		break;
	case 'club':
		migrateClub();
		break;
	case 'motor':
		migrateMotor();
		break;
	
	default:
		echo 'kosong';
		break;
}


function migrateContent($id, $cat='news')
{
	wigo();
	$dataArr = [];
	$sql = "select * from wigo_fdr.content where cl_id = {$id}";
	$res = mysql_query($sql);
	while($data = mysql_fetch_assoc($res)) {
		$dataArr[] = $data;
	}
	// echo '<pre>';
	// print_r($dataArr);
	// exit;
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
			$values[] = "'{$cat}'";
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
			$res = mysql_query($ins);
			$lastId = mysql_insert_id();
			// exit;
			
			if ($id == 9) {
				$getImage = "select * from wigo_fdr.content_gallery where c_id = ".$value['c_id'];
				$resImage = mysql_query($getImage);
				if ($resImage) {
					while($image = mysql_fetch_assoc($resImage)) {
						$title = "'".$image['cg_name']."'";
						$file = "'".$image['cg_image']."'";
						$contentid = $lastId;
						$sort = $image['cg_order'];
						if ($image['cg_status'] == 'Deleted') $status = "'deleted'";
						if ($image['cg_status'] == 'Suspended') $status = "'unpublish'";
						if ($image['cg_status'] == 'Active') $status = "'publish'";
						$author = 7;
						$created_at = "'".$image['cg_entry']."'";
						$insImage = "insert into tire.news_content_repos (news_content_id, title, file, sort, status, author_id, created_at) values ({$contentid}, {$title}, {$file}, {$sort}, {$status}, {$author}, {$created_at})";
						
						$resIns = mysql_query($insImage);
					}
				}
			}
			
			
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

function migrateClub()
{
	wigo();
	$dataArr = [];

	$sql = "select * from wigo_fdr.club";
	$res = mysql_query($sql);

	$fields = ['name','email','logo','password','admin_name','image_cover','intro','description','address','contact','website','fb','twitter','other_socmed','status','created_at'];

	$qField = implode(',',$fields);
	$i = 1;
	while($data = mysql_fetch_assoc($res)) {
		
		$value = [];

		$value[] = "'".$data['club_name']."'";
		$value[] = "'".$data['club_email']."'";
		$value[] = "'".$data['club_logo']."'";
		$value[] = "'".$data['club_pass']."'";
		$value[] = "'".$data['club_admin_name']."'";
		$value[] = "'".$data['club_mainphoto']."'";
		$value[] = "'".$data['club_intro']."'";
		$value[] = "'".$data['club_desc']."'";
		$value[] = "'".$data['club_address']."'";
		$value[] = "'".$data['club_contact']."'";
		$value[] = "'".$data['club_website']."'";
		$value[] = "'".$data['club_facebook']."'";
		$value[] = "'".$data['club_twitter']."'";
		$value[] = "'".$data['club_milis']."'";
		if ($data['club_status'] == 'Deleted') $value[] = "'deleted'";
		if ($data['club_status'] == 'Suspended') $value[] = "'pending'";
		if ($data['club_status'] == 'Active') $value[] = "'approved'";
		$value[] = "'".$data['club_entry']."'";

		$qValue = implode(',', $value);
		$insClub = "insert into tire.clubs ({$qField}) values ({$qValue})";
		$resIns = mysql_query($insClub);

		echo "record -".$i; 
		echo "\n";
		$i++;
		if ($i == 100) {
			$i = 0;
			sleep(1);	
		} 
	}

}

function migrateMotor()
{
	// insert brand
	$newData = [];
	$sql = "select mm.*, mb.mb_name as brand, mt.mt_name as type from wigo_fdr.motor_model as mm 
			left join wigo_fdr.motor_brand as mb on mm.mb_id = mb.mb_id 
			left join wigo_fdr.motor_type as mt on mm.mt_id = mt.mt_id ";
	$res = fetch($sql);
	if ($res) {
		foreach ($res as $key => $value) {
			$motorType[$value['type']] = 1;
			$motorBrand[$value['brand']] = 1;
			$newData[] = $value;
		}
		
		$typeid = [];
		if ($motorType) {
			foreach ($motorType as $key => $value) {
				$insT = "insert into tire.motor_types (name) values ('".$key."')";
				$resT = mysql_query($insT);
				$typeid[$key] = mysql_insert_id();
			}
		}

		$brandid = [];
		if ($motorBrand) {
			foreach ($motorBrand as $key => $value) {
				$insB = "insert into tire.motor_brands (name) values ('".$key."')";
				$resB = mysql_query($insB);
				$brandid[$key] = mysql_insert_id();
			}
		}

		$i = 1;
		foreach ($newData as $key => $value) {
			
			if ($value['mm_status'] == 'Active') $status = 'publish';
			else $status = 'unpublish';

			$insM = "insert into tire.motor_models (name, motor_brand_id, motor_type_id, created_at, status) 
					values ('".$value['mm_name']."', ".$brandid[$value['brand']].", ".$typeid[$value['type']].", '".$value['mm_entry']."', '{$status}')";
			// echo $insM;
			$resM = mysql_query($insM);

			echo "record -".$i; 
			echo "\n";
			$i++;
			if ($i == 100) {
				$i = 0;
				sleep(1);	
			} 
		}
	}


	// print_r($newData);
}

function migrateTire()
{
	
}

function wigo()
{
	$link = mysql_connect('localhost', 'root','');
}

function local()
{
	mysql_connect('localhost', 'root','');
	mysql_select_db('tire');
}

function fetch($sql)
{
	wigo();
	$dataArr = [];
	$res = mysql_query($sql);
	while($data = mysql_fetch_assoc($res)) {
		$dataArr[] = $data;
	}

	return $dataArr;
}
?>