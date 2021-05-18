<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'portalwp' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'c?xgmke^*&jEXP6lD&Yhh&/K4315At|jou&#>kvRwYiJ_yg<2E<BYrsN+AvzAlL_' );
define( 'SECURE_AUTH_KEY',  'WY97e&!s;rs 43P)^?u^MY{rpwQfRMb18QLE]@n7(l?F_}lJFf;(<L|)NpORn&`U' );
define( 'LOGGED_IN_KEY',    'kVP=fM!,T|.j]A?ZUK`[B8_C~g%12><*!^W}T;s}i43ZB=q|V1jgbQa&`Osb`##?' );
define( 'NONCE_KEY',        '9x}KzY@0=}EoZ@UXY[Xn~nZeF- K|.pPr{ePW93ecw>& liJ:/5a_wPzLF@8I=$q' );
define( 'AUTH_SALT',        'qWw%riQ]edYSV.-3AkGUJ> b2XUuVzlwUp~3r>-Uu+u%Gycy?Xr4&x 2RN`5-cwd' );
define( 'SECURE_AUTH_SALT', 'GY*!IaEY50dv=88(:){~fVd7yE1( Mj^zY`,VkG%GX/#UTz;#r~Cjq{./N=Qw}sM' );
define( 'LOGGED_IN_SALT',   'd8UB!4aD!T0<8Dhi^&~{=A.Tjwz@xo_fBSPVXkT8A97tQFnd5[se{38>EknXI`t2' );
define( 'NONCE_SALT',       'B3kBk@cWpw>{lNv*N&RYW?uec}/@ 6Y4^7(|]Q6kMw0RJhx!0|}B@Ke=a4`c^B`G' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
