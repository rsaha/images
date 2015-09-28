<?php
	//open connection to mysql db
    $connection = mysqli_connect("localhost","gg_admin","xMapleAdmin123","gg_stage_db") or die("Error " . mysqli_error($connection));

    //fetch table rows from mysql db
    $sql = "SELECT * FROM `tbl_guide_detail_profile`";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

    //create an array
    $emparray[] = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);

    //close the db connection
    mysqli_close($connection);
?>