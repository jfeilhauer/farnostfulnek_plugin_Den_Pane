<?php
/**
 * Plugin Name:       Den Páně
 * Plugin URI:        
 * Description:       Zkouška integrace a automatizace Den Páně do webu
 * Version:           0.0.2
 * Author:            Jaromír Feilhauer
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */
include 'den_pane.php';
// vytvoření kódu pro vložení do stránky [/den_pane_zkouska]
add_shortcode("den_pane_zkouska", 'den_pane');

?>