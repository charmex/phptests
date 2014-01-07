<?php

mysql_connect("localhost", "root");

//get all the course completions
//$query = "SELECT * FROM mdl_course_completions;";
//$resCC = mysql_db_query("moodle", $query);
//if (!$resCC) {
//    $msg = 'Invalid query: ' . mysql_error() . "\n";
//    $msg .= 'Full query: ' . $query;
//    die($msg);
//}
//get last id of course_completion history
$query = "SELECT id FROM mdl_course_completion_history ORDER BY id DESC LIMIT 1;";
$lastHistoryId = mysql_db_query("moodle", $query);
if (!$lastHistoryId) {
    $msg = 'Invalid query: ' . mysql_error() . "\n";
    $msg .= 'Full query: ' . $query;
    die($msg);
}
$row = mysql_fetch_assoc($lastHistoryId);
if ($row == NULL) {
    $row['id'] = 1;
}

//find the records after the last on history
$query = "SELECT * FROM mdl_course_completions WHERE timecompleted > 0 AND reaggregate = 0 AND id >" . $row['id'];
$result = mysql_db_query("moodle", $query);
if (!$result) {
    $msg = 'Invalid query: ' . mysql_error() . "\n";
    $msg .= '3' . "\n";
    $msg .= 'Full query: ' . $query;
    die($msg);
}

//insert into history all the new records
$time = time();
while ($row = mysql_fetch_assoc($result)) {
    echo "<pre>";
    print_r($row);
    echo "</pre>";
    $query = "INSERT INTO mdl_course_completion_history(userid,courseid,completedDate,addedDate)VALUES(" . $row['userid'] . "," . $row['course'] . "," . $row['timecompleted'] . "," . $time . ");";
    $resu = mysql_db_query("moodle", $query);
    if (!$resu) {
        $msg = 'Invalid query: ' . mysql_error() . "\n";
        $msg .= '4' . "\n";
        $msg .= 'Full query: ' . $query;
        die($msg);
    }
}
?>
