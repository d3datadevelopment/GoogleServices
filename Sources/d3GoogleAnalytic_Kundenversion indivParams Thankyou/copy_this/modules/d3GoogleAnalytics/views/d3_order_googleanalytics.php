<?php

class d3_order_googleAnalytics extends d3_order_googleAnalytics_parent {

	public function init() {
	
		parent::init();
	
		$oUser = $this->getUser();
		$isNewCustomer = $oUser->inGroup('oxidnotyetordered');
		
		oxSession::setVar('newcustomer', (int)$isNewCustomer);
	}
	
}