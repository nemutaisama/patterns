<?php

class Order
{

    private $customerName;

    private $paymentAmount;

    private $phone;

    private $paymentSystem;


    /**
     * @return mixed
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }


    /**
     * @param mixed $customerName
     * @return Order
     */
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getPaymentAmount()
    {
        return $this->paymentAmount;
    }


    /**
     * @param mixed $paymentAmount
     * @return Order
     */
    public function setPaymentAmount($paymentAmount)
    {
        $this->paymentAmount = $paymentAmount;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }


    /**
     * @param mixed $phone
     * @return Order
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getPaymentSystem()
    {
        return $this->paymentSystem;
    }


    /**
     * @param mixed $paymentSystem
     * @return Order
     */
    public function setPaymentSystem($paymentSystem)
    {
        $this->paymentSystem = $paymentSystem;

        return $this;
    }


}
