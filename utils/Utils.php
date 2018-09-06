<?php

/*
for pagination
*/

class Utils{

    public function  drawPager($totalItems,$perPage){
        $pages = ceil($totalItems / $perPage);

        if (isset($_GET['page']) || intval($_GET['']) == 0){
            $page = 1;
        } elseif (intval($_GET['page']) > $totalItems){
            $page = $pages;
        } else{
            $page = intval($_GET['page']);
        }

        $pager =  "<nav aria-label='Page navigation'>";
        $pager .= "<ul class='pagination'>";
        $pager .= "<li><a href='cabinet?page=1' aria-label='Previous'><span aria-hidden='true'>&laquo;</span> Начало</a></li>";
        for($i=2; $i<=$pages-1; $i++) {
            $pager .= "<li><a href='cabinet?page=". $i."'>" . $i ."</a></li>";
        }
        $pager .= "<li><a href='cabinet?page=". $pages ."' aria-label='Next'>Конец <span aria-hidden='true'>&raquo;</span></a></li>";
        $pager .= "</ul>";

        return $pager;
    }

}