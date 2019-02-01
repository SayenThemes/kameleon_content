<a href="?enable=yes"><button><strong>SLIM SHADY</strong></button></a>
<?php 
$dir    = '/var/www/html/kameleon_content/kameleon-demos/homes';
if($_GET["enable"] == 'yes'):
		$jsonFile = file_get_contents('kameleon-demos.json');
		$demosList = json_decode($jsonFile,true);
		foreach ($demosList['homesDemos'] as $demo) {
			if($demo['type'] == 'single'){
				image_create_demo($demo['id']);
			}
			elseif($demo['type'] == 'group'){
				for ($i=1; $i <= $demo['amount']; $i++) { 
					$DID = $demo['id'].'-'.$i;
					image_create_demo($DID);
				}
			}
		}
endif;		

function image_create_demo($demoID){
	$path = '/var/www/html/kameleon_content/kameleon-demos/homes/'.$demoID;
	if(is_dir($path)){		
		rename($path.'/'.$demoID.'.xml',$path.'images.xml');
		//$images = fopen($path.'/images.xml', 'w');		
	}
}

/*
//CREATOR OF THE DEMOS
	if($_GET["enable"] == 'yes'):
		$jsonFile = file_get_contents('kameleon-demos.json');
		$demosList = json_decode($jsonFile,true);
		foreach ($demosList['productsDemos'] as $demo) {
			if($demo['type'] == 'single'){
				create_demo($demo['id']);
			}
			elseif($demo['type'] == 'group'){
				for ($i=1; $i <= $demo['amount']; $i++) { 
					$DID = $demo['id'].'-'.$i;
					create_demo($DID);
				}
			}
		}
	endif;	
function create_demo($demoID){
	$path = '/var/www/html/kameleon-demos/products/'.$demoID;
	if(!is_dir($path)){
		mkdir($path, 0777, true); 
		$content = fopen($path.'/content.xml', 'w');
		//$images = fopen($path.'/images.xml', 'w');
		
	}
}	
*/
?>