<?php

session_start();
if ($_SESSION['loggued_on_user'] == "") {
    echo "ERROR\n";
}
else {
    if ($_POST['msg']) {
        if (file_exists('../private') == FALSE)
            exec('mkdir ../private');
        if (file_exists('../private/chat') == FALSE) {
            file_put_contents('../private/chat', NULL);
            $fp = fopen("../private/chat", "r+");
            flock($fp, LOCK_EX);
            $array = array(array('time' => time(), 'login' => $_SESSION['loggued_on_user'], 'msg' => $_POST['msg']));
            $serial_array = serialize($array);
            file_put_contents('../private/chat', $serial_array);
            flock($fp, LOCK_UN);
            fclose($fp);
        }
        else {
            $fp = fopen("../private/chat", "r+");
            flock($fp, LOCK_EX);
            $chat = file_get_contents('../private/chat');
            $unserial_array = unserialize($chat);
            $msg['time'] = time();
            $msg['login'] = $_SESSION['loggued_on_user'];
            $msg['msg'] = $_POST['msg'];
            $unserial_array[] = $msg;
            $serial_array = serialize($unserial_array);
            file_put_contents('../private/chat', $serial_array);
            flock($fp, LOCK_UN);
            fclose($fp);
        }        
    }
}

?>

<html>
    <head>
        <script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
        <style>
            input[type=submit] {
				border: none;
				font-weight: bold;
				border-bottom: double grey;
			}
			input[type=text] {
				text-align: center;
				font-weight: bold;
			}
			body
			{
                text-align: center;
				font-weight: bold;
				background-color:lightgrey;
			}
        </style>
    </head>
    <body>
        <form action="speak.php" method="POST">
            <input type="text" name="msg" value="">
            <input type="submit" name="submit" value="OK">
        </form>
    </body>
</html>