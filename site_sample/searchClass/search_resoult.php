<?
require_once("./lib/config.php");
require_once("./lib/oracle_dbclass.php");
require("./lib/JSON.php");
$json = new Services_JSON();

$start = $_REQUEST[start];
$end = $_REQUEST[limit];
//----------------------------------------------------
$yr = $_REQUEST[aca_v];
$sem = $_REQUEST[sem_v];
if($_REQUEST[cl_code] != ""){$classCode = $_REQUEST[cl_code];}else{$classCode = "%";}
//---------------------------------------------------------------
if($_REQUEST[tea_name] != ""){$teacherName = $_REQUEST[tea_name];}else{$teacherName = "%";}
if($_REQUEST[cl_name] != ""){$className = $_REQUEST[cl_name];}else{$className = "%";}
//-----------------------------------------------------------------------------------------------------------------
if($_REQUEST[rm_code] != ""){$roomCode = $_REQUEST[rm_code];}else{$roomCode = "%";}

//學年度和學期為必填
if($yr == "" || $sem == ""){
	exit;
}
/*
echo $sql = "SELECT CLASSCSOPEN_TAB.YR, CLASSCSOPEN_TAB.SEM, CLASSCSOPEN_TAB.CLASSCODE, CSDATA_TAB.NAME AS csDataName, CSOPEN_TAB.SITESEAT, CSOPEN_TAB.TAKESEAT, ROOMDATA_TAB.NAME AS roomName, ROOMDATA_TAB.ROOMCODE, CSARRAN_TAB.COORDWK, CSARRAN_TAB.COORDJE, TEADATA_TAB.NAME AS teacherName, CLASSDATA_TAB.NAME as depName
FROM CLASSDATA_TAB INNER JOIN ((TEADATA_TAB INNER JOIN LECCSOPEN_TAB ON (TEADATA_TAB.YR = LECCSOPEN_TAB.YR) AND (TEADATA_TAB.SEM = LECCSOPEN_TAB.SEM) AND (TEADATA_TAB.LECCODE = LECCSOPEN_TAB.LECCODE)) INNER JOIN (CLASSCSOPEN_TAB INNER JOIN ((CSARRAN_TAB INNER JOIN (CSOPEN_TAB INNER JOIN CSDATA_TAB ON (CSOPEN_TAB.CSCODE = CSDATA_TAB.CSCODE) AND (CSOPEN_TAB.SEM = CSDATA_TAB.SEM) AND (CSOPEN_TAB.YR = CSDATA_TAB.YR)) ON (CSARRAN_TAB.CGCODE = CSOPEN_TAB.CGCODE) AND (CSARRAN_TAB.SEM = CSOPEN_TAB.SEM) AND (CSARRAN_TAB.YR = CSOPEN_TAB.YR)) INNER JOIN ROOMDATA_TAB ON (CSARRAN_TAB.SEM = ROOMDATA_TAB.SEM) AND (CSARRAN_TAB.YR = ROOMDATA_TAB.YR) AND (CSARRAN_TAB.ROOMCODE = ROOMDATA_TAB.ROOMCODE)) ON (CLASSCSOPEN_TAB.YR = CSARRAN_TAB.YR) AND (CLASSCSOPEN_TAB.SEM = CSARRAN_TAB.SEM) AND (CLASSCSOPEN_TAB.CGCODE = CSARRAN_TAB.CGCODE)) ON (LECCSOPEN_TAB.CGCODE = CLASSCSOPEN_TAB.CGCODE) AND (LECCSOPEN_TAB.YR = CLASSCSOPEN_TAB.YR) AND (LECCSOPEN_TAB.SEM = CLASSCSOPEN_TAB.SEM)) ON (CLASSDATA_TAB.CLASSCODE = CLASSCSOPEN_TAB.CLASSCODE) AND (CLASSDATA_TAB.SEM = CLASSCSOPEN_TAB.SEM) AND (CLASSDATA_TAB.YR = CLASSCSOPEN_TAB.YR)
GROUP BY CLASSCSOPEN_TAB.YR, CLASSCSOPEN_TAB.SEM, CLASSCSOPEN_TAB.CLASSCODE, CSDATA_TAB.NAME, CSOPEN_TAB.SITESEAT, CSOPEN_TAB.TAKESEAT, ROOMDATA_TAB.NAME, CSARRAN_TAB.COORDWK, CSARRAN_TAB.COORDJE, TEADATA_TAB.NAME, CLASSDATA_TAB.NAME
HAVING (((CLASSCSOPEN_TAB.YR)='".$yr."') AND ((CLASSCSOPEN_TAB.SEM)='".$sem."') AND ((CLASSCSOPEN_TAB.CLASSCODE) like '".$classCode."') AND ((TEADATA_TAB.NAME) like '%".$teacherName."%') AND ((CSDATA_TAB.NAME) like '%".$className."%') AND ((ROOMDATA_TAB.ROOMCODE) like '".$roomCode."'))
ORDER BY CSDATA_TAB.NAME, CSARRAN_TAB.COORDWK, CSARRAN_TAB.COORDJE";
*/
$sql = "SELECT CLASSCSOPEN_TAB.YR, CLASSCSOPEN_TAB.SEM, CLASSCSOPEN_TAB.CLASSCODE, CSDATA_TAB.NAME AS csDataName, CSOPEN_TAB.SITESEAT, CSOPEN_TAB.TAKESEAT, ROOMDATA_TAB.NAME AS roomName, CSARRAN_TAB.COORDWK, CSARRAN_TAB.COORDJE, TEADATA_TAB.NAME AS teacherName, CLASSDATA_TAB.NAME AS depName, ROOMDATA_TAB.ROOMCODE, CSARRAN_TAB.CGCODE
FROM CLASSDATA_TAB INNER JOIN ((TEADATA_TAB INNER JOIN LECCSOPEN_TAB ON (TEADATA_TAB.LECCODE = LECCSOPEN_TAB.LECCODE) AND (TEADATA_TAB.SEM = LECCSOPEN_TAB.SEM) AND (TEADATA_TAB.YR = LECCSOPEN_TAB.YR)) INNER JOIN (CLASSCSOPEN_TAB INNER JOIN ((CSARRAN_TAB INNER JOIN (CSOPEN_TAB INNER JOIN CSDATA_TAB ON (CSOPEN_TAB.YR = CSDATA_TAB.YR) AND (CSOPEN_TAB.SEM = CSDATA_TAB.SEM) AND (CSOPEN_TAB.CSCODE = CSDATA_TAB.CSCODE)) ON (CSARRAN_TAB.YR = CSOPEN_TAB.YR) AND (CSARRAN_TAB.SEM = CSOPEN_TAB.SEM) AND (CSARRAN_TAB.CGCODE = CSOPEN_TAB.CGCODE)) INNER JOIN ROOMDATA_TAB ON (CSARRAN_TAB.ROOMCODE = ROOMDATA_TAB.ROOMCODE) AND (CSARRAN_TAB.YR = ROOMDATA_TAB.YR) AND (CSARRAN_TAB.SEM = ROOMDATA_TAB.SEM)) ON (CLASSCSOPEN_TAB.CGCODE = CSARRAN_TAB.CGCODE) AND (CLASSCSOPEN_TAB.SEM = CSARRAN_TAB.SEM) AND (CLASSCSOPEN_TAB.YR = CSARRAN_TAB.YR)) ON (LECCSOPEN_TAB.SEM = CLASSCSOPEN_TAB.SEM) AND (LECCSOPEN_TAB.YR = CLASSCSOPEN_TAB.YR) AND (LECCSOPEN_TAB.CGCODE = CLASSCSOPEN_TAB.CGCODE)) ON (CLASSDATA_TAB.YR = CLASSCSOPEN_TAB.YR) AND (CLASSDATA_TAB.SEM = CLASSCSOPEN_TAB.SEM) AND (CLASSDATA_TAB.CLASSCODE = CLASSCSOPEN_TAB.CLASSCODE)
GROUP BY CLASSCSOPEN_TAB.YR, CLASSCSOPEN_TAB.SEM, CLASSCSOPEN_TAB.CLASSCODE, CSDATA_TAB.NAME, CSOPEN_TAB.SITESEAT, CSOPEN_TAB.TAKESEAT, ROOMDATA_TAB.NAME, CSARRAN_TAB.COORDWK, CSARRAN_TAB.COORDJE, TEADATA_TAB.NAME, CLASSDATA_TAB.NAME, ROOMDATA_TAB.ROOMCODE, CSARRAN_TAB.CGCODE
HAVING (((CLASSCSOPEN_TAB.YR)='".$yr."') AND ((CLASSCSOPEN_TAB.SEM)='".$sem."') AND ((CLASSCSOPEN_TAB.CLASSCODE) like '".$classCode."') AND ((TEADATA_TAB.NAME) like '%".$teacherName."%') AND ((CSDATA_TAB.NAME) like '%".$className."%') AND ((ROOMDATA_TAB.ROOMCODE) like '".$roomCode."'))
ORDER BY CLASSCSOPEN_TAB.CLASSCODE, CSDATA_TAB.NAME, CSARRAN_TAB.COORDJE, CSARRAN_TAB.CGCODE
";
/*
$sql = "SELECT CLASSCSOPEN_TAB.YR, CLASSCSOPEN_TAB.SEM, CLASSCSOPEN_TAB.CLASSCODE, CSDATA_TAB.NAME AS csDataName, CSOPEN_TAB.SITESEAT, CSOPEN_TAB.TAKESEAT, ROOMDATA_TAB.NAME AS roomName, CSARRAN_TAB.COORDWK, CSARRAN_TAB.COORDJE, TEADATA_TAB.NAME AS teacherName, CLASSDATA_TAB.NAME AS depName, ROOMDATA_TAB.ROOMCODE, CSARRAN_TAB.CGCODE
FROM CLASSDATA_TAB INNER JOIN ((TEADATA_TAB INNER JOIN LECCSOPEN_TAB ON (TEADATA_TAB.LECCODE = LECCSOPEN_TAB.LECCODE) AND (TEADATA_TAB.SEM = LECCSOPEN_TAB.SEM) AND (TEADATA_TAB.YR = LECCSOPEN_TAB.YR)) INNER JOIN (CLASSCSOPEN_TAB INNER JOIN ((CSARRAN_TAB INNER JOIN (CSOPEN_TAB INNER JOIN CSDATA_TAB ON (CSOPEN_TAB.YR = CSDATA_TAB.YR) AND (CSOPEN_TAB.SEM = CSDATA_TAB.SEM) AND (CSOPEN_TAB.CSCODE = CSDATA_TAB.CSCODE)) ON (CSARRAN_TAB.YR = CSOPEN_TAB.YR) AND (CSARRAN_TAB.SEM = CSOPEN_TAB.SEM) AND (CSARRAN_TAB.CGCODE = CSOPEN_TAB.CGCODE)) INNER JOIN ROOMDATA_TAB ON (CSARRAN_TAB.ROOMCODE = ROOMDATA_TAB.ROOMCODE) AND (CSARRAN_TAB.YR = ROOMDATA_TAB.YR) AND (CSARRAN_TAB.SEM = ROOMDATA_TAB.SEM)) ON (CLASSCSOPEN_TAB.CGCODE = CSARRAN_TAB.CGCODE) AND (CLASSCSOPEN_TAB.SEM = CSARRAN_TAB.SEM) AND (CLASSCSOPEN_TAB.YR = CSARRAN_TAB.YR)) ON (LECCSOPEN_TAB.SEM = CLASSCSOPEN_TAB.SEM) AND (LECCSOPEN_TAB.YR = CLASSCSOPEN_TAB.YR) AND (LECCSOPEN_TAB.CGCODE = CLASSCSOPEN_TAB.CGCODE)) ON (CLASSDATA_TAB.YR = CLASSCSOPEN_TAB.YR) AND (CLASSDATA_TAB.SEM = CLASSCSOPEN_TAB.SEM) AND (CLASSDATA_TAB.CLASSCODE = CLASSCSOPEN_TAB.CLASSCODE)
GROUP BY CLASSCSOPEN_TAB.YR, CLASSCSOPEN_TAB.SEM, CLASSCSOPEN_TAB.CLASSCODE, CSDATA_TAB.NAME, CSOPEN_TAB.SITESEAT, CSOPEN_TAB.TAKESEAT, ROOMDATA_TAB.NAME, CSARRAN_TAB.COORDWK, CSARRAN_TAB.COORDJE, TEADATA_TAB.NAME, CLASSDATA_TAB.NAME, ROOMDATA_TAB.ROOMCODE
HAVING (((CLASSCSOPEN_TAB.YR)='".$yr."') AND ((CLASSCSOPEN_TAB.SEM)='".$sem."') AND ((CLASSCSOPEN_TAB.CLASSCODE) like '".$classCode."') AND ((TEADATA_TAB.NAME) like '%".$teacherName."%') AND ((CSDATA_TAB.NAME) like '%".$className."%') AND ((ROOMDATA_TAB.ROOMCODE) like '".$roomCode."'))
ORDER BY CLASSCSOPEN_TAB.CLASSCODE,CSDATA_TAB.NAME, CSARRAN_TAB.COORDJE,  CSARRAN_TAB.CGCODE
";
*/
/*
echo $sql = "select * 
      from ( select a.*, rownum rnum
	       from (
	  SELECT CLASSCSOPEN_TAB.YR, CLASSCSOPEN_TAB.SEM, CLASSCSOPEN_TAB.CLASSCODE, CSDATA_TAB.NAME AS csDataName, CSOPEN_TAB.SITESEAT, CSOPEN_TAB.TAKESEAT, ROOMDATA_TAB.NAME AS roomName, CSARRAN_TAB.COORDWK, CSARRAN_TAB.COORDJE, TEADATA_TAB.NAME AS teacherName, CLASSDATA_TAB.NAME AS depName, ROOMDATA_TAB.ROOMCODE
FROM CLASSDATA_TAB INNER JOIN ((TEADATA_TAB INNER JOIN LECCSOPEN_TAB ON (TEADATA_TAB.LECCODE = LECCSOPEN_TAB.LECCODE) AND (TEADATA_TAB.SEM = LECCSOPEN_TAB.SEM) AND (TEADATA_TAB.YR = LECCSOPEN_TAB.YR)) INNER JOIN (CLASSCSOPEN_TAB INNER JOIN ((CSARRAN_TAB INNER JOIN (CSOPEN_TAB INNER JOIN CSDATA_TAB ON (CSOPEN_TAB.YR = CSDATA_TAB.YR) AND (CSOPEN_TAB.SEM = CSDATA_TAB.SEM) AND (CSOPEN_TAB.CSCODE = CSDATA_TAB.CSCODE)) ON (CSARRAN_TAB.YR = CSOPEN_TAB.YR) AND (CSARRAN_TAB.SEM = CSOPEN_TAB.SEM) AND (CSARRAN_TAB.CGCODE = CSOPEN_TAB.CGCODE)) INNER JOIN ROOMDATA_TAB ON (CSARRAN_TAB.ROOMCODE = ROOMDATA_TAB.ROOMCODE) AND (CSARRAN_TAB.YR = ROOMDATA_TAB.YR) AND (CSARRAN_TAB.SEM = ROOMDATA_TAB.SEM)) ON (CLASSCSOPEN_TAB.CGCODE = CSARRAN_TAB.CGCODE) AND (CLASSCSOPEN_TAB.SEM = CSARRAN_TAB.SEM) AND (CLASSCSOPEN_TAB.YR = CSARRAN_TAB.YR)) ON (LECCSOPEN_TAB.SEM = CLASSCSOPEN_TAB.SEM) AND (LECCSOPEN_TAB.YR = CLASSCSOPEN_TAB.YR) AND (LECCSOPEN_TAB.CGCODE = CLASSCSOPEN_TAB.CGCODE)) ON (CLASSDATA_TAB.YR = CLASSCSOPEN_TAB.YR) AND (CLASSDATA_TAB.SEM = CLASSCSOPEN_TAB.SEM) AND (CLASSDATA_TAB.CLASSCODE = CLASSCSOPEN_TAB.CLASSCODE)
GROUP BY CLASSCSOPEN_TAB.YR, CLASSCSOPEN_TAB.SEM, CLASSCSOPEN_TAB.CLASSCODE, CSDATA_TAB.NAME, CSOPEN_TAB.SITESEAT, CSOPEN_TAB.TAKESEAT, ROOMDATA_TAB.NAME, CSARRAN_TAB.COORDWK, CSARRAN_TAB.COORDJE, TEADATA_TAB.NAME, CLASSDATA_TAB.NAME, ROOMDATA_TAB.ROOMCODE
HAVING (((CLASSCSOPEN_TAB.YR)='".$yr."') AND ((CLASSCSOPEN_TAB.SEM)='".$sem."') AND ((CLASSCSOPEN_TAB.CLASSCODE) like '".$classCode."') AND ((TEADATA_TAB.NAME) like '%".$teacherName."%') AND ((CSDATA_TAB.NAME) like '%".$className."%') AND ((ROOMDATA_TAB.ROOMCODE) like '".$roomCode."'))
ORDER BY CSDATA_TAB.NAME, CSARRAN_TAB.COORDJE
) a
	      where rownum <= ".$end." )
     where rnum >= ".$start;
*/
/*
//依據系所年級來搜尋
if($classCode != ""){
	$sql = "SELECT CLASSCSOPEN_TAB.YR, CLASSCSOPEN_TAB.SEM, CLASSCSOPEN_TAB.CLASSCODE, CSDATA_TAB.NAME AS csDataName, CSOPEN_TAB.SITESEAT, CSOPEN_TAB.TAKESEAT, ROOMDATA_TAB.NAME AS roomName, CSARRAN_TAB.COORDWK, CSARRAN_TAB.COORDJE, TEADATA_TAB.NAME AS teacherName, CLASSDATA_TAB.NAME as depName
FROM CLASSDATA_TAB INNER JOIN ((TEADATA_TAB INNER JOIN LECCSOPEN_TAB ON (TEADATA_TAB.YR = LECCSOPEN_TAB.YR) AND (TEADATA_TAB.SEM = LECCSOPEN_TAB.SEM) AND (TEADATA_TAB.LECCODE = LECCSOPEN_TAB.LECCODE)) INNER JOIN (CLASSCSOPEN_TAB INNER JOIN ((CSARRAN_TAB INNER JOIN (CSOPEN_TAB INNER JOIN CSDATA_TAB ON (CSOPEN_TAB.CSCODE = CSDATA_TAB.CSCODE) AND (CSOPEN_TAB.SEM = CSDATA_TAB.SEM) AND (CSOPEN_TAB.YR = CSDATA_TAB.YR)) ON (CSARRAN_TAB.CGCODE = CSOPEN_TAB.CGCODE) AND (CSARRAN_TAB.SEM = CSOPEN_TAB.SEM) AND (CSARRAN_TAB.YR = CSOPEN_TAB.YR)) INNER JOIN ROOMDATA_TAB ON (CSARRAN_TAB.SEM = ROOMDATA_TAB.SEM) AND (CSARRAN_TAB.YR = ROOMDATA_TAB.YR) AND (CSARRAN_TAB.ROOMCODE = ROOMDATA_TAB.ROOMCODE)) ON (CLASSCSOPEN_TAB.YR = CSARRAN_TAB.YR) AND (CLASSCSOPEN_TAB.SEM = CSARRAN_TAB.SEM) AND (CLASSCSOPEN_TAB.CGCODE = CSARRAN_TAB.CGCODE)) ON (LECCSOPEN_TAB.CGCODE = CLASSCSOPEN_TAB.CGCODE) AND (LECCSOPEN_TAB.YR = CLASSCSOPEN_TAB.YR) AND (LECCSOPEN_TAB.SEM = CLASSCSOPEN_TAB.SEM)) ON (CLASSDATA_TAB.CLASSCODE = CLASSCSOPEN_TAB.CLASSCODE) AND (CLASSDATA_TAB.SEM = CLASSCSOPEN_TAB.SEM) AND (CLASSDATA_TAB.YR = CLASSCSOPEN_TAB.YR)
GROUP BY CLASSCSOPEN_TAB.YR, CLASSCSOPEN_TAB.SEM, CLASSCSOPEN_TAB.CLASSCODE, CSDATA_TAB.NAME, CSOPEN_TAB.SITESEAT, CSOPEN_TAB.TAKESEAT, ROOMDATA_TAB.NAME, CSARRAN_TAB.COORDWK, CSARRAN_TAB.COORDJE, TEADATA_TAB.NAME, CLASSDATA_TAB.NAME
HAVING (((CLASSCSOPEN_TAB.YR)='".$yr."') AND ((CLASSCSOPEN_TAB.SEM)='".$sem."') AND ((CLASSCSOPEN_TAB.CLASSCODE)='".$classCode."'))
ORDER BY CSDATA_TAB.NAME, CSARRAN_TAB.COORDWK, CSARRAN_TAB.COORDJE";
}
//依據教師名稱搜尋
if($teacherName != ""){
	$sql ="SELECT TEADATA_TAB.YR, TEADATA_TAB.SEM, TEADATA_TAB.NAME as teacherName, CSDATA_TAB.NAME as csDataName, ROOMDATA_TAB.NAME as roomName, CSARRAN_TAB.COORDWK, CSARRAN_TAB.COORDJE, CSOPEN_TAB.SITESEAT, CSOPEN_TAB.TAKESEAT, CLASSDATA_TAB.NAME as depName
FROM ROOMDATA_TAB INNER JOIN (((((TEADATA_TAB INNER JOIN LECCSOPEN_TAB ON (TEADATA_TAB.LECCODE = LECCSOPEN_TAB.LECCODE) AND (TEADATA_TAB.YR = LECCSOPEN_TAB.YR) AND (TEADATA_TAB.SEM = LECCSOPEN_TAB.SEM)) INNER JOIN CLASSCSOPEN_TAB ON (LECCSOPEN_TAB.CGCODE = CLASSCSOPEN_TAB.CGCODE) AND (LECCSOPEN_TAB.YR = CLASSCSOPEN_TAB.YR) AND (LECCSOPEN_TAB.SEM = CLASSCSOPEN_TAB.SEM)) INNER JOIN CLASSDATA_TAB ON (CLASSCSOPEN_TAB.CLASSCODE = CLASSDATA_TAB.CLASSCODE) AND (CLASSCSOPEN_TAB.SEM = CLASSDATA_TAB.SEM) AND (CLASSCSOPEN_TAB.YR = CLASSDATA_TAB.YR)) INNER JOIN CSARRAN_TAB ON (CLASSCSOPEN_TAB.CGCODE = CSARRAN_TAB.CGCODE) AND (CLASSCSOPEN_TAB.SEM = CSARRAN_TAB.SEM) AND (CLASSCSOPEN_TAB.YR = CSARRAN_TAB.YR)) INNER JOIN (CSOPEN_TAB INNER JOIN CSDATA_TAB ON (CSOPEN_TAB.SEM = CSDATA_TAB.SEM) AND (CSOPEN_TAB.YR = CSDATA_TAB.YR) AND (CSOPEN_TAB.CSCODE = CSDATA_TAB.CSCODE)) ON (CSARRAN_TAB.CGCODE = CSOPEN_TAB.CGCODE) AND (CSARRAN_TAB.SEM = CSOPEN_TAB.SEM) AND (CSARRAN_TAB.YR = CSOPEN_TAB.YR)) ON (ROOMDATA_TAB.ROOMCODE = CSARRAN_TAB.ROOMCODE) AND (ROOMDATA_TAB.SEM = CSARRAN_TAB.SEM) AND (ROOMDATA_TAB.YR = CSARRAN_TAB.YR)
WHERE (((TEADATA_TAB.YR)='".$yr."') AND ((TEADATA_TAB.SEM)='".$sem."') AND ((TEADATA_TAB.NAME)='".$teacherName."'))
ORDER BY CSDATA_TAB.NAME, CSARRAN_TAB.COORDWK, CSARRAN_TAB.COORDJE";
}
//依據課程名稱搜尋
if($className != ""){
	$sql = "SELECT CLASSCSOPEN_TAB.YR, CLASSCSOPEN_TAB.SEM, CSDATA_TAB.NAME AS csDataName, CLASSCSOPEN_TAB.CLASSCODE, CSOPEN_TAB.SITESEAT, CSOPEN_TAB.TAKESEAT, ROOMDATA_TAB.NAME AS roomName, CSARRAN_TAB.COORDWK, CSARRAN_TAB.COORDJE, TEADATA_TAB.NAME AS teacherName, CLASSDATA_TAB.NAME AS depName
FROM CLASSDATA_TAB INNER JOIN ((TEADATA_TAB INNER JOIN LECCSOPEN_TAB ON (TEADATA_TAB.LECCODE = LECCSOPEN_TAB.LECCODE) AND (TEADATA_TAB.SEM = LECCSOPEN_TAB.SEM) AND (TEADATA_TAB.YR = LECCSOPEN_TAB.YR)) INNER JOIN (CLASSCSOPEN_TAB INNER JOIN ((CSARRAN_TAB INNER JOIN (CSOPEN_TAB INNER JOIN CSDATA_TAB ON (CSOPEN_TAB.YR = CSDATA_TAB.YR) AND (CSOPEN_TAB.SEM = CSDATA_TAB.SEM) AND (CSOPEN_TAB.CSCODE = CSDATA_TAB.CSCODE)) ON (CSARRAN_TAB.YR = CSOPEN_TAB.YR) AND (CSARRAN_TAB.SEM = CSOPEN_TAB.SEM) AND (CSARRAN_TAB.CGCODE = CSOPEN_TAB.CGCODE)) INNER JOIN ROOMDATA_TAB ON (CSARRAN_TAB.ROOMCODE = ROOMDATA_TAB.ROOMCODE) AND (CSARRAN_TAB.YR = ROOMDATA_TAB.YR) AND (CSARRAN_TAB.SEM = ROOMDATA_TAB.SEM)) ON (CLASSCSOPEN_TAB.CGCODE = CSARRAN_TAB.CGCODE) AND (CLASSCSOPEN_TAB.SEM = CSARRAN_TAB.SEM) AND (CLASSCSOPEN_TAB.YR = CSARRAN_TAB.YR)) ON (LECCSOPEN_TAB.SEM = CLASSCSOPEN_TAB.SEM) AND (LECCSOPEN_TAB.YR = CLASSCSOPEN_TAB.YR) AND (LECCSOPEN_TAB.CGCODE = CLASSCSOPEN_TAB.CGCODE)) ON (CLASSDATA_TAB.YR = CLASSCSOPEN_TAB.YR) AND (CLASSDATA_TAB.SEM = CLASSCSOPEN_TAB.SEM) AND (CLASSDATA_TAB.CLASSCODE = CLASSCSOPEN_TAB.CLASSCODE)
GROUP BY CLASSCSOPEN_TAB.YR, CLASSCSOPEN_TAB.SEM, CSDATA_TAB.NAME, CLASSCSOPEN_TAB.CLASSCODE, CSOPEN_TAB.SITESEAT, CSOPEN_TAB.TAKESEAT, ROOMDATA_TAB.NAME, CSARRAN_TAB.COORDWK, CSARRAN_TAB.COORDJE, TEADATA_TAB.NAME, CLASSDATA_TAB.NAME
HAVING (((CLASSCSOPEN_TAB.YR)='".$yr."') AND ((CLASSCSOPEN_TAB.SEM)='".$sem."') AND ((CSDATA_TAB.NAME) like '%".$className."%'))
ORDER BY CSDATA_TAB.NAME, CLASSCSOPEN_TAB.CLASSCODE, CSARRAN_TAB.COORDWK, CSARRAN_TAB.COORDJE";
}
*/
//echo $sql;
$result = $db->query($sql);
$i = 0;

$data = $db->getarray($result);
$arr[] = $data;
$tempClassName = $data[CSDATANAME];
$tempClassCode = $data[CLASSCODE];
$tempCgCode = $data[CGCODE];
do{
	//print_r($data);
	$tempTeacherName = $data[TEACHERNAME];
	if($data[CSDATANAME] == $tempClassName && $tempClassCode == $data[CLASSCODE] && $tempCgCode == $data[CGCODE]){
		if($tempTeacherName != $data[TEACHERNAME]){
			$arr[$i][TEACHER] .= "<br>".$data[TEACHERNAME];
		}else{
			$arr[$i][class_place] .= $data[COORDJE].",".$data[COORDWK].",".$data[ROOMNAME].",";
		}
	}else{
		$i++;
		$arr[$i] = $data;
		$tempClassName = $data[CSDATANAME];
		$tempClassCode = $data[CLASSCODE];
		$tempCgCode = $data[CGCODE];
		$tempTeacherName = $data[TEACHERNAME];
		$arr[$i][class_place] .= $data[COORDJE].",".$data[COORDWK].",".$data[ROOMNAME].",";
	}
	
}while($data = $db->getarray($result));
$data_rows_count = count($arr);
/*
for($i = $start; $i < $start + $end; $i++) {
    $paging_data[] = $arr[$i];
}*/
//print_r($arr);
//print_r($paging_data);
if($arr[0][class_place] != ",,,"){
	echo $_GET['callback'].'({"totalCount":"'.$data_rows_count.'","data":'.$json->encode($arr).'})';
}else{
	echo $_GET['callback'].'({"totalCount":"'.$data_rows_count.'","data":""})';
}
?>