<?php

class BankAccount implements IfaceBankAccount
{

    private $balance = null;

    public function __construct(Money $openingBalance)
    {
        $this->balance = $openingBalance;
    }

    public function balance()
    {
        return $this->balance;
    }

    public function deposit(Money $amount)
    {
        //implement this method
        $this->balance = (int) (string) $amount + (int) (string) $this->balance();
        return $this->balance;
    }

    public function transfer(Money $amount, BankAccount $account)
    {
        //implement this method
         if((int) (string) $this->balance()<(int) (string) $amount){
            throw new Exception('Withdrawl amount larger than balance');
        }
        $this->balance = (int) (string) $this->balance() - (int) (string) $amount;
        $account->balance = (int) (string) $account->balance() + (int) (string) $amount;
        return $this->balance;
    }
     public function withdraw(Money $amount){
        if((int) (string) $amount >(int) (string) $this->balance()){
            throw new Exception('Withdrawl amount larger than balance');
        }
        $this->balance = (int) (string) $this->balance() - (int) (string) $amount;
        return $this->balance;
    }
}
