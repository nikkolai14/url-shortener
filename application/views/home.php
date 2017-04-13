<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Url Shortener</title>

    <link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="container">
      <div class="row">
        <div class="col-m-12 text-center">
          <h1>URL Shortener</h1>
        </div>

        <div class="col-m-12">
          <?php echo form_open('shorten/save_url'); ?>
            <div class="form-group">
              <h2>Simplify your Links</h2>
              <p><input type="url" class="form-control" name="url" placeholder="Your Original URL here" required="true"></p>
              <p><button type="submit" class="btn btn-default">Shorten URL</button></p>
            </div>
          </form>
        </div>

        <?php if($short_code !== ''): ?>
          <div class="col-m-12">
            <p>Your Short Code Is <a href="#">http://url-shortener/<?php echo $short_code;?></a></p>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
  </body>
</html>

