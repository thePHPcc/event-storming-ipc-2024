<?php declare(strict_types=1);
namespace IPC;

readonly class SimpleDispatcher implements Dispatcher {

    private array $listener;

    public function __construct(Listener ...$listener) {
        $this->listener = $listener;
    }

    public function dispatch(CheckoutEvent $event): void {
        foreach($this->listener as $listener) {
            $listener->handle($event);
        }
    }
}
