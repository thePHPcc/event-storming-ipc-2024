<?php declare(strict_types=1);
namespace IPC;

use RuntimeException;

class DispatcherLocator {

    public function getDispatcherFor(CheckoutEvent $result): Dispatcher {
        if ($result instanceof CheckoutStarted) {
            return new SimpleDispatcher(
                //new CartProjectionListener()
            );
        }

        return new NulLDispatcher();
    }
}
