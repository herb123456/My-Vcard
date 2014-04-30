<?

class dbClass{ //開始數據庫類
	var $username;
	var $password;
	var $link;
	var $result;

	function dbClass($username,$password){
		$this->username=$username;
		$this->password=$password;
	}
	
	function showError($error){
		echo $error;
		exit;
	}
	
	function connect(){ //這個函數用於連接數據庫
		$this->link = oci_connect($this->username, $this->password);

		if (!$this->link) {
			$e = oci_error();
			$this->showError($e['message']);
		}
		return $this->link;
	}
	/*
	function select(){ //這個函數用於選擇數據庫
		mysql_select_db($this->database,$this->link);
	}
*/
	function query($sql){ //這個函數用於送出查詢語句並返回結果，常用。
		$this->result = oci_parse($this->link, $sql);
		if (!$this->result) {
			$e = oci_error($conn);
			$this->showError($e['message']);
		}

		$r = oci_execute($this->result, OCI_DEFAULT);
		if (!$r) {
			$e = oci_error($stid);
			$this->showError($e['message']);
		}
		return $this->result;
		/*
		if($this->result=mysql_query($sql,$this->link)) return $this->result;
		else {
			$this->halt("SQL語句錯誤： <font color=red>$sql</font><br><br>錯誤信息： ".mysql_error());
			return false;
		}*/
	}

	/*
	以下函數用於從結果取回數組，一般與 while()循環、$db->query($sql) 配合使用，例如：
	$result=query("select * from mytable");
	while($row=$db->getarray($result)){
	echo "$row[id] ";
	}
	*/
	function getarray($result){
		return @oci_fetch_array($result);
	}

	/*
	以下函數用於取得SQL查詢的第一行，一般用於查詢符合條件的行是否存在，例如：
用戶從表單提交的用戶名$username、密碼$password是否在用戶表「user」中，並返回其相應的數組：
	if($user=$db->getfirst("select * from user where username='$username' and password='$password' "))
	echo "歡迎 $username ，您的ID是 $user[id] 。";
	else
	echo "用戶名或密碼錯誤！";
	*/
	function getfirst($sql){
		return @oci_fetch_array($this->query($sql));
	}

	/*
	以下函數返回符合查詢條件的總行數，例如用於分頁的計算等要用到，例如：
	$totlerows=$db->getcount("select * from mytable");
	echo "共有 $totlerows 條信息。";
	*/
	function getcount($result){
		return @oci_num_fields($result); 
	}

	/*
	以下函數用於更新數據庫，例如用戶更改密碼：
	$db->update("update user set password='$new_password' where userid='$userid' ");
	*/
	function update($sql){
		return $this->query($sql);
	}

	/*
	以下函數用於向數據庫插入一行，例如添加一個用戶：
	$db->insert("insert into user (userid,username,password) values (null,'$username','$password')");
	*/
	function insert($sql){
		return $this->query($sql);
	}
	/*
	function getid(){ //這個函數用於取得剛插入行的id
		return mysql_insert_id();
	}*/

	function num_rows($result) {
		return oci_num_rows($resoult);
		//return oci_num_fields($resoult);
		//return $query;
	}
	
	function result($resoult,$num,$field_name){
		return oci_result($resoult,$num,$field_name);
	}
	/*
	function num_fields($query) {
		return oci_num_fields($query);
	}*/
	
	function free_statement($result) {
		return oci_free_statement($query);
	}
		
	function version() {
		return oci_server_version();
	}

	function close() {
		return oci_close();
	}

	function halt($message = '') {
		return $message;
	}	
}

$db=new dbClass("$db_username","$db_password");
$conn = $db->connect();
//$db->select();


?>