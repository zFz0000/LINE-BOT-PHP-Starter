<?php
$access_token = 'gFj42cIxJjJO14XZXRXliXQSSA2fSnzjncY6dudRY8o/LVoHMXEVh0c1OpBEeI9rrHhZSUFX5g8N4BEz+++4zzaLYNAYpcA5jZI7+wB43Q0LxkynrkUlkRXvFO+Nyxu0z49PtyxKTFvrWLdnHtiETwdB04t89/1O/w1cDnyilFU=';
 
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strUrl = "https://api.line.me/v2/bot/message/reply";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$access_token}";
 
if($arrJson['events'][0]['message']['text'] == "สวัสดี"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $textRand = rand(0,3);
  if($textRand == 0){
	  $arrPostData['messages'][0]['text'] = "สวัสดีเราเอง";
  }else if($textRand == 1){
	  $arrPostData['messages'][0]['text'] = "ใครว่ะ";
  }else if($textRand == 2){
	  $arrPostData['messages'][0]['text'] = "ง่วง";
  }else{
	  $arrPostData['messages'][0]['text'] = "เฮ้อ";
  }
}else if($arrJson['events'][0]['message']['text'] == "ชื่ออะไร"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "หนู";
}else if($arrJson['events'][0]['message']['text'] == "แมวไง"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "image";
  $arrPostData['messages'][0]['originalContentUrl'] = 'https://github.com/swunews/LINE-BOT-PHP-Starter/blob/master/grief-and-loss.jpg?raw=true';
  $arrPostData['messages'][0]['previewImageUrl'] = 'https://github.com/swunews/LINE-BOT-PHP-Starter/blob/master/grief-and-loss_preview.jpg?raw=true';	
}else if($arrJson['events'][0]['message']['text'] == "เข้า"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "template";
  $arrPostData['message'][0]['altText'] = "confrim";
  $arrPostData['template'][0]['button'] = "login";
  //$arrPostData['button'][0]['actions'] = 
  //$arrPostData['message'][0]['type'] = "text",$arrPostData['message'][0]['label'] = "ok",$arrPostData['message'][0]['text'] = "ok",;
}else{
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "sticker";
  $arrPostData['messages'][0]['packageId'] = "1";
  $arrPostData['messages'][0]['stickerId'] = "3";
  $stickerRand = rand(0,9);
  if($stickerRand == 0){
	  $arrPostData['messages'][0]['stickerId'] = "3";
  }else if($stickerRand == 1){
	  $arrPostData['messages'][0]['stickerId'] = "11";
  }else if($stickerRand == 2){
	  $arrPostData['messages'][0]['stickerId'] = "5";
  }else if($stickerRand == 3){
	 $arrPostData['messages'][0]['stickerId'] = "7";
  }else if($stickerRand == 4){
	  $arrPostData['messages'][0]['stickerId'] = "2";
  }else if($stickerRand == 5){
	  $arrPostData['messages'][0]['stickerId'] = "1";
  }else if($stickerRand == 6){
	  $arrPostData['messages'][0]['stickerId'] = "4";
  }else if($stickerRand == 7){
	  $arrPostData['messages'][0]['stickerId'] = "9";
  }else if($stickerRand == 8){
	  $arrPostData['messages'][0]['stickerId'] = "5";
  }else{
	  $arrPostData['messages'][0]['stickerId'] = "6";
  }
}


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
echo "Dee ja";
?>
