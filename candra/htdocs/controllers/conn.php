<?php
session_start();
class database
{

	private $host = "sql213.infinityfree.com";
	private $uname = "if0_38731042";
	private $pass = "DwverzcH4jPmIr";
	private $db = "if0_38731042_diskon";
	public $koneksi;

	function __construct()
	{

		$this->koneksi = mysqli_connect($this->host, $this->uname, $this->pass);
		mysqli_select_db($this->koneksi, $this->db);

		if ($this->koneksi) {
			// echo "Koneksi database mysql dan php berhasil.";
			return $this->koneksi;
		} else {
			echo "Koneksi database mysql dan php GAGAL !";
		}
	}
}

$conn = new database();