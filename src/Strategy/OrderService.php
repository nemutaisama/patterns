<?php

class OrderService
{
    private $strategies;

    public function __construct()
    {
        $this->strategies = [
            'qiwi' => new QiwiPaymentStrategy(),
            'yandex' => new YandexPaymentStrategy(),
            'webmoney' => new WebMoneyPaymentStrategy()
        ];
    }

    public function createOrder(array $inputData)
    {
        $order = new Order();
        $order
            ->setCustomerName($inputData['name'])
            ->setPaymentAmount($inputData['paymentAmount'])
            ->setPhone($inputData['phone'])
        ;

        //save order
    }

    public function completeOrder(Order $order, $paymentSystem)
    {
        $order->setPaymentSystem($paymentSystem)
        ;

        $strategy = $this->getStrategy($paymentSystem);

        if ($this->checkOrderPayment($strategy, $order)) {
            //process order complete
        } else {
            //process payment failure
        }
    }

    private function checkOrderPayment(PaymentStrategyInterface $paymentStrategy, Order $order): bool
    {
        return $paymentStrategy->checkPayment($order);
    }

    private function getStrategy(string $paymentSystem): PaymentStrategyInterface
    {
        return $this->strategies[$paymentSystem];
    }
}
