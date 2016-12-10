<?php

class PaymentController extends Controller{
    protected $template;

    public function index(){
        $this->template = "index";

        $this->getView("Payment", $this->template);
    }
}