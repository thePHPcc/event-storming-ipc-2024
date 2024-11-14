<?php declare(strict_types=1);
namespace IPC;

readonly class ShippingAddressSet implements CheckoutEvent {

    public function __construct(
        private CheckoutId $id,
        private Address $address
    ) {
    }

    public function address(): Address {
        return $this->address;
    }

    public function id(): CheckoutId {
        return $this->id;
    }

}
