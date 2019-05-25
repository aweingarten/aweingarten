<?php

/**
 * Load services definition file.
 */
$settings['container_yamls'][] = __DIR__ . '/services.yml';

/**
 * Include the Pantheon-specific settings file.
 *
 * n.b. The settings.pantheon.php file makes some changes
 *      that affect all envrionments that this site
 *      exists in.  Always include this file, even in
 *      a local development environment, to ensure that
 *      the site settings remain consistent.
 */
include __DIR__ . "/settings.pantheon.php";

/**
 * Place the config directory outside of the Drupal root.
 */
$config_directories = array(
  CONFIG_SYNC_DIRECTORY => dirname(DRUPAL_ROOT) . '/config',
);

/**
 * If there is a local settings file, then include it
 */
$local_settings = __DIR__ . "/settings.local.php";
if (file_exists($local_settings)) {
  include $local_settings;
}

/**
 * Always install the 'standard' profile to stop the installer from
 * modifying settings.php.
 */
$settings['install_profile'] = 'standard';

// Grab the base variables that give us some readable conditionals.
include __DIR__ . "/settings/base_variables.php";

// Automatically generated include for settings managed by ddev.
if ($is_ddev) {
    include $app_root . '/' . $site_path . '/settings.ddev.php';
}

// Include the config split settings.
$config_split_settings = __DIR__ . "/settings/config_split.php";
$has_config_split = file_exists($config_split_settings);
if ($has_config_split) {
    include $app_root . '/' . $site_path . '/settings.ddev.php';
}





/**
 * If there is a local settings file, then include it
 */
$local_settings = __DIR__ . "/settings.local.php";
if (file_exists($local_settings)) {
    include $local_settings;
}
