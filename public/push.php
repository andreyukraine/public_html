<?php
  // ------------------------ test fcm send. modern ------------------------ //

  // -- шаг 1. вычисляем JWT -- //
$JWT_header = base64_encode('{"alg":"RS256","typ":"JWT"}');

$issue_time = time();

$JWT_claim_set = base64_encode(
'{"iss":"firebase-adminsdk-3z2ki@chicopee-222303.iam.gserviceaccount.com",'.
 '"scope":"https://www.googleapis.com/auth/firebase.messaging",'.
 '"aud":"https://www.googleapis.com/oauth2/v4/token",'.
 '"exp":'.($issue_time + 3600).','.
 '"iat":'.$issue_time.'}');
  // см. примечание

$private_key = '-----BEGIN PRIVATE KEY-----\nMIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQCxG1X0D4A+2ngn\nbPYcvI7lEm2fuwJPLAUEvz8UUqMbg0WSp7R8z2jcLyWKJk4iqokgMtWiCLWAwi4S\nUo//2MnQjSYR7jfN1Nj8t/QJ1RypSMAtjXQZ4JxTpzwZgzYBPornJh9qDQVS29MF\n7BcvNdESGytumEEug4AJeHeL9CW6PggwG9X9Xtp67Opo69e7RrMBjOxJIUWWv53C\nWinkAtJYWkTeOi6aTGhVdaB0cZBvraj68A8YAQCwUfD+syX0oKz0VTt43dfR6ya1\nKNG+tFQxGF9ajzixFbE5iPQPeULpib/yrTRF4CnTksBHJf0rZLRdIXcP54mv3j2d\nE7vH5BHlAgMBAAECggEAPJxSz6ooZRpGSZPYLGB5dLrYSnRpJ2g0tXmv4Eghqu5D\ndpuvQJGI3OXDrqJKVkHPmPXct83MM+sAcmPQBSqPcrCDiVphva7srZxUx7Kn0uVj\nY5OH2r1MMrLGdiK57jYVumKJGLWpD0DM2LeB/bWovc4PkJNJp134iQUxwHNHIBO8\nfukQ1YNBhtxYfSz03xu+cq+VHGQC6N/We9HDhzgEWUzST4HUIU8gKylQaj25rDqi\nUkC4X3mnXbZuXspxv9TQYMbugL6eg0SBWTATpbwKShOBis5U0lQ8JpJWSCRJu92s\nR69rYHRXX3HRSA6+6wRi7B3U9CQ8YogRbdPi/w54JwKBgQD0bCYceRITLwA6FT4Q\nN+u9L1qJLv4QsknNDqILfyWbudz8QAAn1GbeoCPfcnodj6atcpYH9AN2zcPkpgUO\nqgYFC0Ve90vOXQc494ZPdb4tbQTv6JMEHKvfECN5ZfB7kbtz0okAx0vD3538GP1R\noubxfX4MUbIS0bw+ySVgKaZJpwKBgQC5fuvZRoarjDW/AU3jrqc3g/QC/BU7fbVH\navI04T+J9ftZvy7igNmiIY2jChpsH8y95eaXKSwMBhbQ7ZQT8adaBRdhSKQ45/X8\nABr5hLBpTA3HP/463ID8abtZRUuZzgz+Oe3enA9HNi8YYheswGBthPB9UdYDmBuv\nFD7i0XThkwKBgQDo73xunC9OmvdTY1Uvbau7MzrMDD3Suaa9xplF7ZlwzHO+7lt3\nmeOjfOhTFa0tKO7G07IJyFHY0gZDjLi7Hev4uKIW/ASBmYS9lJ+qcGKathADdxlM\nzOo6/g1gr3a8vMjxe45XcJdTB3RvgX1BZMdFE7yhjuXvK3SEPXviJi80dwKBgQCR\nvLhMMu7npPctJDcv5S6XnWJ/XdLItNFSVSIKjdY/7DUYo+6QIq/ahAYlzHBJ9woD\nQLdUmBJ1N+uBJseqi7fyMAHYexwbYZOP8/09gRShBhHlM8/oKwpkRiXd02W8Z3kp\n3BWZSn9ucZG61IbJQTQBl+riawN8O2u0uHFX/zyXZQKBgBUN2+lpE9hwOrzQYBzy\n/jpL4GynH1ivl+9pqrnpvACZVg0myjIyESxTQtL8YA6Z7mJ/fgdaGssC08MnKHA2\ninOKrg67beWNz/6NzhI0l++w1Nn+67IEI/1U026FugqQqZuhiqWdEcf6uEVSWbBf\nmTqWN7amvbzPMUWVM+0JGLdY\n-----END PRIVATE KEY-----';

$data = $JWT_header.'.'.$JWT_claim_set;
$binary_signature = '';

openssl_sign($data, $binary_signature, $private_key, 'SHA256');

$JWT_signature = base64_encode($binary_signature);


$JWT = $JWT_header.'.'.$JWT_claim_set.'.'.$JWT_signature;



  // -- шаг 2. авторизируемся и получаем токен -- //

$socket = @fsockopen('ssl://www.googleapis.com', 443, $errno, $errstr, 10);

if (!$socket)  die('error: remote host is unreachable.');


$payload = 'grant_type=urn%3Aietf%3Aparams%3Aoauth%3Agrant-type%3Ajwt-bearer&assertion='.rawurlencode($JWT);

$send  = '';
$send .= 'POST /oauth2/v4/token HTTP/1.1'."\r\n";
$send .= 'Host: www.googleapis.com'."\r\n";
$send .= 'Connection: close'."\r\n";
$send .= 'Content-Type: application/x-www-form-urlencoded'."\r\n";
$send .= 'Content-Length: '.strlen($payload)."\r\n";
$send .= "\r\n";

$send .= $payload;


$result = fwrite($socket, $send);

$receive = '';
while (!feof($socket))  $receive .= fread($socket, 8192);

fclose($socket);

echo '<pre>'.$receive.'</pre>';



  // -- parse answer JSON (lame) -- //

$line = explode("\r\n", $receive);
if ($line[0] != 'HTTP/1.1 200 OK')  die($line[0]);

$pos = FALSE;
if (($pos = strpos($receive, "\r\n\r\n", 0)) !== FALSE ) {
  if (($pos = strpos($receive, "{", $pos+4)) !== FALSE ) {
    if (($pose = strpos($receive, "}", $pos+1)) !== FALSE ) {
      $post = substr($receive, $pos, ($pose - $pos+1) );
      $aw = json_decode($post, TRUE);
      $access_token = $aw['access_token'];
      }
    else die('} not found.');
    }
  else die('{ not found.');
  }
else die('\r\n\r\n not found.');



    // -- шаг 3. отправляем запрос на Firebase сервер -- //

$socket = @fsockopen('ssl://fcm.googleapis.com', 443, $errno, $errstr, 10);

if (!$socket)  die('error: remote host is unreachable.');


$payload = '{
  "message":{
    "token" : "AAAA6uufvUs:APA91bHSPJamNUdCpnSVpqTEelJh9HoPTOJKHfJW1sAtGoxHfRU4v5uf-EXOuqEVV6lgfCgFR5z9wmumCI3J0nD6wcTisLqL-XP0Vp0GpyXje2JiCEM8P6GPEEtts0UwMlJkbUCQMsbR",
    "notification" : {
      "title" : "Заголовок сообщения",
      "body" : "(Modern API) Моё первое сообщение через Firebase!"
      }
   }
}';
// или
  $payload = '{
"message": {
  "token" : "AAAA6uufvUs:APA91bHSPJamNUdCpnSVpqTEelJh9HoPTOJKHfJW1sAtGoxHfRU4v5uf-EXOuqEVV6lgfCgFR5z9wmumCI3J0nD6wcTisLqL-XP0Vp0GpyXje2JiCEM8P6GPEEtts0UwMlJkbUCQMsbR",
  "data":{
    "val1" : "Заголовок сообщения",
    "val2" : "(Modern API) Моё первое сообщение через Firebase!",
    "val3" : "дополнительные данные"
    }
  }
}';


$send  = '';
$send .= 'POST /v1/projects/pyur-test-id/messages:send HTTP/1.1'."\r\n";
$send .= 'Host: fcm.googleapis.com'."\r\n";
$send .= 'Connection: close'."\r\n";
$send .= 'Content-Type: application/json'."\r\n";
$send .= 'Authorization: Bearer '.$access_token."\r\n";
$send .= 'Content-Length: '.strlen($payload)."\r\n";
$send .= "\r\n";

$send .=$payload;


$result = fwrite($socket, $send);

$receive = '';
while (!feof($socket))  $receive .= fread($socket, 8192);

fclose($socket);


echo '<pre>'.$receive.'</pre>';

?>