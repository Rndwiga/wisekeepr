<?php
set_time_limit(0);
class Screenshot{
  private $url;

  function __construct($url) {
       $this->url = urlencode($url);
  }

  public function create(){
    $cache_life = 60; //caching time, in seconds
    $download = false;
    $nome_cache = md5(date('YmdHis').rand());
    $w = 1024;
    $h = 600;
    
    $url = $this->url;

    $url = trim(urldecode($url));
    if ($url == '') {
        exit();
    }

    if (!stristr($url, 'http://') and !stristr($url, 'https://')) {
       $url = 'http://' . $url;

    }

    $url_segs = parse_url($url);
    if (!isset($url_segs['host'])) {
        exit();
    }

    $here = dirname(__FILE__) . DIRECTORY_SEPARATOR;
    $bin_files = $here . 'bin' . DIRECTORY_SEPARATOR;
    $jobs = $here . 'jobs' . DIRECTORY_SEPARATOR;
    $cache = $here . 'cache' . DIRECTORY_SEPARATOR;

    if (!is_dir($jobs)) {
        mkdir($jobs);
        file_put_contents($jobs . 'index.php', '<?php exit(); ?>');

    }


    

    if (isset($_REQUEST['w'])) {
        $w = intval($_REQUEST['w']);
    }

    if (isset($_REQUEST['h'])) {
        $h = intval($_REQUEST['h']);
    }

    if (isset($_REQUEST['clipw'])) {
        $clipw = intval($_REQUEST['clipw']);
    }

    if (isset($_REQUEST['cliph'])) {
        $cliph = intval($_REQUEST['cliph']);
    }

    if (isset($_REQUEST['download'])) {
        $download = $_REQUEST['download'];
    }

    $url = strip_tags($url);
    $url = str_replace(';', '', $url);
    $url = str_replace('"', '', $url);
    $url = str_replace('\'', '/', $url);
    $url = str_replace('<?', '', $url);
    $url = str_replace('<?', '', $url);
    $url = str_replace('\077', ' ', $url);


    $screen_file = $cache . $nome_cache . '.jpg';
    $cache_job = $screen_file;

    $refresh = false;
    if (is_file($cache_job)) {
        $filemtime = @filemtime($cache_job); // returns FALSE if file does not exist
        if (!$filemtime or (time() - $filemtime >= $cache_life)) {
            $refresh = true;
        }
    }


    $url = escapeshellcmd($url);

    if (!is_file($cache_job) or $refresh == true) {
        $src = "

        var page = require('webpage').create();

        page.viewportSize = { width: {$w}, height: {$h} };

        ";

        if (isset($clipw) && isset($cliph)) {
            $src .= "page.clipRect = { top: 0, left: 0, width: {$clipw}, height: {$cliph} };";
        }

        $src .= "

        page.open('{$url}', function () {
            page.render('{$screen_file}');
            phantom.exit();
        });


        ";

        $job_file = $jobs . $nome_cache . '.js';
        file_put_contents($job_file, $src);

        
        $exec = $bin_files . 'phantomjs ' . $job_file;

        $escaped_command = escapeshellcmd($exec);

        exec($escaped_command);

        if (is_file($here . $screen_file)) {
            rename($here . $screen_file, $cache_job);
        }

    }

    
    if (is_file($cache_job)) {
        $file = $cache_job;
        $type = 'image/jpeg';
        header('Content-Type:' . $type);
        header('Content-Length: ' . filesize($file));
        readfile($file);
        
        chmod($screen_file, 0777);
        chmod($job_file, 0777);
        
        unlink($screen_file);
        unlink($job_file);

    }


  }

}
