<?php

class AoeComponents_Magento_Pages_Cart extends Menta_Component_AbstractTest {

	/**
	 * Check if we're on the cart page.
	 * Useful if e.g. the add to cart button should have redirected to this page
	 *
	 * @author Fabrizio Branca
	 * @since 2012-11-16
	 */
	public function assertOnCartPage() {
		$this->getHelperAssert()->assertBodyClass('checkout-cart-index');
	}

	/**
	 * Open cart
	 *
	 * @return void
	 */
	public function open() {
		$this->getTest()->open($this->getCartUrl());
		$this->getHelperAssert()->assertTitle($this->__("Shopping Cart"));
		$this->assertOnCartPage();
	}

	/**
	 * Get cart url
	 *
	 * @return string
	 */
	public function getCartUrl() {
		return '/checkout/cart/';
	}

	/**
	 * Assert that the cart is empty
	 *
	 * @return void
	 */
	public function assertEmptyCart() {
		$this->open();
		$this->getHelperAssert()->assertTextPresent($this->__('Shopping Cart is Empty'));
	}

	/**
	 * @return Menta_Component_Helper_Common
	 */
	public function getHelperCommon() {
		return Menta_ComponentManager::get('Menta_Component_Helper_Common');
	}

	/**
	 * @return Menta_Component_Helper_Assert
	 */
	public function getHelperAssert() {
		return Menta_ComponentManager::get('Menta_Component_Helper_Assert');
	}

	/**
	 * Placeholder for ajax implementation of cartheader
	 */
	public function waitForAjax() {
	}

}