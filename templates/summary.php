<?php
/**
 * Summary view template.
 *
 * @package WPWeeWX
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$station_name = WPWeeWX_Renderer::display_value( $data, 'station.location' );
?>

<div class="weewx-weather weewx-weather--<?php echo esc_attr( $theme ); ?>">
	<div class="weewx-weather__header">
		<h2 class="weewx-weather__title"><?php echo esc_html( $station_name ); ?></h2>
		<?php if ( $cache_used && $warning ) : ?>
			<span class="weewx-weather__badge"><?php echo esc_html( $warning ); ?></span>
		<?php elseif ( $cache_used ) : ?>
			<span class="weewx-weather__badge"><?php esc_html_e( 'Cached', 'wpweewx' ); ?></span>
		<?php endif; ?>
	</div>

	<div class="weewx-weather__summary">
		<div class="weewx-weather__summary-item">
			<span class="weewx-weather__summary-label"><?php esc_html_e( 'Temp', 'wpweewx' ); ?></span>
			<span class="weewx-weather__summary-value"><?php echo esc_html( WPWeeWX_Renderer::display_value( $data, 'current.temperature' ) ); ?></span>
		</div>
		<div class="weewx-weather__summary-item">
			<span class="weewx-weather__summary-label"><?php esc_html_e( 'Humidity', 'wpweewx' ); ?></span>
			<span class="weewx-weather__summary-value"><?php echo esc_html( WPWeeWX_Renderer::display_value( $data, 'current.humidity' ) ); ?></span>
		</div>
		<div class="weewx-weather__summary-item">
			<span class="weewx-weather__summary-label"><?php esc_html_e( 'Wind', 'wpweewx' ); ?></span>
			<span class="weewx-weather__summary-value"><?php echo esc_html( WPWeeWX_Renderer::display_value( $data, 'current.wind speed' ) ); ?></span>
		</div>
		<div class="weewx-weather__summary-item">
			<span class="weewx-weather__summary-label"><?php esc_html_e( 'Barometer', 'wpweewx' ); ?></span>
			<span class="weewx-weather__summary-value"><?php echo esc_html( WPWeeWX_Renderer::display_value( $data, 'current.barometer' ) ); ?></span>
		</div>
		<div class="weewx-weather__summary-item">
			<span class="weewx-weather__summary-label"><?php esc_html_e( 'Rain Rate', 'wpweewx' ); ?></span>
			<span class="weewx-weather__summary-value"><?php echo esc_html( WPWeeWX_Renderer::display_value( $data, 'current.rain rate' ) ); ?></span>
		</div>
	</div>
</div>
