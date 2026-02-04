<?php
/**
 * Metric row partial.
 *
 * @package WPWeeWX
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="weewx-weather__metric">
	<span class="weewx-weather__metric-label"><?php echo esc_html( $label ); ?></span>
	<span class="weewx-weather__metric-value"><?php echo esc_html( $value ); ?></span>
</div>
