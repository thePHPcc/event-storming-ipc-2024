<?php declare(strict_types=1);

use IPC\DomainEvent;

class Renderer {

    public function render(DomainEvent $event) {
        var_dump($event);
    }
}
