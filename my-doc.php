<?php
/*
Plugin Name: My-Doc
Description: Integrates My-Doc API into WordPress sites
Version: 1.0
Author: Dominique Börner
*/
defined( 'ABSPATH' ) or die( 'No WordPress installation detected. Please check wp-config.php.' );
wp_enqueue_script('jquery');

class MyDocRenderer {
  public function __construct() {}

  public function wp_mydoc_show_opening_times() {
      $opening_times = '<table class="mydoc-opening-times"></table>';
      return $opening_times;
  }

  public function wp_mydoc_show_opening_times_local() {
      $opening_times_local = '<table class="mydoc-opening-times-local"></table>';
      return $opening_times_local;
  }

  public function wp_mydoc_show_opening_times_absence() {
      $opening_times_absence = '<table class="mydoc-opening-times-absence"></table>';
      return $opening_times_absence;
  }

  public function wp_mydoc_show_doctor_offices_files() {
      $files = '<div class="mydoc-doctor-office-files"></div>';
      return $files;
  }

  public function wp_mydoc_show_doctor_first_name() {
    $first_name = '<span class="mydoc-doctor-first-name"></span>';
    return $first_name;
  }

  public function wp_mydoc_show_doctor_last_name() {
    $last_name = '<span class="mydoc-doctor-last-name"></span>';
    return $last_name;
  }

  public function wp_mydoc_show_doctor_title() {
    $title = '<span class="mydoc-doctor-title"></span>';
    return $title;
  }

  public function wp_mydoc_show_doctor_website_url() {
    $website_url = '<span class="mydoc-doctor-website-url"></span>';
    return $website_url;
  }

  public function wp_mydoc_show_doctor_telephone() {
    $telephone = '<span class="mydoc-doctor-telephone"></span>';
    return $telephone;
  }

  public function wp_mydoc_show_doctor_mobilephone() {
    $mobile = '<span class="mydoc-doctor-mobile"></span>';
    return $mobile;
  }

  public function wp_mydoc_show_doctor_email() {
    $email = '<span class="mydoc-doctor-email"></span>';
    return $email;
  }

  public function wp_mydoc_show_doctor_category() {
    $category = '<span class="mydoc-doctor-category"></span>';
    return $category;
  }

  public function wp_mydoc_show_doctor_office_name() {
    $office_name = '<span class="mydoc-doctor-office-name"></span>';
    return $office_name;
  }

  public function wp_mydoc_show_doctor_office_street() {
    $office_street = '<span class="mydoc-doctor-office-street"></span>';
    return $office_street;
  }

  public function wp_mydoc_show_doctor_office_postcode() {
    $office_postcode = '<span class="mydoc-doctor-office-postcode"></span>';
    return $office_postcode;
  }

  public function wp_mydoc_show_doctor_office_city() {
    $office_city = '<span class="mydoc-doctor-office-city"></span>';
    return $office_city;
  }

  public function wp_mydoc_show_doctor_office_state() {
    $office_state = '<span class="mydoc-doctor-office-state"></span>';
    return $office_state;
  }
}

/**
* This class handles the replacement of the given tag with the html code of @MyDocRenderer.
*
* @author Dominique Börner, (dominiqueboerner@outlook.de)
*/
class MyDocShortcodeHandler {
  public $renderer;

  public function __construct() {
    $this->renderer = new MyDocRenderer();
    add_shortcode('wp_mydoc_oeffnungszeiten', array($this->renderer, 'wp_mydoc_show_opening_times'));
    add_shortcode('wp_mydoc_bereitschaftszeiten', array($this->renderer, 'wp_mydoc_show_opening_times_local'));
    add_shortcode('wp_mydoc_abwesenheitszeiten', array($this->renderer, 'wp_mydoc_show_opening_times_absence'));
    add_shortcode('wp_mydoc_formulare', array($this->renderer, 'wp_mydoc_show_doctor_offices_files'));
    add_shortcode('wp_mydoc_kontaktdaten_vorname', array($this->renderer, 'wp_mydoc_show_doctor_first_name'));
    add_shortcode('wp_mydoc_kontaktdaten_nachname', array($this->renderer, 'wp_mydoc_show_doctor_last_name'));
    add_shortcode('wp_mydoc_kontaktdaten_titel', array($this->renderer, 'wp_mydoc_show_doctor_title'));
    add_shortcode('wp_mydoc_kontaktdaten_webseite', array($this->renderer, 'wp_mydoc_show_doctor_website_url'));
    add_shortcode('wp_mydoc_kontaktdaten_telefon', array($this->renderer, 'wp_mydoc_show_doctor_telephone'));
    add_shortcode('wp_mydoc_kontaktdaten_handy', array($this->renderer, 'wp_mydoc_show_doctor_mobilephone'));
    add_shortcode('wp_mydoc_kontaktdaten_email', array($this->renderer, 'wp_mydoc_show_doctor_email'));
    add_shortcode('wp_mydoc_kontaktdaten_kategorie', array($this->renderer, 'wp_mydoc_show_doctor_category'));
    add_shortcode('wp_mydoc_kontaktdaten_praxis_name', array($this->renderer, 'wp_mydoc_show_doctor_office_name'));
    add_shortcode('wp_mydoc_kontaktdaten_praxis_straße', array($this->renderer, 'wp_mydoc_show_doctor_office_street'));
    add_shortcode('wp_mydoc_kontaktdaten_praxis_plz', array($this->renderer, 'wp_mydoc_show_doctor_office_postcode'));
    add_shortcode('wp_mydoc_kontaktdaten_praxis_stadt', array($this->renderer, 'wp_mydoc_show_doctor_office_city'));
    add_shortcode('wp_mydoc_kontaktdaten_praxis_bundesland', array($this->renderer, 'wp_mydoc_show_doctor_office_state'));
  }
}

class MyDocActionHandler {
  public function __construct() {
    add_action('wp_enqueue_scripts', array($this, 'load_moment_js'));
    add_action('wp_enqueue_scripts', array($this, 'mydoc_load_opening_times'));
    add_action('wp_enqueue_scripts', array($this, 'mydoc_load_absence_times'));
    add_action('wp_enqueue_scripts', array($this, 'mydoc_load_opening_times_local'));
    add_action('wp_enqueue_scripts', array($this, 'wp_mydoc_load_doctor_offices_files'));
    add_action('wp_enqueue_scripts', array($this, 'wp_mydoc_load_doctor_first_name'));
    add_action('wp_enqueue_scripts', array($this, 'wp_mydoc_load_doctor_last_name'));
    add_action('wp_enqueue_scripts', array($this, 'wp_mydoc_load_doctor_title'));
    add_action('wp_enqueue_scripts', array($this, 'wp_mydoc_load_doctor_website_url'));
    add_action('wp_enqueue_scripts', array($this, 'wp_mydoc_load_doctor_telephone'));
    add_action('wp_enqueue_scripts', array($this, 'wp_mydoc_load_doctor_mobilephone'));
    add_action('wp_enqueue_scripts', array($this, 'wp_mydoc_load_doctor_email'));
    add_action('wp_enqueue_scripts', array($this, 'wp_mydoc_load_doctor_category'));
    add_action('wp_enqueue_scripts', array($this, 'wp_mydoc_load_doctor_office_name'));
    add_action('wp_enqueue_scripts', array($this, 'wp_mydoc_load_doctor_office_street'));
    add_action('wp_enqueue_scripts', array($this, 'wp_mydoc_load_doctor_office_postcode'));
    add_action('wp_enqueue_scripts', array($this, 'wp_mydoc_load_doctor_office_city'));
    add_action('wp_enqueue_scripts', array($this, 'wp_mydoc_load_doctor_office_state'));
  }

  function load_moment_js() {
      wp_enqueue_script('moment-js', plugins_url( '/js/moment.js', __FILE__ ));
  }

  public function mydoc_load_opening_times() {
    wp_enqueue_script('mydoc-opening-times-js', plugins_url( '/js/mydoc-opening-times.js', __FILE__ ));
    wp_localize_script('mydoc-opening-times-js', 'my_doc_config', get_configuration());
  }

  function mydoc_load_opening_times_local() {
      wp_enqueue_script('mydoc-opening-times-local-js', plugins_url( '/js/mydoc-opening-times-local.js', __FILE__ ));
      wp_localize_script('mydoc-opening-times-local-js', 'my_doc_config', get_configuration());
  }


  function mydoc_load_absence_times() {
      wp_enqueue_script('mydoc-absence-times-js', plugins_url( '/js/mydoc-absence-times.js', __FILE__ ));
      wp_localize_script('mydoc-absence-times-js', 'my_doc_config', get_configuration());
  }

  function wp_mydoc_load_doctor_offices_files() {
      wp_enqueue_script('mydoc-doctor-offices-files-js', plugins_url( '/js/mydoc-doctor-offices-files.js', __FILE__ ));
      wp_localize_script('mydoc-doctor-offices-files-js', 'my_doc_config', get_configuration());
  }

  function wp_mydoc_load_doctor_first_name() {
    wp_enqueue_script('mydoc-doctor-first-name-js', plugins_url( '/js/mydoc-doctor-first-name.js', __FILE__ ));
    wp_localize_script('mydoc-doctor-first-name-js', 'my_doc_config', get_configuration());
  }
  function wp_mydoc_load_doctor_last_name() {
    wp_enqueue_script('mydoc-doctor-last-name-js', plugins_url( '/js/mydoc-doctor-last-name.js', __FILE__ ));
    wp_localize_script('mydoc-doctor-last-name-js', 'my_doc_config', get_configuration());
  }
  function wp_mydoc_load_doctor_title() {
    wp_enqueue_script('mydoc-doctor-title-js', plugins_url( '/js/mydoc-doctor-title.js', __FILE__ ));
    wp_localize_script('mydoc-doctor-title-js', 'my_doc_config', get_configuration());
  }
  function wp_mydoc_load_doctor_website_url() {
    wp_enqueue_script('mydoc-doctor-website-url-js', plugins_url( '/js/mydoc-doctor-website-url.js', __FILE__ ));
    wp_localize_script('mydoc-doctor-website-url-js', 'my_doc_config', get_configuration());
  }
  function wp_mydoc_load_doctor_telephone() {
    wp_enqueue_script('mydoc-doctor-telephone-js', plugins_url( '/js/mydoc-doctor-telephone.js', __FILE__ ));
    wp_localize_script('mydoc-doctor-telephone-js', 'my_doc_config', get_configuration());
  }
  function wp_mydoc_load_doctor_mobilephone() {
    wp_enqueue_script('mydoc-doctor-mobile-phone-js', plugins_url( '/js/mydoc-doctor-mobile-phone.js', __FILE__ ));
    wp_localize_script('mydoc-doctor-mobile-phone-js', 'my_doc_config', get_configuration());
  }
  function wp_mydoc_load_doctor_email() {
    wp_enqueue_script('mydoc-doctor-email-js', plugins_url( '/js/mydoc-doctor-email.js', __FILE__ ));
    wp_localize_script('mydoc-doctor-email-js', 'my_doc_config', get_configuration());
  }
  function wp_mydoc_load_doctor_category() {
    wp_enqueue_script('mydoc-doctor-category-js', plugins_url( '/js/mydoc-doctor-category.js', __FILE__ ));
    wp_localize_script('mydoc-doctor-category-js', 'my_doc_config', get_configuration());
  }
  function wp_mydoc_load_doctor_office_name() {
    wp_enqueue_script('mydoc-doctor-office-name-js', plugins_url( '/js/mydoc-doctor-office-name.js', __FILE__ ));
    wp_localize_script('mydoc-doctor-office-name-js', 'my_doc_config', get_configuration());
  }
  function wp_mydoc_load_doctor_office_street() {
    wp_enqueue_script('mydoc-doctor-office-street-js', plugins_url( '/js/mydoc-doctor-office-street.js', __FILE__ ));
    wp_localize_script('mydoc-doctor-office-street-js', 'my_doc_config', get_configuration());
  }
  function wp_mydoc_load_doctor_office_postcode() {
    wp_enqueue_script('mydoc-doctor-office-postcode-js', plugins_url( '/js/mydoc-doctor-office-postcode.js', __FILE__ ));
    wp_localize_script('mydoc-doctor-office-postcode-js', 'my_doc_config', get_configuration());
  }
  function wp_mydoc_load_doctor_office_city() {
    wp_enqueue_script('mydoc-doctor-office-city-js', plugins_url( '/js/mydoc-doctor-office-city.js', __FILE__ ));
    wp_localize_script('mydoc-doctor-office-city-js', 'my_doc_config', get_configuration());
  }
  function wp_mydoc_load_doctor_office_state() {
    wp_enqueue_script('mydoc-doctor-office-state-js', plugins_url( '/js/mydoc-doctor-office-state.js', __FILE__ ));
    wp_localize_script('mydoc-doctor-offices-state-js', 'my_doc_config', get_configuration());
  }
}

new MyDocShortcodeHandler();
new MyDocActionHandler();



//*** Configuration ***//

function get_configuration() {
  return array(
      'api_key' => 'abc'
  );
}

add_action('admin_menu', 'addMyDocMenu');
function addMyDocMenu() {
    add_menu_page(  'My-Doc Konfiguration', 'My-Doc Konfiguration', 'manage_options', 'extra info', 'displayMyDocDashboard' ,'dashicons-nametag', 26 );
}

function displayMyDocDashboard() {
    require_once 'my-doc-dashboard.php';
}
