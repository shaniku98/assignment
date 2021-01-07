<?php 
namespace Drupal\custom_site_information\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Listens to the dynamic route events.
 */

class RouteSubscriber extends RouteSubscriberBase {
  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
  	// Here call the custom built form into the site information form.
    if ($route = $collection->get('system.site_information_settings')) {
    	$route->setDefault('_form', 'Drupal\custom_site_information\Form\ExtendedSiteInformationForm');
    }
  }
}