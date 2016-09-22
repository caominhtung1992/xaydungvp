<?php
	class Student extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->library("session");
			if(!$this->session->userdata("ses_user") || $this->session->userdata("ses_level") != 1){
				redirect(base_urL()."admin/verify");
			}
		}
		public function fillter($str){
			$str = str_replace("<", "&lt;", $str);
			$str = str_replace(">", "&gt;", $str);
			$str = str_replace("&", "&amp;", $str);			
			$str = str_replace("|", "&brvbar;", $str);
			$str = str_replace("~", "&tilde;", $str);
			$str = str_replace("`", "&lsquo;", $str);
			$str = str_replace("#", "&curren;", $str);
			$str = str_replace("%", "&permil;", $str);
			$str = str_replace("'", "&rsquo;", $str);
			$str = str_replace("\"", "&quot;", $str);
			$str = str_replace("\\", "&frasl;", $str);
			$str = str_replace("--", "&ndash;&ndash;", $str);
			$str = str_replace("ar(", "ar&Ccedil;", $str);
			$str = str_replace("Ar(", "Ar&Ccedil;", $str);
			$str = str_replace("aR(", "aR&Ccedil;", $str);
			$str = str_replace("AR(", "AR&Ccedil;", $str);
			return htmlspecialchars($str);
		}
		public function debug($val){
			echo "<pre>";
			print_r($val);
			echo "</pre>";
			die();
		}
		public function php_file_tree($directory, $return_link, $extensions = array()) {
			// Generates a valid XHTML list of all directories, sub-directories, and files in $directory
			// Remove trailing slash
			if( substr($directory, -1) == "/" ) $directory = substr($directory, 0, strlen($directory) - 1);
			$code = php_file_tree_dir($directory, $return_link, $extensions);
			return $code;
		}
		
		public function php_file_tree_dir($directory, $return_link, $extensions = array(), $first_call = true) {
			// Recursive function called by php_file_tree() to list directories/files
			
			// Get and sort directories/files
			if( function_exists("scandir") ) $file = scandir($directory); else $file = php4_scandir($directory);
			natcasesort($file);
			// Make directories first
			$files = $dirs = array();
			foreach($file as $this_file) {
				if( is_dir("$directory/$this_file" ) ) $dirs[] = $this_file; else $files[] = $this_file;
			}
			$file = array_merge($dirs, $files);
			
			// Filter unwanted extensions
			if( !empty($extensions) ) {
				foreach( array_keys($file) as $key ) {
					if( !is_dir("$directory/$file[$key]") ) {
						$ext = substr($file[$key], strrpos($file[$key], ".") + 1); 
						if( !in_array($ext, $extensions) ) unset($file[$key]);
					}
				}
			}
			
			if( count($file) > 2 ) { // Use 2 instead of 0 to account for . and .. "directories"
				$php_file_tree = "<ul";
				if( $first_call ) { $php_file_tree .= " class=\"php-file-tree\""; $first_call = false; }
				$php_file_tree .= ">";
				foreach( $file as $this_file ) {
					if( $this_file != "." && $this_file != ".." ) {
						if( is_dir("$directory/$this_file") ) {
							// Directory
							$php_file_tree .= "<li class=\"pft-directory\"><a href=\"#\">" . htmlspecialchars($this_file) . "</a>";
							$php_file_tree .= php_file_tree_dir("$directory/$this_file", $return_link ,$extensions, false);
							$php_file_tree .= "</li>";
						} else {
							// File
							// Get extension (prepend 'ext-' to prevent invalid classes from extensions that begin with numbers)
							$ext = "ext-" . substr($this_file, strrpos($this_file, ".") + 1); 
							$link = str_replace("[link]", "$directory/" . urlencode($this_file), $return_link);
							$php_file_tree .= "<li class=\"pft-file " . strtolower($ext) . "\"><a href=\"$link\">" . htmlspecialchars($this_file) . "</a></li>";
						}
					}
				}
				$php_file_tree .= "</ul>";
			}
			return $php_file_tree;
		}
		
		// For PHP4 compatibility
		public function php4_scandir($dir) {
			$dh  = opendir($dir);
			while( false !== ($filename = readdir($dh)) ) {
				$files[] = $filename;
			}
			sort($files);
			return($files);
		}
	}