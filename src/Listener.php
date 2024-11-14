<?php declare(strict_types=1);
namespace IPC;

interface Listener {

    public function handle(CheckoutEvent $event): void;
}
