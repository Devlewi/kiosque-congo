<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'FS_METHOD', 'direct' );
define( 'DB_NAME', 'kiosque' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '*68LIF$R*G,=k>OtFiH$v~QcTYR$GN]V#y1Ijef6@#TATQbU(_)hm{UAIdMWz6Y,' );
define( 'SECURE_AUTH_KEY',  '/Jz~.?4@qf1(_?&i[/)^U==Id_VNJS?xcH*|[EdED4ADR%{&$Y*]@Uib^Ds(;lU$' );
define( 'LOGGED_IN_KEY',    'jze* SE+M.V0b7eRu,dm %]>rm{xLT=N6yO;ae@eua5Cqx}61cL_WkQyW?1un,c#' );
define( 'NONCE_KEY',        ':,1sf-i!Ep<YpA_fVj3v5B)cB:~)|vAWW?#kg.]>@HJ4x^0tr1JR>sIT^0[mv%m!' );
define( 'AUTH_SALT',        'rIqb4k.1vQNYKF[#`U}!D}!n~{%),:$<S6zrwt@Rv_L][]5&NC6>$Zj8j{Mu2oF0' );
define( 'SECURE_AUTH_SALT', 'zUr^H`fi$Ypt?Z$jk!`q@?i1 &hV00B9lF!-@X1GW0=}3Nn6(b>?|9Vf{1bT3o9I' );
define( 'LOGGED_IN_SALT',   'Wo#k%#beN*c+wXPnZiHC=8zUHuGs]>pJ8W8HXW1W-J8D3wr+t@Fbt[Ya~1gv4Hbo' );
define( 'NONCE_SALT',       'BjA@~T]:V[&eky||Q.w2]puF,pn|>Z[}!(232eML<f}lB4W-k,9U`)Qb+.gP gnW' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs et développeuses d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
