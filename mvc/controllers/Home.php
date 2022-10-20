<?php
class Home extends Controller{

    function index(){
        $danh = $this->model("SinhVienModel");
        echo $danh->getSV();
    }

    function Show($a, $b){
        $danh = $this->model("SinhVienModel");
        echo $danh->Tong($a, $b);
    }
}
?>