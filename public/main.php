<?php
require('config.php');

$userId = '';
function err($code, $msg) {
    http_response_code($code);
	echo json_encode(array('error' => array('code'=>intval($code), 'msg' => $msg)));
	exit;
}

function authorization() {
    if (!array_key_exists('PHP_AUTH_USER', $_SERVER) || !array_key_exists('PHP_AUTH_PW', $_SERVER)) {
        err(401, "Not Has Authorization");
    }
    global $USERS, $user_id;
    $user_id = $_SERVER['PHP_AUTH_USER'];
    $password = $_SERVER['PHP_AUTH_PW'];
   
    if (!array_key_exists($user_id, $USERS)) {
        err(401, "Not A User");
    }

    if ($USERS[$user_id] !== base64_encode(hash('sha256', $password, true))) {
        err(401, "Password Is Wrong");
    }
}

function is_recursively_deleteable($d) {
	$stack = array($d);
	while($dir = array_pop($stack)) {
		if(!is_readable($dir) || !is_writable($dir)) 
			return false;
		$files = array_diff(scandir($dir), array('.','..'));
		foreach($files as $file) if(is_dir($file)) {
			$stack[] = "$dir/$file";
		}
	}
	return true;
}

function list_files($file) {
    if (!is_dir($file)) {
        err(412, "Not a Directory");
    }

    $directory = $file;
    $result = array();
    $files = array_diff(scandir($directory), array('.','..'));
    foreach($files as $entry) if($entry !== basename(__FILE__)) {
        $i = $directory . '/' . $entry;
        $stat = stat($i);
        $result[] = array(
            'mtime' => $stat['mtime'],
            'size' => $stat['size'],
            'name' => basename($i),
            'path' => preg_replace('@^\./@', '', $i),
            'is_dir' => is_dir($i),
            'is_deleteable' => ((!is_dir($i) && is_writable($directory)) ||
                                (is_dir($i) && is_writable($directory) && is_recursively_deleteable($i))),

            
            
            'is_readable' => is_readable($i),
            'is_writable' => is_writable($i),
            'is_executable' => is_executable($i),
        );
    }
    return json_encode(array('success' => true, 'is_writable' => is_writable($file), 'results' =>$result));
}

function delete_file($dir) {
    if (!file_exists($dir)) {
        return;
    } 
    if(is_dir($dir)) {
		$files = array_diff(scandir($dir), array('.','..'));
		foreach ($files as $file)
			delete_file("$dir/$file");
		rmdir($dir);
	} else {
		unlink($dir);
	}
}

function get_real_file_path($file) {
    global $user_id;
    $bach_path = dirname(realpath('.')) . DIRECTORY_SEPARATOR . 'data';
    $user_folder = $bach_path . DIRECTORY_SEPARATOR . $user_id;
    if (!file_exists($user_folder)) {
        @mkdir($user_folder);
    }
    $path = $user_folder . DIRECTORY_SEPARATOR . $file;
    $path = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $path);
    $parts = array_filter(explode(DIRECTORY_SEPARATOR, $path), 'strlen');
    $absolutes = array();
    foreach ($parts as $part) {
        if ('.' == $part) continue;
        if ('..' == $part) {
            array_pop($absolutes);
        } else {
            $absolutes[] = $part;
        }
    }
    $real_path = implode(DIRECTORY_SEPARATOR, $absolutes);
    if (0 !== strpos($real_path, $user_folder)) {
        err(412, "Error Directory");
    }
    return $real_path;
}

authorization();

$file = '';
if (array_key_exists('file', $_REQUEST)) {
    $file = $_REQUEST['file'];
}
$real_file_path = get_real_file_path($file);
if ($_REQUEST['do'] === 'list') {    
    echo list_files($real_file_path);
} else if ($_REQUEST['do'] === 'delete') {
    delete_file($real_file_path);
} else if ($_REQUEST['do'] === 'mkdir') {
    $dir = '';
    if (array_key_exists('name', $_REQUEST)) {
        $dir = $_REQUEST['name'];
    }
    $real_dir_path = get_real_file_path($file . DIRECTORY_SEPARATOR . $dir);
    @mkdir($real_dir_path, 0755, true);
} elseif ($_REQUEST['do'] == 'upload') {
    $file_path = get_real_file_path($file . DIRECTORY_SEPARATOR . $_FILES['file_data']['name']);
	move_uploaded_file($_FILES['file_data']['tmp_name'], $file_path);
} elseif ($_REQUEST['do'] == 'download') {
	$filename = basename($real_file_path);
	header('Content-Type: ' . mime_content_type($real_file_path));
	header('Content-Length: '. filesize($real_file_path));
	header(sprintf('Content-Disposition: attachment; filename=%s',
		strpos('MSIE',$_SERVER['HTTP_REFERER']) ? rawurlencode($filename) : "\"$filename\"" ));
	ob_flush();
	readfile($real_file_path);
}