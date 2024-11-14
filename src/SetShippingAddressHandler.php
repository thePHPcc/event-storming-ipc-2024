<?php declare(strict_types=1);
namespace IPC;

use RuntimeException;

class SetShippingAddressHandler implements Handler {

    private ?CheckoutId $id = null;

    public function __construct(CheckoutEvent ...$events) {
        $this->applyEvents($events);
    }

    public function handle(CheckoutCommand $command): CheckoutEvent {
        assert($command instanceof SetShippingAddress);

        if (!$this->id()->equals($command->id())) {
            throw new RuntimeException('checkout id mismatch');
        }

        return new ShippingAddressSet(
            $this->id(),
            $command->address()
        );
    }

    private function id(): CheckoutId {
        if ($this->id === null) {
            throw new RuntimeException('invalid state');
        }

        return $this->id;
    }

    private function applyEvents(array $events) {
        foreach($events as $event) {
            if ($event instanceof CheckoutStarted) {
                $this->applyCheckoutStarted($event);
                continue;
            }

            // ...
        }
    }

    private function applyCheckoutStarted(CheckoutStarted $event): void {
        $this->id = $event->id();
    }

}
