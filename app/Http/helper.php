<?php
function createTable($id,$th,$td){
    echo "<table id='$id' class='table table-striped table-bordered' style='width:100%'>";
    echo    "<thead>";
    echo        "<tr>";
    foreach($th as $val){
    echo            "<th>
                        $val
                    </th>";
    }
    echo        "</tr>";
    echo    "</thead>";
    echo    "<tbody>";
    foreach($td as $val){
        echo     "<tr>";
        foreach($val as $subval){
            if(is_numeric($subval))
                echo "   <td style='text-align:right !important;'>".number_format($subval, 2, '.', ',')."</td>";
            else if(is_array($subval))
                echo "   <td style='{$subval[1]}'>".$subval[0]."</td>";
            else
                echo "   <td> $subval </td>";
        }
        echo      "</tr>";
    }
    echo    "</tbody>";
    echo "</table>";

}
function createButton($class = '',$id = '',$attr = '',$text){
    return "<button style='color:white;' class='$class' id='$id' $attr>$text</button>";
}
?>
