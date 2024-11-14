<?php declare(strict_types=1);
namespace IPC;

class CheckoutStartedDomainEvent implements DomainEvent {

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
