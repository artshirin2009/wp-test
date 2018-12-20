<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', 'E:\openserver\OSPanel\domains\wp-test\wp-content\plugins\wp-super-cache/' );
define('DB_NAME', 'wp-test');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '|@M7:Eg ^t63}k{i}ba,R_qc8LR7t.a#7[<;|/c@s70A=8QEkL5]f+L7-u>8}-h@');
define('SECURE_AUTH_KEY',  'ZDqlT/LU9G d*(6c~|6#@+a;?@@ME_ik- !WBA=y;T]h#}T9mEsxNu/WuEFs[oMK');
define('LOGGED_IN_KEY',    '}Bb|#q!6AQIr=#YD:C<LoE6+P|w|p|<HJnl3bm^-Hn1,@o*3=oL{D+>lBblXY652');
define('NONCE_KEY',        ':{a;![l#kXA)sBOXC;$*K-/fK&A&jlYB0TdlXg,kzgKR-Cv@)gs--Yi$$:8o[^0g');
define('AUTH_SALT',        '{wEWSFG;46mZ)z`w$t85lW/1tR.:XJk+OI)O-~vVSrVe?@JS;GhO$.1EW{Va%Rd$');
define('SECURE_AUTH_SALT', 'v$qR}1`[]=37.RFLtDI_+[54m?$-Oy4ghXY}g43hEN>xcY`GS3)7J+XR.i6eCS)G');
define('LOGGED_IN_SALT',   '89jJ-~<PnK,IeZ{I^y#{q>e)n|j4,Hd#$A+/|a$6^y3Uz@ML1VsQX-bEobT&|jf]');
define('NONCE_SALT',       'H93<$JE D%J$^-pSvCze?<_YF-x@<!6+6czfnv5]aZ:Q.AAw/B{YV4$7eNGyjBn-');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
