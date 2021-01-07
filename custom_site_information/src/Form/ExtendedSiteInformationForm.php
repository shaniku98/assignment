<?php
namespace Drupal\custom_site_information\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\system\Form\SiteInformationForm;
use Drupal\Core\Messenger\MessengerInterface;

class ExtendedSiteInformationForm extends SiteInformationForm {
   /**
   * {@inheritdoc}
   */
   public function buildForm(array $form, FormStateInterface $form_state) {
	   	$config = $this->config('system.site');
	   	// built Custom form into Site Information form.
		$form =  parent::buildForm($form, $form_state);
		$form['api_settings'] = [
	      '#type' => 'details',
	      '#title' => t('Site API Key Configuration settings'),
	      '#description' => t(''),
	      '#open' => TRUE, // Controls the HTML5 'open' attribute. Defaults to FALSE.
	    ];
		$form['api_settings']['siteapikey'] = [
			'#type' => 'textfield',
			'#title' => t('Site API Key'),
			'#default_value' => $config->get('siteapikey') ?: 'No API Key yet',
			'#description' => t("Custom field to set the Site API Key for Json Data Representation."),
		];
		// Changing text of Submit button depends on the condition.
		$form['actions']['submit']['#value'] = ($config->get('siteapikey')) ? t('Update Configuration') : t('Save Configuration');
		return $form;
	}

	public function submitForm(array &$form, FormStateInterface $form_state) {
		$config = $this->config('system.site');
		$config->set('siteapikey', $form_state->getValue('siteapikey'));
		$config->save();
		$message = 'The Site API Key has been saved with the value - '.$form_state->getValue('siteapikey') ?: 'No API Key yet';
		parent::submitForm($form, $form_state);
		// Override core status message and set our custom message.
		\Drupal::messenger()->messagesByType(MessengerInterface::TYPE_STATUS);
  		\Drupal::messenger()->deleteByType('status');
  		\Drupal::messenger()->addStatus(t($message));
	}
}