<?php
namespace App\Form;

class SearchModel {
    private string $search;

    public function setSearch(string $s){
        $this->search = $s;
    }

    public function getSearch(){
        return $this->search;
    }
}
?>