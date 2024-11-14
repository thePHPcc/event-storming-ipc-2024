<?php declare(strict_types=1);
namespace IPC;

class CheckoutId {

    public function id(): string {
        return '123';
    }

    public function equals(CheckoutId $id): bool {
        return true;
    }
}
