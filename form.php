<?php 
// class form{

//         private $data;

//     public function __construct($data = array()){
//         $this->data = $data;
//     }

//     public function getValue($index){
//         return isset($this->data[$index]) ? $this->data[$index] : null;
//     }


//     public function input($name){
//         return '<input type="text" name="'.$name.'" value ="'.$this->getValue($name).'">';
//     }
// }

?> 

<?php 



class form{
    public $data;

    public function __construct($data = array()){
        $this->data = $data;
    }
    private function getValue($index){
        // var_dump($this->data);
        return isset($this->data[$index]) ? ($this ->data[$index]) : null; 
    }
    
    public function create($action,$method){
        return '<form action="' .$action.'" method="'.$method.'"><br>';
    }
    public function endForm(){
        return "</form>";
    }

    public function input($type,$name
    // ,$validator
    )
    {

        // $isValid = $validator($this->data[$name]);
        // var_dump($isValid);
        return '<label for ="'.$name.' "> '.$name.'</label><br>'.
        '<input type="'.$type.'" name="'.$name.'"value="'.$this->getValue($name).'"><br>';
    }

    public function openSelect($name){
        return '<select name="'.$name.'" ><br>';
    }
    public function closeSelect(){
        return '</select><br>';
    }
    public function option($value=""){
        return '<option value="'.$value.'">'.$value.'</option><br>';
    }
    public function submit($value){
        return '<input type="submit" name="submit" value="'.$value.'"><br>';
    }
    
}
?>