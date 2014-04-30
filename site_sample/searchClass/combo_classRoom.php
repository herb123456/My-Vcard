<?
require_once("./lib/config.php");
require_once("./lib/oracle_dbclass.php");
require("./lib/JSON.php");
$json = new Services_JSON();

$yr = $_REQUEST[aca_v];
$sem = $_REQUEST[sem_v];
$building = $_REQUEST[bui_v];
//echo $building;
if($building == "" || $building == "全部"){
	$building = "%";
}
//echo $building;
$sql = "SELECT * FROM \"ROOMDATA_TAB\" where YR='".$yr."' and SEM='".$sem."' and BUILDING like '".$building."' ORDER BY NAME DESC";
//echo $sql;
$result = $db->query($sql);
while($data = $db->getarray($result)){
	$arr[] = $data;
}
$data_rows_count = count($arr);
//print_r($arr);

echo $_GET['callback'].'({"totalCount":"'.$data_rows_count.'","data":'.$json->encode($arr).'})';

?>