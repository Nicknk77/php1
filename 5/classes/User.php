<?php

class User {
    private string $username;
    private string $email;
    private ?string $sex;
    private ?int $age;
    private bool $isActive = true;

    public function __construct(string $name, string $email) {
        $this->username = $name;
        $this->email = $email;
    }

       public function getUsername() :string {
        return $this->username;
    }

       public function setUsername(string $username) {
        $this->username = $username;
    }

    public function getEmail() {
        return $this->email;
    }

       public function setEmail(string $email) {
        $this->email = $email;
    }

       public function getSex() {
        return $this->sex;
    }

       public function setSex(?string $sex) {
        $this->sex = $sex;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge(?int $age) {
        $this->age = $age;
    }

    /**
     * Get the value of isActive
     */ 
    public function getIsActive() {
        return $this->isActive;
    }

    /**
     * Set the value of isActive
     *
     * @return  self
     */ 
    public function setIsActive(?bool $isActive) {
        $this->isActive = $isActive ?? true;
    }
}
