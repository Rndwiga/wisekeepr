<?php
namespace Fuel\Tasks;

$path_to_sucker = APPPATH . 'classes' . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'sucker' . DIRECTORY_SEPARATOR . 'Sucker.class.php';

require_once($path_to_sucker);

class Wisekeepr {

    public function run($args = NULL) {
        echo "\n===========================================";
        echo "\nRunning DEFAULT task [Wisekeepr:Run]";
        echo "\n-------------------------------------------\n\n";
    }

    public function queue($args = NULL) {
        if ($queue = \Model_Queue::query()->where('processed', 0)->get_one()){
            $queue->processed = 1;
            $queue->save();
            
            //Caminho da pasta site onde será baixado o template
            $path_to_site = DOCROOT . 'public' . DIRECTORY_SEPARATOR . 'sites';
            //pasta temporária para baixar o template
            $temp_folder = md5($queue->id);
            //Caminho completo com a pasta site e a pasta temporária do template
            $path_temp_folder = $path_to_site . DIRECTORY_SEPARATOR . $temp_folder;
            //Cria a pasta temporária dentro da pasta site
            mkdir($path_temp_folder, 0777, true);
            //Insere permissão 0777 para a pasta
            chmod($path_temp_folder, 0777);
            //Utilizando o WGET baixa o template para a pasta temporária
            \Sucker::Wget($queue->url, $path_temp_folder);
            //Monta o zip da pasta temporária
            \Sucker::Zip($path_to_site, $temp_folder);
            chmod("$path_temp_folder.zip", 0777);
            //Remove a pasta temporária
            \Sucker::Remove($path_temp_folder);
            
            $url_template = $queue->url;
            $url_image_template = \Uri::create('cover/'.md5($queue->id).'.jpg?'.rand());
            $url_download_template = \Uri::create('site/download/'.md5($queue->id));
            
            $path_image_template = DOCROOT . 'public' . DIRECTORY_SEPARATOR . 'cover' . DIRECTORY_SEPARATOR . md5($queue->id).'.jpg';
          
            copy(\Uri::create("home/getimagetemplate?url=$queue->url"), $path_image_template);
            chmod($path_image_template, 0777);

            $email = \Email::forge();

            $email->reply_to('noreply@wisekeepr.com', 'WiseKeepr');
            
            $email->to($queue->user->email);

            $email->subject('WiseKeepr - Your download is here.');

            $data = array(
                'url_template' => $url_template,
                'url_image_template' => $url_image_template,
                'url_download_template' => $url_download_template,
            );
            $email->html_body(\View::forge('email/download', $data));

            try
            {
            	echo 'Enviando email...';
                $email->send();
                
            }
            catch(\EmailValidationFailedException $e)
            {
            	echo 'ERRO AO ENVIAR EMAIL! '.$e;
                $queue->processed = 0;
                $queue->save();
            }
            catch(\EmailSendingFailedException $e)
            {
            	echo 'ERRO AO ENVIAR EMAIL! '.$e;
                $queue->processed = 0;
                $queue->save();
            }
        }
        
    }

}
