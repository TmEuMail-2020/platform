<?php declare(strict_types=1);

namespace Shopware\Tests\Unit\Core\Checkout\Payment\Event;

use PHPUnit\Framework\TestCase;
use Shopware\Core\Checkout\Payment\Event\PayPaymentOrderCriteriaEvent;
use Shopware\Core\Checkout\Test\Cart\Common\Generator;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\Uuid\Uuid;

/**
 * @internal
 *
 * @covers \Shopware\Core\Checkout\Payment\Event\PayPaymentOrderCriteriaEvent
 */
class PayPaymentOrderCriteriaEventTest extends TestCase
{
    public function testEvent(): void
    {
        $orderId = Uuid::randomHex();
        $context = Generator::createSalesChannelContext();
        $criteria = new Criteria();

        $event = new PayPaymentOrderCriteriaEvent($orderId, $criteria, $context);

        static::assertSame($orderId, $event->getOrderId());
        static::assertSame($criteria, $event->getCriteria());
        static::assertSame($context, $event->getContext());
    }
}
