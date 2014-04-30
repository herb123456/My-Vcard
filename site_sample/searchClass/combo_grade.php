<?
require_once("./lib/config.php");
require_once("./lib/oracle_dbclass.php");
require("./lib/JSON.php");
$json = new Services_JSON();

$yr = $_REQUEST[aca_v];
$sem = $_REQUEST[sem_v];
$fa_ch = $_REQUEST[ch_fa_v];

$sql = "SELECT * FROM \"CLASSDATA_TAB\" where YR='".$yr."' and SEM='".$sem."' and DEPTGRPCODE='".$fa_ch."'";
//echo $sql;
$result = $db->query($sql);
while($data = $db->getarray($result)){
	$arr[] = $data;
}
$data_rows_count = count($arr);
//print_r($arr);
echo $_GET['callback'].'({"totalCount":"'.$data_rows_count.'","data":'.$json->encode($arr).'})';

?>