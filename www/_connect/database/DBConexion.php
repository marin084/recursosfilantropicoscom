<?php
	class PDOConnection {
		protected static $_instance = null;
		protected static $_conn = null;

		public static function instance() {
			if (!isset(self::$_instance)) {
				self::$_instance = new PDOConnection();
			}
			return self::$_instance;
		}

		protected function __construct() {}
		function __destruct() {}

		public function getConnection() {

			try {

				if (self::$_conn == null || self::$_instance == null) {
					include 'params.php';
					self::$_conn = new \PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
					self::$_conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
					self::$_conn->exec("set names utf8");
					return self::$_conn;
				}else {
					return self::$_conn;
				}
			}catch (PDOException $e) {
				throw $e;
			}catch (Exception $e) {
				throw $e;
			}
		}

		public function __clone() {return false;}
		public function __wakeup() {return false;}
	}
