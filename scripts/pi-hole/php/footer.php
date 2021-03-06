<?php
/* Pi-hole: A black hole for Internet advertisements
*  (c) 2017 Pi-hole, LLC (https://pi-hole.net)
*  Network-wide ad blocking via your own hardware.
*
*  This file is copyright under the latest version of the EUPL.
*  Please see LICENSE file for your rights under this license. */ ?>

        </section>
        <!-- /.content -->
    </div>
    <!-- Modal for custom disable time -->
    <div class="modal fade" id="customDisableModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Custom disable timeout</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-3"><input id="customTimeout" class="form-control" type="number" value="60"></div>
                        <div class="col-sm-9">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default">
                                    <input type="radio"/> Secs
                                </label>
                                <label id="btnMins" class="btn btn-default active">
                                    <input type="radio"  /> Mins
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button  id="pihole-disable-custom" type="button" class="btn btn-primary" data-dismiss="modal">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
            <?php
            // Check if on a dev branch
            $piholeBranch = exec("cd /etc/.pihole/ && git rev-parse --abbrev-ref HEAD");
            $webBranch = exec("git rev-parse --abbrev-ref HEAD");

            // Use vDev if not on master
            if($piholeBranch !== "master") {
                $piholeVersion = "vDev";
                $piholeCommit = exec("cd /etc/.pihole/ && git describe --long --dirty --tags");
            }
            else {
                $piholeVersion = exec("cd /etc/.pihole/ && git describe --tags --abbrev=0");
            }

            if($webBranch !== "master") {
                $webVersion = "vDev";
                $webCommit = exec("git describe --long --dirty --tags");
            }
            else {
                $webVersion = exec("git describe --tags --abbrev=0");
            }

            $FTLVersion = exec("pihole-FTL version");
            ?>
<style type="text/css">
	@-webkit-keyframes Pulse{
		from {color:#630030;-webkit-text-shadow:0 0 9px #333;}
		50% {color:#e33100;-webkit-text-shadow:0 0 32px #e33100;}
		to {color:#630030;-webkit-text-shadow:0 0 9px #333;}
	}
	a.lookatme {
		-webkit-animation-name: Pulse;
		-webkit-animation-duration: 2s;
		-webkit-animation-iteration-count: infinite;
	}
</style>
        <div class="pull-right hidden-xs <?php if(isset($piholeCommit) || isset($webCommit)) { ?>hidden-md<?php } ?>">
            <b>Pi-hole Version </b> <span id="piholeVersion"><?php echo $piholeVersion; ?></span><?php if(isset($piholeCommit)) { echo " (".$piholeBranch.", ".$piholeCommit.")"; } ?>
            <b>Web Interface Version </b> <span id="webVersion"><?php echo $webVersion; ?></span><?php if(isset($webCommit)) { echo " (".$webBranch.", ".$webCommit.")"; } ?>
            <b>FTL Version </b> <span id="FTLVersion"><?php echo $FTLVersion; ?></span>
        </div>
            <div><a href="https://github.com/pi-hole"><i class="fa fa-github"></i></a> <strong><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=3J2L3Z4DHW9UY">Donate</a></strong> if you found this useful.</div>
    </footer>
</div>
<!-- ./wrapper -->
<script src="scripts/vendor/jquery.min.js"></script>
<script src="scripts/vendor/jquery-ui.min.js"></script>
<script src="style/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="scripts/vendor/app.min.js"></script>

<script src="scripts/vendor/jquery.dataTables.min.js"></script>
<script src="scripts/vendor/dataTables.bootstrap.min.js"></script>
<script src="scripts/vendor/Chart.bundle.min.js"></script>

<script src="scripts/pi-hole/js/footer.js"></script>

</body>
</html>
