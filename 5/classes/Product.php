<?php

class Product {
    private string $title;
    private float $price;
    private array $components;

    public function __construct(string $title, float $price) {
        $this->title = $title;
        $this->price = $price;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
        return $this;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
        return $this;
    }

    public function getComponents() {
        return $this->components;
    }

    public static function setComponents(...$kits) {
        $i = $components.length ?? 0;
        foreach ($kits as $kit) {
            $components[$i][] = $kit;
        }
        return $this;
    }
}