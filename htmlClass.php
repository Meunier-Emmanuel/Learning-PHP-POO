<?php
    
class html {

    public function head(){
        return '<head>';
    }

    public function css($src){
        return '<link href="'.$src.'"rel ="stylesheet"/>';
    }
    public function link($href){
        return '<a href="'.$href.'</a>';
    }

    public function meta(){
        return '<meta charset="UTF-8">';
    }
    
    public function img($src,$alt)
    {
        return '<img src="'.$src.'"alt='.$alt.'">';
    }
    
    public function js($src)
    {
        return '<script defer src="'.$src.'"></script>';
    }

}

?>

