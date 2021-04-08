<?php

interface PaymentStrategyInterface
{

    public function checkPayment(Order $order): bool;
}
