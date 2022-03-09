<?php
if(isset($_POST['category'])){
    $category = $_POST['category'];

    if ($category == "men") {
        $category1 = "men1";
        $data = array(
            'data'  => $category1
        );
        echo json_encode($data);
    }elseif ($category == "women") {
        $category1 = "women1";
        $data = array(
            'data'  => $category1
        );
        echo json_encode($data);
    }elseif ($category == "kids") {
        $category1 = "kids1";
        $data = array(
            'data'  => $category1
        );
        echo json_encode($data);
    }

}

?>