<?php

class User {
    // Пароль хранить нам не нужно. Это чувствительные данные
    private string $username;
    private string $name;

    public function __construct(string $username) {
        $this->username = $username;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function setUsername(string $username): self{
        $this->username = $username;
    }

    public function getName(): string{
        return $this->name;
    }
    public function setName(string $name): self{
        $this->name = $name;
        return $this;
    }
}