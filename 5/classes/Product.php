<?php

class Product {
    private string $title;
    private float $price;
    private array $components;

    public function __construct(string $title, float $price = 0, array $items = []) {
        $this->title = $title;
        $this->price = $price;
        if (count($items) > 0) {
            foreach ($items as $item) {
                $this->components[] = $item->getTitle();
                $this->price += $item->getPrice();
            }
        }
        return $this;
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

    public static function setComponents($component) {
        $this->components[] = $component;
        return $this;
    }
}