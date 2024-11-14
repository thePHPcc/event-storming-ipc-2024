<?php declare(strict_types=1);
namespace IPC;

readonly class CheckoutService {

    public function __construct(
        private EventStore $eventStore,
        private CommandLocator $commandLocator,
        private DispatcherLocator $dispatcherLocator,
        private EventPublisher $eventPublisher
    ) {
    }

    public function handle(CheckoutCommand $command): DomainEvent {
        $result = $this->commandLocator->getHandlerFor($command)->handle($command);
        $this->eventStore->store($result);
        $this->dispatcherLocator->getDispatcherFor($result)->dispatch($result);
        return $this->eventPublisher->publish($result);
    }
}
