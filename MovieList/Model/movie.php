<?php

class movie{
    
    private $movieNum, $movieTitle, $movieType, $where, $when;
    
    public function __construct($movieNum, $movieTitle, $movieType, $where, $when) {
        $this->movieNum = $movieNum;
        $this->movieTitle = $movieTitle;
        $this->movieType = $movieType;
        $this->where = $where;
        $this->when = $when;
    }
    public function getMovieNum() {
        return $this->movieNum;
    }

    public function getMovieTitle() {
        return $this->movieTitle;
    }

    public function getMovieType() {
        return $this->movieType;
    }

    public function getWhere() {
        return $this->where;
    }

    public function getWhen() {
        return $this->when;
    }

    public function setMovieNum($movieNum) {
        $this->movieNum = $movieNum;
    }

    public function setMovieTitle($movieTitle) {
        $this->movieTitle = $movieTitle;
    }

    public function setMovieType($movieType) {
        $this->movieType = $movieType;
    }

    public function setWhere($where) {
        $this->where = $where;
    }

    public function setWhen($when) {
        $this->when = $when;
    }



    
}
