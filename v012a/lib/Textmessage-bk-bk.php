<?php
	
	// Class to handle query and fetching of database items
	class Textmessage {
		
		// Properties
		public $msgId;
		public $rowId;
		public $mySqliCon;
		
		public function fetchMessageFromMsgId($_mySqliCon, $_msgId) {
		$mySqliCon = $_mySqliCon;
		$msgId = $_msgId;
		$q =  "SELECT * FROM `msg_table` WHERE `msg_id` = '$msgId'";
		$result = $mySqliCon->query($q);
		$textMsg = $result->fetch_array(MYSQLI_BOTH)['msg'];
		return $textMsg;
		unset($msgId);
		}
		
		public function fetchAllRowAllMsg($_mySqliCon, $_rowId) {
			$mySqliCon = $_mySqliCon;
			$rowId = $_rowId;
			$q =  "SELECT * FROM `msg_table` WHERE `id` = '$rowId'";
			if(($result = $mySqliCon->query($q))) {
				// make an array row[] with the values pulled, index them my number
				//echo $result->num_rows;
				$ar = $mySqliCon->query("SELECT * FROM `msg_table`");
				//echo $ar->num_rows;
				for($x = $rowId; $x <= $ar->num_rows; $x++) {
					$q =  "SELECT * FROM `msg_table` WHERE `id` = '$x'";
					$result = $mySqliCon->query($q);
					$row = $result->fetch_array(MYSQLI_BOTH);
					$msg_id = $row['msg_id'];
					$msg_phone_num = $row['phone_num'];
					$msg_sender = $row['sender'];
					$msg_body = $row['msg'];
					$msg_date = $row['date'];
					$msg_time = $row['time'];
					$msg_name = $row['name'];

					if(self::checkIfExist($mySqliCon, $msg_id)) {
					$tqf = $mySqliCon->query("SELECT * FROM msg_table_edited WHERE msg_id = '$msg_id'");
					$msg_body = $tqf->fetch_array(MYSQLI_BOTH);
					$msg_body = $msg_body['msg'];
					}

					$constructed_div ='<span id="'.$msg_id.'" class="txt-msg thread_'.$msg_phone_num.' sender_'.$msg_sender.' txt-msg-white">'.' '.$msg_body.'</span>';
					echo $constructed_div;
					$result->close();
				}
			}
			unset($rowId);
		}

		public function saveToDB($_mySqliCon, $_msgId, $_msgBody) {
			$mySqliCon = $_mySqliCon;
			$msgId = $_msgId;
			$msgBody = $_msgBody;
			mysqli_query($mySqliCon, "REPLACE INTO msg_table_edited (msg_id, msg) VALUES ('$msgId', '$msgBody')");
			mysqli_close($con);
			unset($msgId);		
		}
		
		private function checkIfExist($_mySqliCon, $_msgId) {
			$mySqliCon = $_mySqliCon;
			$msgId = $_msgId;
			$q = "SELECT * FROM msg_table_edited WHERE msg_id = '$msgId'";
			$tqf = $mySqliCon->query($q);
			$rowc = mysqli_num_rows($tqf);
			if ($rowc == 0) {
			return 0;
			} else {
			return 1;
			}
		}
		
		public function nbOfRows($con) {
		if(($result = $con->query("SELECT * FROM `msg_table` WHERE 1"))) {
			return 1;
			} else {
			return 0;
			}
		}
		
	}
	
?>