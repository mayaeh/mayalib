<?php
// Written by maya minatsuki
// Made this file : 2010.03.16 copy from marimo.php
// Last mod. : 2010.03.16



// ---------------------------------------------------------------
//   SQLite3 DB にアクセス
// ---------------------------------------------------------------
function db_access ( $query_type , $query , $fetch_style )
{
	// query_type  : SELECT / INSERT / ( UPDATE / DELETE )
	// fetch_style : NUM / ASSOC
	try
	{

		// DB ファイル等がない場合終了する
		if ( ! file_exists ( DB_FILE ) || ! $query_type || ! $query )
		{
			return ( "データベースファイル又は必要な変数が見つかりません" ) ;
		}


		if ( $query_type != "SELECT" && $query_type != "INSERT" && $query_type != "UPDATE" && $query_type != "DELETE" )
		{
			return ( "query_type が不正です。" ) ;
		}

		// DB をオープンする ( ファイルがなければ作成する )
		$db = new PDO ( 'sqlite:' . DB_FILE ) ;

		// エラーモードを指定
		$db -> setAttribute ( PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION ) ;


		// SELECT / INSERT
		if ( $query_type == "SELECT" )
		{
			// クエリを実行し、クエリが結果を返す場合はSQLite3Result オブジェクトを返す
			$sth = $db -> query ( $query ) ;


			if ( $fetch_style == "ASSOC" )
			{
				// クエリの結果を全て配列に取り込む ( カラム名で添字を付けた配列のみ )
				$results = $sth -> fetchAll ( PDO::FETCH_ASSOC ) ;
			}
			else if ( $fetch_style == "NUM" )
			{
				// クエリの結果を全て配列に取り込む ( 0 から始まるカラム番号を添字とする配列のみ )
				$results = $sth -> fetchAll ( PDO::FETCH_NUM ) ;
			}
			else
			{
				// クエリの結果を全て配列に取り込む ( カラム名と 0 で始まるカラム番号で添字を付けた配列両方 )
				$results = $sth -> fetchAll () ;
			}

		}

		else if ( $query_type == "INSERT" || $query_type == "UPDATE" || $query_type == "DELETE" )
		{
				//トランザクションの開始
				$db -> beginTransaction () ;

				$results = $db -> exec ( $query ) ;

				//コミット
				$db -> commit () ;
		}


		// DB との接続を閉じる
		$db = null ;


		return $results ;


	}
	// エラー発生時の処理
	catch ( Exception $e )
	{

		$db -> rollBack () ;
		exit ( "失敗しました。\n" . $e -> getMessage () . "\n" ) ;
	}
}


?>
