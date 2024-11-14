<?php declare(strict_types=1);
namespace IPC;

readonly class EventPublisher {

    public function __construct(
        private EventStore $eventStore
    ) {
    }

    public function publish(CheckoutEvent $event): DomainEvent {

        if ($event instanceof CheckoutStarted) {
            return new CheckoutStartedDomainEvent($event->id(), $event->cart());
        }

        if ($event instanceof ShippingAddressSet) {
            return new ShippingAddressSetDomainEvent($event->id(), $event->address());
        }

        // For other events we might have to do something like this:
        //$listOfEvents = $this->eventStore->load($event->id());

    }
}
