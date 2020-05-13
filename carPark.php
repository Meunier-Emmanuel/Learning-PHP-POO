<?php 
class car{
    private $number_plate;
    private $circulation_date;
    public $km;
    private $model;
    private $mark;
    public $color;
    public $weight;
    public $reserved ;
    public $type;
    public $used;
    
    public function __construct($number_plate,$circulation_date,$km,$model,$mark,$color,$weight){
        $this->number_plate = $number_plate;
        $this->circulation_date= $circulation_date ;
        $this->km = $km ;
        $this->model = $model ;
        $this->mark = $mark ;
        $this->color = $color;
        $this->weight = $weight;

        if($this->mark=="audi")
        $this->reserved = "reserved";
        else
        $this->reserved = "free";

        if($this->weight <= 3.5){
            $this->type = "utility";
        }else{
            $this->type = "commercial";
        }

        $this->used();
        
    }


    public function getNumber_Plate(){
        return $this->getNumber_Plate;
    }
    
    public function setKm($km){
        $this->km=$km;
    }
    public function getKm($km){
        return $this->km;
    }

    public function setUsed(){
        $this->used();
    }

    public function used(){
        if($this->km < 100000 ){
            $this->used= "low";
        }else if($this->km > 200000 ){
            $this->used= "high";
        }else{
            $this->used="middle";
        }
    }

    public function ride(){
        $totalKm=$this->km += 100000;   
        $this->setKm($totalKm);
        $this->setUsed();
    }
    
}
