<?php declare(strict_types=1);
namespace IPC;

interface Handler {
    public function handle(CheckoutCommand $command): CheckoutEvent;
}
