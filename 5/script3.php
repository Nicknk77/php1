<?php

// 3. Разработайте механизм корзины интернет-магазина. Реализуйте класс продукта (Product) 
// со свойствами title (string), price (float) и components (массив объектов Product), 
// и соответствующие методы для взаимодействия со свойствами. Свойство components служит 
// для реализации товара-наборов (например, комплект клавиатура+мышь) и в случае, если 
// экземпляр содержит компоненты, стоимость этого комплекта должна быть равна сумме 
// стоимостей её компонентов. Разработайте класс корзины (Cart) с методами для добавления, 
// удаления товаров, а также с методом вычисления полной стоимости корзины, с учётом того, 
// что некоторые товары могут представлять из себя комплекты других товаров.

$items = ['мышь', 'клава', 'монитор', 'системник', 'ноутбук', 'принтер', 'колонки'];
$prices = [40, 80, 200.5, 310.5, 620.5, 150, 100];
// $kits = [[0,1], [2,3], [0,6], [0,1,2], [0,1,2,3], [0,1,2,3,6]];

require_once 'classes/User.php';
require_once 'classes/Product.php';
require_once 'classes/Cart.php';

/**
 * $list - array of titles for products
 * returns array of Products
 */
function getCatalog(array $list, array $prices) :array {
    $catalog = [];
    foreach ($list as $index=>$item) {
        $catalog[] = new Product($item, $prices[$index]);
    }
    return $catalog;
}


$user1 = new User('Mikle', 'post@male.pu');
$catalog = getCatalog($items, $prices);     // создали корзину

$complex = new Product('КлаваМышь', 0 , [$catalog[0], $catalog[1]]);                // сложный товар
$complex2 = new Product('Набор №2', 0 , [$catalog[0], $catalog[1], $catalog[5]]);   // сложный товар
$complex3 = new Product('Набор №21', 0 , [$complex, $catalog[3]]);                  // сложный товар

$newCart = new Cart($user1, $catalog[0]);   
$newCart->addProduct($catalog[1]);          // добавили товар
$newCart->addProduct($catalog[2]);          // добавили товар
$newCart->addProduct($catalog[4]);
$newCart->addProduct($complex2);


echo "\nПокупатель: " . $newCart->getBuyer()->getUsername() . "\n";
foreach ($newCart->getProducts() as $product) {
    echo $product->getTitle() . " - " . $product->getPrice() . "$\n";
}
echo"Сумма товаров в корзине: " . $newCart->calcTotal() . "$\n\n";

$newCart->delProduct('клава');  // удалили товар из корзины

echo "----------- удалили из корзины клаву -----------\n\n";
foreach ($newCart->getProducts() as $product) {
    echo $product->getTitle() . " - " . $product->getPrice() . "$\n";
}
echo"Сумма товаров в корзине: " . $newCart->calcTotal() . "$\n\n";

echo "\nСоставной товар и его свойство components: ";
foreach ($complex3->getComponents() as $part) {
    echo "\n" . $part;  
}