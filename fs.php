<?php
require_once __DIR__ . '/config.php';

function create_meta() {
	$vid_list = new VideoCollection();

	foreach ( VID_PATHS as $path ) {
		$files     = scandir( $path );
		$path_list = new VideoList( $path );
		foreach ( $files as $file ) {
			if ( strpos( $file, 'mkv' ) !== false || strpos( $file, 'mp4' ) !== false ) {
				$path_list->add( $file );
			}
		}

		$vid_list->add( $path_list );
	}

	return $vid_list;
}

function force_download( $filename ) {
	header( 'Content-Type: application/octet-stream' );
	header( 'Content-Transfer-Encoding: Binary' );
	header( 'Content-disposition: attachment; filename="' . basename( $filename ) . '"' );
	readfile( $filename );
}

class VideoList {
	private $root_path;
	private $file_list;
	private $imagery = [];

	public function __construct( $root_path ) {
		$this->root_path = $root_path;
		$this->file_list = [];
	}

	public function add( $file ) {
		$this->file_list[] = $file;
	}

	public function draw() {
		$list = '<ul class="rolldown-list" id="myList">';

		foreach ( $this->file_list as $f_name ) {
			$list .= '<li>';
			$file_path       = $this->root_path . '/' . $f_name;
			$friendly_name   = $this->get_friendly_name( $f_name );
			$this->imagery[] = str_replace( '.', ' ', $friendly_name . '.jpg' );
			$list .= '<a href="' . $file_path . '" download><button class="download">' . $friendly_name . '</button></a>';
			$list .= '</li >';
		}
		$list .= '</ul >';

		return $list;
	}

	public function draw_old() {
		$list = '<ul class="rolldown-list" id="myList">';

		foreach ( $this->file_list as $file_name ) {
			$list .= '<li>';
			$file_path       = $this->root_path . '/' . $file_name;
			$friendly_name   = $this->get_friendly_name( $file_name );
			$this->imagery[] = str_replace( '.', ' ', $friendly_name . '.jpg' );
			$list .= $friendly_name;
			$list .= '<a href="' . $file_path . '" download>' . '<button class="download">Save</button></a>';
			$list .= '</li >';
		}
		$list .= '</ul >';

		return $list;
	}

	private function get_friendly_name( $name ) {

		$name = str_replace( 'mkv', '', $name );
		$name = str_replace( '.', ' ', $name );
		$name = str_replace( 'mp4', ' ', $name );

		return $name;
	}

	public function getImagery() {
		return $this->imagery;
	}
}

class VideoCollection {
	public $collection;

	public function __construct() {
		$this->collection = [];
	}

	public function add( $file_list ) {
		$this->collection[] = $file_list;
	}
}