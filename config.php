<?php

//  
//  用 config ファイル
// made this file : 2015.05.04
// last mod. : 2015.05.04


// ページタイトルを設定
define ('PAGE_TITLE', "My Page") ;



// デフォルトのタイムゾーンを設定します。PHP 5.1 以降で使用可能です
date_default_timezone_set ( 'Asia/Tokyo' ) ;


// 環境設定ファイルからスクリプト設置ディレクトリの設定を読み込む
include ( 'environment.inc.php' ) ;

if ( ! defined ( 'SCRIPT_DIR' ) ) {
	// スクリプト設置ディレクトリ
	define ( 'SCRIPT_DIR' , "./" ) ;
}

// file_get_contents でのアクセス時用にユーザーエージェントを設定
ini_set ( 'user_agent' , 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729; .NET4.0C)' ) ;

// 書き出すディレクトリのパス
//
define ( 'OUTPUT_DIR_NAME' , SCRIPT_DIR ) ;

// SQLite DB ファイル名
define ( 'DB_FILE' , OUTPUT_DIR_NAME . 'aa.db' ) ;



// エラーログのパス及びファイル名
define ( 'SCRIPT_ERR_LOGFILE' , SCRIPT_DIR . "error.log" ) ;

define ( 'HTML_INC_DIR' , SCRIPT_DIR . "include/html/" ) ;

// HTML 出力用インクルードファイル
define ( 'HTML_HEADER_FILE' , HTML_INC_DIR . "html_header.inc.php" ) ;
define ( 'HTML_FOOTER_FILE' , HTML_INC_DIR . "html_footer.inc.php" ) ;
define ( 'HTML_TOP_MENU_FILE' , HTML_INC_DIR . "html_top_menu.inc.php" ) ;


//define ( 'HTML_MAINFORM_FILE' , HTML_INC_DIR . "html_mainform.inc.php" ) ;
//define ( 'HTML_SENDFORM_FILE' , HTML_INC_DIR . "html_sendForm.inc.php" ) ;
//define ( 'HTML_SEARCHFORM_FILE' , HTML_INC_DIR . "html_searchForm.inc.php" ) ;
//define ( 'HTML_MAINBODY_FILE' , HTML_INC_DIR . "html_mainBody.inc.php" ) ;
define ( 'HTML_CALENDARTABLE_FILE' , HTML_INC_DIR . "html_calendarTable.inc.php" ) ;
//define ( 'HTML_IMPORTANTLIST_FILE' , HTML_INC_DIR . "html_importantList.inc.php" ) ;

define ( 'MAYALIB_DIR' , SCRIPT_DIR . "include/maya_lib/" ) ;

require_once ( SCRIPT_DIR . 'include/include_config.php' ) ;


?>
