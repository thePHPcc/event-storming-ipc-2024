<?php declare(strict_types=1);
namespace IPC;

class NulLDispatcher implements  Dispatcher {

    public function dispatch(CheckoutEvent $event): void {
    }

}
