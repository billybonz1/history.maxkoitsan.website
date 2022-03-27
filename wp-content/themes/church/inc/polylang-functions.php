<?
/**
 * Outputs localized string if polylang exists or  output's not translated one as a fallback
 *
 * @param $string
 *
 * @return  void
 */
function pl_e( $string = '' ) {
  if ( function_exists( 'pll_e' ) ) {
    pll_e( $string );
  } else {
    echo $string;
  }
}

/**
 * Returns translated string if polylang exists or  output's not translated one as a fallback
 *
 * @param $string
 *
 * @return string
 */
function pl__( $string = '' ) {
    if ( function_exists( 'pll__' ) ) {
      return pll__( $string );
    }

    return $string;
}

function pllrs_after_setup_theme() {

 	// register our translatable strings - again first check if function exists.
  if ( function_exists( 'pll_register_string' ) ) {

    pll_register_string('header-location-title', 'Выбери локацию', 'theme');
    pll_register_string('church-location-title', 'Найти церковь', 'theme');
    pll_register_string('follow-us-title', 'Следи за нами', 'theme');
    pll_register_string('church-menu-title', 'Найди ближайшую церковь', 'theme');
    pll_register_string('footer-church-title', 'Церковь', 'theme');
    pll_register_string('footer-doing-title', 'Действуй', 'theme');
    pll_register_string('footer-service-title', 'Служения', 'theme');
    pll_register_string('footer-location-title', 'Локации', 'theme');
    pll_register_string('townmainsecond-title', 'Нужна помощь, пиши сюда:', 'theme');
  }
}

add_action( 'after_setup_theme', 'pllrs_after_setup_theme' );

?>