<?php

$theme_includes = [
  'lib/timber.php', // Legacy Timber-starter-theme function.php content
  'lib/assets.php', // Enqueue styles and scripts
  'lib/sidebars.php', // Register widget areas (aka sidebars)
  'lib/remove-emoji.php' // Disable emojicons introduced with WP 4.2
];

foreach ($theme_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}

unset($file, $filepath);
