<?php declare(strict_types=1);
namespace IPC;

readonly class CheckoutStarted implements CheckoutEvent {

    public function __construct(
        private CheckoutId $id,
        private Cart $cart
    ) {
    }
    public function id(): CheckoutId {
        return $this->id;
    }

    public function cart(): Cart {
        return $this->cart;
    }

}
