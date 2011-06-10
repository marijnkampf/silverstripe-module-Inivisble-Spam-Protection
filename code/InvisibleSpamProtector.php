<?php

/**
 * @package InvisibleSpamProtection
 */

class InvisibleSpamProtector implements SpamProtector {
	/**
	 * Returns the {@link InvisibleSpamProtectorField} associated with this protector
	 *
	 * @return InvisibleSpamProtectorField
	 */
	public function getFormField($name = null, $title = null, $value = null, $form = null, $rightTitle = null) {
		return new InvisibleSpamProtectorField($name, $title, $value, $form, $rightTitle);
	}

	/**
	 * Function required to handle dynamic feedback of the system.
	 * if unneeded just return true
	 *
	 * @return true
	 */
	public function sendFeedback($object = null, $feedback = "") {
		return true;
	}
}