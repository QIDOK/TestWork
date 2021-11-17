<?php
    function querySelect($query, $db) {
        $result = mysqli_query($db, $query);
        if($result) {
            return mysqli_fetch_array($result, MYSQLI_ASSOC);
        } else {
            return 0;
        }
    }

    function response($status, $element) {
        return(json_encode([
            'status' => $status,
            'element' => $element,
        ]));
    }
?>