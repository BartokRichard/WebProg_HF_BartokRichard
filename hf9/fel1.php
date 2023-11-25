<?php

function getProductPrice($productId) {
    $productUrl = 'https://fakestoreapi.com/products/' . $productId;

    $ch = curl_init($productUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Hiba történt a cURL kérés során: ' . curl_error($ch);
        exit;
    }

    curl_close($ch);

    $productData = json_decode($response, true);

    if (!$productData || !isset($productData['price'])) {
        return 0;
    }

    return $productData['price'];
}

function calculateCartTotal($userId) {
    $cartUrl = 'https://fakestoreapi.com/carts/user/' . $userId;

    $ch = curl_init($cartUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Hiba történt a cURL kérés során: ' . curl_error($ch);
        exit;
    }

    curl_close($ch);

    $cartData = json_decode($response, true);

    if (!$cartData || !is_array($cartData)) {
        return 0;
    }

    $total = 0;

    foreach ($cartData as $cartItem) {
        $products = $cartItem['products'] ?? [];

        foreach ($products as $product) {
            $productId = isset($product['productId']) ? $product['productId'] : null;
            $quantity = isset($product['quantity']) ? $product[''] : null;

            if ($productId !== null && $quantity !== null) {
                $price = getProductPrice($productId);

                if ($price > 0) {
                    $total += $quantity * $price;
                } else {
                    echo "Hiba a kosár elemének feldolgozásakor (ProductId: $productId): hiányzó ár adat vagy érvénytelen érték <br>" . PHP_EOL;
                }
            } else {
                echo "Hiba a kosár elemének feldolgozásakor: hiányzó adatok (ProductId: " . ($product['productId'] ?? 'nincs adat') . ", Quantity: " . ($product['quantity'] ?? 'nincs adat') . ") <br>" . PHP_EOL;
            }
        }
    }

    return $total;
}

$userId = 1;
$cartTotal = calculateCartTotal($userId);

echo 'A(z) ' . $userId . '-es user kosarának összértéke: $' . number_format($cartTotal, 2) . '<br> ';

?>