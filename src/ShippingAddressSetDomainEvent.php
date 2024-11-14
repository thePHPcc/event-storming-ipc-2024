<?php declare(strict_types=1);
namespace IPC;

class ShippingAddressSetDomainEvent implements DomainEvent {

    public function __construct(CheckoutId $id, Address $address) {
    }
}
