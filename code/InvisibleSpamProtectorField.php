<?php

/**
 * {@link FormField} for adding an optional Invisibles protection question to a form.
 *
 * @package Invisiblespamprotection
 */

class InvisibleSpamProtectorField extends SpamProtectorField {
	static $always_show_captcha = false;

	static $force_check_on_members = false;

 /**
	* Return if we should show the captcha to the user. Checks for Molloms Request
	* and if the user is currently logged in as then it can be assumed they are not spam
	*
	* @return bool
	*/
	private static function showAntiSpam() {
		if(Permission::check('ADMIN')) {
			return false;
		}

		if (!Member::currentUser() || self::$force_check_on_members) {
			return true;
		}

		return (bool)self::$always_show_captcha;
	}

	/**
	 * Outputs the field HTML to the the web browser
	 *
	 * @return HTML
	 */
	function Field($properties = array()) {
		Requirements::css("InvisibleSpamProtection/css/InvisibleSpamProtector.css");

		if(self::showAntiSpam()) {
			$attributes = array(
				'type' => 'text',
				'class' => 'text ' . ($this->extraClass() ? $this->extraClass() : ''),
				'id' => $this->id(),
				'name' => $this->getName(),
	 			'value' => "",
				'title' => _t('InvisibleSpamProtectionField.LEAVEEMPTY', "If you see this field, please leave empty. It's a automated spam trap."),
				'tabindex' => $this->getAttribute("tabindex"),
				'maxlength' => ($this->maxLength) ? $this->maxLength : null,
				'size' => ($this->maxLength) ? min( $this->maxLength, 30 ) : null
			);

			return $this->createTag('input', $attributes);
		}
	}

	/**
	 * Validates the value submitted by the user with the one saved
	 * into the {@link Session} and then notify callback object
	 * with the spam checking result.
	 *
	 * @return bool
	 */
	function validate($validator) {
		if(!self::showAntiSpam()) return true;

		if($this->Value() != ""){
			$validator->validationError(
				$this->name,
				_t(
					'InvisibleSpamProtectionField.FIELDNOTEMPTY',
					"Anti-spam field is not empty. Please leave field unchanged.",
					PR_MEDIUM
				),
				"error"
			);
			return false;
		}

		return true;
	}
}