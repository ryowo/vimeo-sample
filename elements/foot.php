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