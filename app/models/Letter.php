<?php

//Model for DB table letters
class Letter {
	
    private $id;
    private $pixels;
    private $value;

    public function getId() {
        return $this->id;
    }

    public function getPixels() {
        return $this->pixels;
    }

    public function setPixels($pixels) {
        $this->pixels = $pixels;
    }

    public function getValue() {
        return $this->value;
    }

    public function setValue($value) {
        $this->value = $value;
    }
}