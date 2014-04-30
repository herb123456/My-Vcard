<?
//$data = "1,2,演算法,體育102,1,5,哲學－基督教概論,敬業2-411,2,1,線性代數,勵志2-104,2,2,作業系統,電算406,2,3,資料庫,電算406,2,5,哲學－基督教概論,敬業2-411,3,1,線性代數,勵志2-104,3,2,作業系統,電算406,3,3,資料庫,電算406,3,4,演算法,體育104,3,5,藝術與人文－立體繪本設計與製作,美勞203,4,1,線性代數,勵志2-104,4,2,作業系統,電算406,4,3,資料庫,電算406,4,4,演算法,體育104,4,5,藝術與人文－立體繪本設計與製作,美勞203,5,1,休閒運動－桌球,體育館,6,1,休閒運動－桌球,體育館,7,1,社會議題－婚姻與家庭性教育,護理教室,8,1,社會議題－婚姻與家庭性教育,護理教室,10,2,資訊安全,電算406,11,2,資訊安全,電算406,12,2,資訊安全,電算406";
echo $data = "1,4,敬業2-208,11,1,敬業2-208,";
$cut_data = explode(",",$data);
//print_r($cut_data);

$head = '<table width="0" border="1" bordercolor="#93b0cc" cellspacing="0" cellpadding="5" align="center" style="margin-top:12px">
  <tr align="center" style="font-family:Verdana;font-size:14px">
    <td>&nbsp;</td>
    <td>星期一</td>
    <td>星期二</td>
    <td>星期三</td>
    <td>星期四</td>
    <td>星期五</td>
  </tr>';

$table .= $head;
$data_index = 0;
for($i=1;$i<=12;$i++){
	if($i == 5){
		$table .= '<tr>
    <td colspan="8" align="center" style="font-family:Verdana;font-size:14px">午餐時間</td>
    </tr>';
	}
	$table .= '<tr style="font-family:Verdana;font-size:14px">
    <td>第'.$i.'節</td>';
	for($j=1;$j<=5;$j++){
		$table .= '
		<td align="center">';
		if($cut_data[$data_index] == $i && $cut_data[$data_index+1] == $j){
			$table .= $cut_data[$data_index+2];
			$data_index += 3;
		}else{
			$table .= "&nbsp;";
		}
		$table .= '</td>';
	}
	$table .= '
	</tr>';
}

$table .= '
</table>';
echo $table;
?>