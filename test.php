<?php declare(strict_types=1);

use IPC\Address;
use IPC\Cart;
use IPC\CheckoutService;
use IPC\CommandLocator;
use IPC\DispatcherLocator;
use IPC\EventPublisher;
use IPC\EventStore;
use IPC\SetShippingAddress;
use IPC\StartCheckout;

require __DIR__ . '/src/autoload.php';

$service = new CheckoutService(
    new EventStore(),
    new CommandLocator(
        new EventStore()
    ),
    new DispatcherLocator(),
    new EventPublisher(
        new EventStore()
    )
);

// Web Context here:

$domainEvent = $service->handle(
    new StartCheckout(
        new Cart()
    )
);

$domainEvent2 = $service->handle(
    new SetShippingAddress(
        $domainEvent->id(),
        new Address()
    )
);

// Web Context Output required

(new Renderer())->render($domainEvent2);
