<?php
interface IPage {
	public function get_all();
	public function get_one($id);
	public function get_body($text,$file);
}
?>