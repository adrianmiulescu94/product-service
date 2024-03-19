<?php

namespace App\Message;

final class ProductMessage
{
    public function __construct(
        private $name,
        private $price,
        private $quantity
    ) {
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
}
