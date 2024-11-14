<?php declare(strict_types=1);
namespace IPC;

class CheckoutStartHandler implements Handler {

    public function handle(CheckoutCommand $command): CheckoutEvent {
        assert($command instanceof StartCheckout);

        return new CheckoutStarted(
            new CheckoutId,
            $command->cart()
        );
    }
}
