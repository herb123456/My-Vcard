<?
require_once("./lib/config.php");
require_once("./lib/oracle_dbclass.php");
require("./lib/JSON.php");
$json = new Services_JSON();

$year = $_REQUEST[yr];
$sem = $_REQUEST[seme];

$sql = "SELECT * FROM \"BUILDINGDATA_TAB\" where YR='".$year."' and SEM='".$sem."'";
//echo $sql;
$result = $db->query($sql);
$temp[YR] = $year;
$temp[SEM] = $sem;
$temp[BUILDING] = "全部";
$arr[] = $temp;
while($data = $db->getarray($result)){
	$arr[] = $data;
}
$data_rows_count = count($arr);
//print_r($arr);
echo $_GET['callback'].'({"totalCount":"'.$data_rows_count.'","data":'.$json->encode($arr).'})';

?>