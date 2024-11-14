<?php declare(strict_types=1);
namespace IPC;

class SetShippingAddress implements CheckoutCommand {

    public function __construct(
        private CheckoutId $id,
        private Address $address
    ) {
    }

    public function id(): CheckoutId {
        return $this->id;
    }

    public function address(): Address {
        return $this->address;
    }

}
