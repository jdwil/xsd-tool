<?php
declare(strict_types=1);

namespace JDWil\Xsd\Parser\Normalize;

use JDWil\Xsd\Element\Attribute;
use JDWil\Xsd\Event\EventInterface;
use JDWil\Xsd\Event\EventListenerInterface;
use JDWil\Xsd\Event\FoundAttributeEvent;

/**
 * Class FoundAttributeListener
 * @package JDWil\Xsd\Parser\Normalize
 */
class FoundAttributeListener extends AbstractNormalizerListener implements EventListenerInterface
{
    /**
     * @param EventInterface $event
     * @return bool
     */
    public function canHandle(EventInterface $event): bool
    {
        return $event instanceof FoundAttributeEvent;
    }

    /**
     * @param EventInterface $event
     * @return void
     * @throws \ReflectionException
     * @throws \JDWil\Xsd\Exception\DocumentException
     */
    public function handle(EventInterface $event)
    {
        $this->addNode($event, [Attribute::class, 'fromElement']);
    }
}
