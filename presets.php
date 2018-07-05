<?php
$results = require(__DIR__ . '/commands/presets.php');
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

          <h2>Preset list</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>uri</th>
                  <th>Name</th>
                </tr>
              </thead>
              <tbody>
<?php
$presets = $results['body']['data'];
foreach ($presets as $preset) { ?>

                <tr>
                  <td><?php echo h($preset['uri']); ?></td>
                  <td><?php echo h($preset['name']); ?></td>
                </tr>

<?php } // end foreach ?>
              </tbody>
            </table>
          </div>

        </main>

<?php include(__DIR__ . '/elements/foot.php'); ?>