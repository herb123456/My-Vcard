<?
header('Content-type: text/html; charset=utf-8');
require_once("./lib/config.php");
require_once("./lib/oracle_dbclass.php");
require("./lib/JSON.php");
$json = new Services_JSON();

$yr = $_REQUEST[aca_v];
$sem = $_REQUEST[sem_v];
$dep = $_REQUEST[dep_v];
$sch = $_REQUEST[fa_v];

$sql = "SELECT * FROM \"DEPTGRPDATA_TAB\" WHERE YR='".$yr."' AND SEM='".$sem."' AND DEPTYPENAME='".$dep."' AND SCHOOLNAME='".$sch."'";
//echo $sql;
$result = $db->query($sql);
while($data = $db->getarray($result)){
	$arr[] = $data;
}
$data_rows_count = count($arr);
//print_r($arr);
echo $_GET['callback'].'({"totalCount":"'.$data_rows_count.'","data":'.$json->encode($arr).'})';

?>