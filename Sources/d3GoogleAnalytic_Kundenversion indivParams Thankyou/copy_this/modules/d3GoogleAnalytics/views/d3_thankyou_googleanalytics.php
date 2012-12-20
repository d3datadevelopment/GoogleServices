<?php

class d3_thankyou_googleAnalytics extends d3_thankyou_googleAnalytics_parent {
	public function isNewCustomer() {
		$isNew = oxSession::getVar("newcustomer");
		oxSession::deleteVar("newcustomer");
		return $isNew;
	}
}