<?php declare(strict_types=1);
namespace IPC;

use RuntimeException;

class CommandLocator {

    public function __construct(
        private EventStore $store
    ) {
    }

    public function getHandlerFor(CheckoutCommand $command): Handler {
        return match(true) {
            $command instanceof StartCheckout => new CheckoutStartHandler(),
            $command instanceof SetShippingAddress =>  $this->createShippingAddressHandler($command),
            default => throw new RuntimeException('Oops!')
        };
    }

    private function createShippingAddressHandler(SetShippingAddress $command) {
        /*
        $events = $this->store->load($command->id(), [
            CheckoutStarted::class
        ]);
        */
        $events = [
            new CheckoutStarted(new CheckoutId(), new Cart)
        ];

        return new SetShippingAddressHandler(...$events);
    }
}
