Creating a custom Drupal 8 module name as custom_site_information.

# Background Information:

When logged in as the administrator, the "Site Information" form can be found at the path /admin/config/system/site-information.

# Requirements:

This module needs to alter the existing Drupal "Site Information" form. Specifics:

* A new form text field named "Site API Key" needs to be added to the "Site Information" form with the default value of “No API Key yet”.
* When this form is submitted, the value that the user entered for this field should be saved as the system variable named "siteapikey".
* A Drupal message should inform the user that the Site API Key has been saved with that value.
* When this form is visited after the "Site API Key" is saved, the field should be populated with the correct value.
* The text of the "Save configuration" button should change to "Update Configuration".
* This module also provides a URL that responds with a JSON representation of a given node with the content type "page" only if the previously submitted API Key and a node id (nid) of an appropriate node are present, otherwise it will respond with "access denied".

# Example URL:

```http://localhost/page_json/FOOBAR12345/17```
  - Here 'FOOBAR12345' is siteapikey and '17' is node id.

# Resources:

  - [Event Subscriber Eaxmple](https://www.drupal.org/docs/8/modules/simple-fb-connect-8x/eventsubscriber-example)
  - [Add custom form to other parent form](https://www.drupal.org/forum/support/module-development-and-code-questions/2016-02-17/proper-way-to-call-buildform-in-d8)
  - [Alter route for call added custom form into parent form](https://www.drupal.org/docs/drupal-apis/routing-system/altering-existing-routes-and-adding-new-routes-based-on-dynamic-ones)
  - [Use parameters in routes](https://www.drupal.org/docs/8/api/routing-system/using-parameters-in-routes)
  - [Drupal 8 node serialization to JSON](https://api.drupal.org/api/drupal/vendor%21symfony%21http-foundation%21JsonResponse.php/class/JsonResponse/8.2.x)


# Time Taken:

The approximate time taken to implement this module was **4 hours**.

# Note:

Please make sure you have page content type.
