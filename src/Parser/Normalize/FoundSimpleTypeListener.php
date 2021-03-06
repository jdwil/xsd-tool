<?php
declare(strict_types=1);

namespace JDWil\Xsd\Parser\Normalize;

use JDWil\Xsd\Element\SimpleType;
use JDWil\Xsd\Event\EventInterface;
use JDWil\Xsd\Event\EventListenerInterface;
use JDWil\Xsd\Event\FoundSimpleTypeEvent;

/**
 * Class FoundSimpleTypeListener
 * @package JDWil\Xsd\Parser\Normalize
 */
class FoundSimpleTypeListener extends AbstractNormalizerListener implements EventListenerInterface
{
    /**
     * @param EventInterface $event
     * @return bool
     */
    public function canHandle(EventInterface $event): bool
    {
        return $event instanceof FoundSimpleTypeEvent;
    }

    /**
     * @param EventInterface $event
     * @return mixed
     * @throws \ReflectionException
     */
    public function handle(EventInterface $event)
    {
        $this->addNode($event, [SimpleType::class, 'fromElement']);
    }
}
