<?php

class Hooks_pinboard extends Hooks
{
    public function pinboard__get() {
        $from = Request::get('from');
        $url = Request::get('url');
        
        if (($from == null) && ($url == null)) {
	        $this->tasks->writeRecentLinks();
        } else if ($from != null) {
			$this->tasks->writeLinks($from);
		} else if ($url != null) {
			$this->tasks->writeLink($url);
		}
    }
    
    public function pinboard__write_test_bookmark() {
        $title = Request::get('title','No title');
        $url = Request::get('url','No URL');
        $desc = Request::get('desc','No description');
        
        $this->tasks->writeEntry($title, $url, $desc );
    }
}
