<?
echo $data = $_POST[place];
//echo $data = "1,4,敬業2-208,11,1,敬業2-208,";
$cut_data = explode(",",$data);

/*
$head = '<table width="0" border="1" bordercolor="#93b0cc" cellspacing="0" align="center" style="margin-top:12px">
  <tr align="center" style="font-family:Verdana;font-size:14px">
    <td>&nbsp;</td>
    <td>星期一</td>
    <td>星期二</td>
    <td>星期三</td>
    <td>星期四</td>
    <td>星期五</td>
    <td>星期六</td>
    <td>星期日</td>
  </tr>';

$table .= $head;
$data_index = 0;
for($i=1;$i<=13;$i++){
	if($i == 5){
		$table .= '<tr>
    <td colspan="8" align="center" style="font-family:Verdana;font-size:14px">午餐時間</td>
    </tr>';
	}
	$table .= '<tr style="font-family:Verdana;font-size:14px">
    <td align="center">第 '.$i.' 節</td>';
	for($j=1;$j<=7;$j++){
		$table .= '
		<td>';
		if($cut_data[$data_index] == $j && $cut_data[$data_index+1] == $i){
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
*/

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
for($i=1;$i<=13;$i++){
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
