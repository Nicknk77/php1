<?php

class User {
    // Пароль хранить нам не нужно. Это чувствительные данные
    private string $username;

    public function __construct(string $username) {
        $this->username = $username;
    }

    public function getUsername(): string {
        return $this->username;
    }
}