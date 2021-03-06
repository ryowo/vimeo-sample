
<?php
$results = require(__DIR__ . '/commands/list.php');
?>

<?php include(__DIR__ . '/elements/head.php'); ?>


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
                  <th>Presets</th>
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
                  <td><?php echo h($video['embed_presets']['name']); ?> (<?php echo h($video['embed_presets']['uri']); ?>)</td>
                  <td><?php echo h($video['status']); ?></td>
                </tr>

<?php } // end foreach ?>
              </tbody>
            </table>
          </div>
        </main>

<?php include(__DIR__ . '/elements/foot.php'); ?>