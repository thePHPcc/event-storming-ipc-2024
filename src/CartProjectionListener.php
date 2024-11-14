<?php declare(strict_types=1);
namespace IPC;

class CartProjectionListener implements Listener {

    public function handle(CheckoutEvent $event): void {
        var_dump($event);
    }

}
