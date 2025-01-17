<?php declare(strict_types=1);
namespace IPC;

readonly class StartCheckout implements CheckoutCommand {

    public function __construct(
        private Cart $cart
    ) {
    }

    public function cart(): Cart {
        return $this->cart;
    }

}
