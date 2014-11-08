<?php

class Pair {
    private $firstID;
    private $secondID;

    public function __construct($first, $second) {
        $this->firstID = $first;
        $this->secondID = $second;
    }

    public function __toString() {
        return 'Pair' . max($this->firstID, $this->secondID) . min($this->firstID, $this->secondID);
    }

    public function getFirstID() {
        return $this->firstID;
    }

    public function getSecondID() {
        return $this->secondID;
    }
} 