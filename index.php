
<?php
$results = require(__DIR__ . '/commands/list.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Vimeo Sample</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="    sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Dashboard</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Settings</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">Hmoe <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#newVideoModal">Upload Video</a>
            </li>
          </ul>


          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="#">Nav item again</a>
            </li>
          </ul>
        </nav>

        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          <h1>Dashboard</h1>

          <div id="alert-success" class="alert alert-success alert-dismissible fade show" role="alert">
            <strong id="alert-success-strong">Holy guacamole!</strong>
            <span id="alert-success-span">You should check in on some of those fields below.</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <h2>Video list</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>uri</th>
                  <th>Name</th>
                  <th>Privacy</th>
                  <th>Created</th>
                  <th>Modified</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
<?php
$videos = $results['body']['data'];
foreach ($videos as $video) { ?>

                <tr>
                  <td><?php echo h($video['uri']); ?></td>
                  <td><a href="<?php echo h($video['link']); ?>" target="_blank"><?php echo h($video['name']); ?></a></td>
                  <td><?php if (!empty($video['privacy']['view'])) { echo h($video['privacy']['view']); }?></td>
                  
                  <td><?php echo h($video['created_time']); ?></td>
                  <td><?php echo h($video['modified_time']); ?></td>
                  <td><?php echo h($video['status']); ?></td>
                </tr>

<?php } // end foreach ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div><!-- // / .container-fluid -->


<!-- Modal -->
<div class="modal fade" id="newVideoModal" tabindex="-1" role="dialog" aria-labelledby="newVideoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload New Sample Video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="newVideoForm">
          <div class="form-group">
            <label for="video-title" class="col-form-label">Title:</label>
            <input type="text" class="form-control" id="video-title">
          </div>
          <div class="form-group">
            <label for="video-password" class="col-form-label">Password:</label>
            <input type="text" class="form-control" id="video-password">
            <small class="form-text text-muted">If empty password is 'password'</small>
          </div>
          <div class="form-group">
            <label for="video-description" class="col-form-label">Description:</label>
            <textarea class="form-control" id="video-description"></textarea>
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="ajax-upload" type="button" class="btn btn-primary">Upload</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <!-- Any Other function
    ================================================== -->
    <script type="text/javascript">
      $('#alert-success').alert('close');

      $('#ajax-upload').on('click', function(){
        var _data = {
          "name":        $('#video-title').val(),
          "password":    $('#video-password').val(),
          "description": $('#video-description').val(),
        };
        $.post('./commands/upload.php', _data, function(){}, 'json')
        .done(function(data, textStatus, jqXHR) {
          console.log(data);
          $('#newVideoForm')[0].reset();
          $('#newVideoModal').modal('hide');
          $('#alert-success-strong').html('Upload Saccess');
          $('#alert-success-span').html('uri: ' + data.uri + ' link: ' + data.link + '.');
          $('#alert-success').addClass('show');
        })
        .fail(function(jqXHR, textStatus) {
          console.log('fail');
          console.log(jqXHR);
          console.log(textStatus);
        }).always(function(){
          $('#ajax-upload').prop("disabled", false);
        });
        $('#ajax-upload').prop("disabled", true);
      });
    </script>





  </body>
</html>