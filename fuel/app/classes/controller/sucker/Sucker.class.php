<?php
set_time_limit(0);
class Sucker {

    public static function Wget($url, $destino) {
        $comando = "cd $destino && wget --limit-rate=1024k --no-clobber --convert-links --random-wait -r -p -E -e robots=off -U mozilla $url";
        shell_exec($comando);
    }
    
    public static function Zip($local, $arquivo) {
        
        $nome_final = str_replace('.', '_', $arquivo).'.zip';
        $nome_final = str_replace(' ', '_', $nome_final);

        $comando = "cd $local && zip -r $nome_final $arquivo";
        
        shell_exec($comando);

        //static::Download($local.DIRECTORY_SEPARATOR.$nome_final, $nome_final);
        
    }

    public static function GetDir($dir) {
        $diretorio = dir($dir);
        $pastas = array();
        while ($arquivo = $diretorio->read()) {
            if (is_dir($dir . $arquivo) && !($arquivo == '..' || $arquivo == '.')) {
                $pastas[] = $arquivo;
            }
        }
        return $pastas;
    }
    
    public static function Download($arquivo, $nome) {
        
        header("Pragma: public");
        header("Expires: 0"); 
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/zip");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment; filename=".basename($arquivo).";");
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: ".filesize($arquivo));

        readfile($arquivo);
        
        unlink($arquivo);
    }
    
    public static function Remove($diretorio) {
        if (is_dir($diretorio)) {
            $objects = scandir($diretorio);
            foreach ($objects as $object) {
              if ($object != "." && $object != "..") {
                if (filetype($diretorio."/".$object) == "dir") Sucker::Remove($diretorio."/".$object); else unlink($diretorio."/".$object);
              }
            }
            reset($objects);
            rmdir($diretorio);
          }
    }
    

}
