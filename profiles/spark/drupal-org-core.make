; A separate drupal-org-core.make file makes it so we can apply core patches
; if we need to.

api = 2
core = 7.x
projects[drupal][type] = core
projects[drupal][version] = 7.19

; CORE PATCHES
; Add "exclusive" property to install profiles to auto-select them.
; @todo: Part of core as of 7.20, so remove whenever that comes out.
projects[drupal][patch][1727430] = http://drupal.org/files/drupal-provide_exclusive_property_install_profiles-1727430-35-d7.patch

; Edit module requires the ability to pass an optional $options array.
projects[drupal][patch][1821906] = http://drupal.org/files/core-field_api_single_field-1821906-28.patch

; Add ability to pass #attributes to the drupal_add_js function.
projects[drupal][patch][1664602] = http://drupal.org/files/1664602-1.patch

; Raise minimum PHP version to work around core requirements check bug.
; Keep eyeballs posted on http://drupal.org/node/1724130.
projects[drupal][patch][1724012] = http://drupal.org/files/drupal-increase-php-version-1724012_0.patch
