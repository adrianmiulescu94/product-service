<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\Product;
use App\Message\ProductMessage;
use Symfony\Component\Messenger\MessageBusInterface;

final class ProductProcessor implements ProcessorInterface
{
    public function __construct(
        private readonly MessageBusInterface $bus,
        private readonly ProcessorInterface $persistProcessor
    ) {
    }

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): Product
    {
        /** @var Product $product */
        $product = $this->persistProcessor->process($data, $operation, $uriVariables, $context);
        $this->bus->dispatch(new ProductMessage($product->getName(), $product->getPrice(), $product->getQuantity()));

        return $product;
    }
}
