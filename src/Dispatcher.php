<?php declare(strict_types=1);
namespace IPC;

interface Dispatcher {

    public function dispatch(CheckoutEvent $event): void;
}
