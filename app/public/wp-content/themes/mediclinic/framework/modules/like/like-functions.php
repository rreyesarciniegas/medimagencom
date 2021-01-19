<?php

if ( ! function_exists('mediclinic_mikado_like') ) {
	/**
	 * Returns MediclinicMikadoLike instance
	 *
	 * @return MediclinicMikadoLike
	 */
	function mediclinic_mikado_like() {
		return MediclinicMikadoLike::get_instance();
	}
}

function mediclinic_mikado_get_like() {

	echo wp_kses(mediclinic_mikado_like()->add_like(), array(
		'span' => array(
			'class' => true,
			'aria-hidden' => true,
			'style' => true,
			'id' => true
		),
		'i' => array(
			'class' => true,
			'style' => true,
			'id' => true
		),
		'a' => array(
			'href' => true,
			'class' => true,
			'id' => true,
			'title' => true,
			'style' => true
		)
	));
}