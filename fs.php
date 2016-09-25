<?php
require_once __DIR__ . '/config.php';

$download_file_path = $_POST['filename'];

if($download_file_path !== null){
	force_download($download_file_path);
}

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
	header('Content-Type: application/octet-stream');
	header('Content-Transfer-Encoding: Binary' );
	header('Content-disposition: attachment; filename="' . basename($filename) . '"');
	readfile($filename);
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
			$list .= '<li>';
			$file_path = $this->root_path . '/' . $file_name;
			if ( strpos( $file_name, 'mp4' ) !== false ) {
				$list .= 'Stream: ';
			}

			$list .= '<a href = "' . $file_path . '" > ' . $this->get_friendly_name( $file_name ) . '</a > ';

			if ( strpos( $file_name, 'mp4' ) !== false ) {
				$list .= '<a href="'.$file_path.' download>'.'<button class="download">Save</button></a>';
			}

			$list .= '</li >';
		}
		$list .= '</ul >';

		return $list;
	}

	private function get_friendly_name( $name ) {
		if ( strpos( $name, 'mkv' ) !== false ) {
			$season  = substr( $name, 1, 2 );
			$episode = substr( $name, 4, 2 );

			return 'Season ' . $season . ' Episode ' . $episode;
		} else {
			$extension = strpos( $name, '.mp4' );

			return substr( $name, 0, $extension );
		}

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