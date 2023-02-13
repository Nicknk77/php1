<?php

require_once 'User.php'; // Обязательно подключаем наш класс-сущность

class UserProvider {
    // Тут храним учетные данные
    private array $accounts = [
        'geek' => '123',
        'admin' => 'admin'
    ];

    // Метод получения пользователя. Если данные не совпали, вернет null
    public function getByUsernameAndPassword(string $username, string $password): ?User
    {
    $expectedPassword = $this->accounts[$username] ?? null;
    if ($expectedPassword === $password) {
        return new User($username);
    }
    return null;
    }
}
