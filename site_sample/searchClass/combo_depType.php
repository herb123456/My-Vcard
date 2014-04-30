<?
require_once("./lib/config.php");
require_once("./lib/oracle_dbclass.php");
require("./lib/JSON.php");
$json = new Services_JSON();

if(isset($_REQUEST[aca_v])){$yr = $_REQUEST[aca_v];}else{$yr = $_REQUEST[base_aca_v];}
if(isset($_REQUEST[sem_v])){$sem = $_REQUEST[sem_v];}else{$sem = $_REQUEST[base_sem_v];}


$sql = "SELECT * FROM \"DEPTYPEDATA_TAB\" WHERE YR='".$yr."' AND SEM='".$sem."' ORDER BY NAME DESC";
//echo $sql;
$result = $db->query($sql);
while($data = $db->getarray($result)){
	$arr[] = $data;
}
$data_rows_count = count($arr);
//print_r($arr);
echo $_GET['callback'].'({"totalCount":"'.$data_rows_count.'","data":'.$json->encode($arr).'})';

?>