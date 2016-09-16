<?php
require_once __DIR__ . '/config.php';

function create_meta() {
	$vid_list = new VideoCollection();

	foreach ( VID_PATHS as $path ) {
		$files     = scandir( $path );
		$path_list = new VideoList( $path );
		foreach ( $files as $file ) {
			if ( strpos( $file, 'mkv' ) !== false ) {
				$path_list->add( $file );
			}
		}

		$vid_list->add( $path_list );
	}

	return $vid_list;
}


class VideoList {
	private $root_path;
	private $file_list;

	public function __construct( $root_path ) {
		$this->root_path = $root_path;
		$this->file_list = [];
	}

	public function add( $file ) {
		$this->file_list[] = $file;
	}

	public function draw() {
		$list = '<ul class="rolldown-list" id="myList">';
		foreach ( $this->file_list as $file_name ) {
			$list.='<li>';
			$list.='<a href="' . $this->root_path . '/' . $file_name . '">' . $this->get_friendly_name($file_name). '</a>';
			$list.='</li>';
		}
		$list.='</ul>';

		return $list;
	}

	private function get_friendly_name($name){
		$season = substr($name, 1, 2);
		$episode = substr($name, 4, 2);

		return 'Season '. $season. ' Episode ' . $episode;
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