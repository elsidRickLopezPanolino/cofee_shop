<?php

function selectOneSql($connection, $table, $value, $column_to_select, $column_to_check){
    $sql = "SELECT '".$column_to_select."' FROM '".$table."' WHERE '".$column_to_check."' = '".$value."'";     

    $result = $connection->query($sql);

    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            return $row[$column_to_select];
        }
    }
    else{
        return false;
    }

}

function selectData($conn, $table, $columns) {
    $columnsStr = implode(", ", $columns);
    $sql = "SELECT $columnsStr FROM $table";
    $result = $conn->query($sql);

    $data = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rowData = array();
            foreach ($columns as $column) {
                $rowData[$column] = $row[$column];
            }
            $data[] = $rowData;
        }
    }

    $conn->close();
    
    return $data;
}


function order($conn, $product_id){

}

?>