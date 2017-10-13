<?php
require_once('Sucker.class.php');
if (isset($_POST['url'])) {
    Sucker::Wget($_POST['url'], './templates');
}
if (isset($_GET['remove'])) {
    $arquivo = $_GET['remove'];
    $diretorio = $diretorio = './templates' . DIRECTORY_SEPARATOR . $arquivo;
    Sucker::Remove($diretorio);
    header("location:index.php");
    exit;
}
if (isset($_GET['zip'])) {
    Sucker::Zip('./templates', $_GET['zip']);
}
$templates = Sucker::GetDir('./templates/');
?>

<html><head>
        <title>SUCKER PIKA OF MOTHER</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    </head><body>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" method="post">
                            <div class="input-group"> 
                                <input class="form-control input-lg" name="url" placeholder="Link do site que quer pegar emprestado para sempre" type="text" value="<?php echo (isset($_POST['url'])) ?$_POST['url']:'';?>">
                                <span class="input-group-btn"> 
                                    <button type="submit" class="active btn btn-info btn-lg"><i class="fa fa-1x fa-fw fa-arrow-circle-down"></i> Pegar emprestado :)</button>
                                </span> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="media-list">
                            <?php
                            foreach ($templates as $template) {
                                ?>
                                <li class="media">
                                    <div class="media-body">
                                        <h3 class="media-heading">
                                            <a href="?zip=<?php echo $template ?>" target="_blank"><i class="fa fa-1x fa-fw fa-arrow-circle-down text-success"></i></a>
                                            <a href="?remove=<?php echo $template ?>" onclick="javascript: return confirm('Tem certeza?');"><i class="fa fa-1x fa-fw fa-trash text-danger"></i></a>
                                            <a href="templates/<?php echo $template ?>" target="_blank"><?php echo $template ?></a>
                                        </h3>
                                    </div>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body></html>
