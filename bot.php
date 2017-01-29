<?php
$access_token = 'MD2dEPMURretUcV/8Gy3euEQDd8DecNipGykcYblT0Z+zVtquny3uwsIg+kt6kEF+JmkZ8fNVdWozJZwdekkR0NBg38aal0mg35mUW1064/CWQnZuCew7HNiqw8I0tL6PNGPfucx1EIwT8Zo38DcwwdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
		        $time=date('H:i:s');
			$a=$event['message']['text'];
			if($a=='สบายดีไม'){
			$text="ฉันสบายดี ระบบของฉันยังทำงานได้อย่างดีเยี่ยม ขอบคุณที่ห่วงใยครับ เเล้วคุณสบายดีไมครับ ^^";
			}else if($a=="ฉันสบายดี"){
		           $text="ดีเเล้วที่เห็นคุณสบายดี";
			}else if($a=="ช่วงนี้ไม่ค่อยสบายใจเลย"){
			   $text="เป็นไรหรอครับ";	
			}else if($a=="ฉันรู้สึกเหงา"){
			  $text= "ไม่ต้องเหงาไปหรอก ฉันพร้อมที่จะคุยกับคุณเสมอ";
			}else if($a=="โดนผู้ชายเทมาอ่ะ"){
			  $text="ไม่ต้องเสียใจไปนะ มีอะไรคุยกับเราได้นะเราพร้อมรับฟังเสมอ ^^";
			}else if($a=="โดนผู้หญิงเทมา")
			{
			  $text="ไม่ต้องเสียใจไปเลย เพื่อน เราอยู่รับนายเสมอ";
			}else if($a="กี่โมงเเล้ว"){
			      $text=$time;	
			}
			
			else {
			 $text=$event['message']['text'];
			}
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
			echo $result . "\r\n";
		}else if ($event['type'] == 'message' && $event['message']['type'] == 'sticker') {
			// Get text sent
			$text = "สวัสดี เราชื่อ Namesis ยินดีที่ได้รู้จักครับ ^^";
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
