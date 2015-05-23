<?php

require_once './Textmessage.php';
require_once '../config/config.php';

$txtobject= new Textmessage();

$text_msg_id = $_POST['id'];
$nm = $_POST['value']; //new_message
$om = $txtobject::fetchMessageFromMsgId($DBcon, $text_msg_id); //old_message

$msgBody = walkThroughMessage($nm, $om);
$txtobject::saveToDB($DBcon, $text_msg_id, $msgBody);
echo walkThroughMessage($nm, $om);

function walkThroughMessage($new_message, $orig_message) {
		$returnString;
		$rChar = '&#9632';
		
		//compare whole string (whole txt-msg) hash to make sure they're identical
		if 	(md5($orig_message) == md5($new_message)) {
		
			$returnString = $orig_message; //if true, new msg == old message
			return $returnString;
		} 
		
		if ($new_message == NULL) { //2dn condition: if null, whole msg is redacted)			
			$returnString = $rChar.$rChar.$rChar.$rChar.$rChar.'(redacted)'.$rChar.$rChar.$rChar.$rChar.$rChar;
			return $returnString;
		}
		
		$orig_message_char = str_split_unicode($orig_message,1);
		$new_message_char = str_split_unicode($new_message,1);
		$master_array = array_fill(0, count($orig_message_char), $rChar);
		

		
		for($ww = 0; $ww < count($master_array); $ww++) {
			
		while ($new_message_char[$ww] != $orig_message_char[$ww] && $new_message_char[$ww] == ' ') {
				unset($new_message_char[$ww]);
				$new_message_char[current($new_message_char)] = $new_message_char[current($new_message_char)+1];
				next($new_message_char);
		}
					
			
		if ($orig_message_char[$ww] == ' ') {
				$master_array[$ww] = ' ';
		}
			
	
		if ($new_message_char[$ww] == $orig_message_char[$ww]) {
				$master_array[$ww] = $orig_message_char[$ww];
		}
						
			}
			$returnString = (implode($master_array));
			return $returnString;
		
}	

function str_split_unicode($str, $l = 0) { //function to properly str_split utf8 charsets
    if ($l > 0) {
        $ret = array();
        $len = mb_strlen($str, "UTF-8");
        for ($i = 0; $i < $len; $i += $l) {
            $ret[] = mb_substr($str, $i, $l, "UTF-8");
        }
        return $ret;
    }
}

	
?>