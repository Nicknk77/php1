<?php

class Cart {
    private User $buyer;
    private array $products;
    private float $amount;

    public function __construct(User $user, Product $item) {
        $this->buyer = $user;
        $this->products[] = $item;
        return $this;
    }

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }
    public function delProduct(string $title) {
        foreach ($this->products as $index=>$product) {
            if ($title == $product->getTitle())
                unset($this->products[$index]);
        }
    }
    public function calcTotal() {
        $this->amount = 0;
        foreach ($this->products as $product) {
            $this->amount += $product->getPrice();
        }
        return $this->amount;

    }
    public function getAmount() {
        $this->calcTotal();
    }

    public function getProducts() {
        return $this->products;
    }

    public function getBuyer() {
        return $this->buyer;
    }
}