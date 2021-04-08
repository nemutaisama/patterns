<?php

class WebMoneyPaymentStrategy implements PaymentStrategyInterface
{

    public function checkPayment(Order $order): bool
    {
        return (bool) rand(0,1);
    }
}
