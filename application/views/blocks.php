<!-- Tutorial Block -->
<div id="tutorial_block">
    <span class="exit_tutorial glyphicon glyphicon-remove-sign pull-right" aria-hidden="true"></span>
    <span id="tutorial_title"></span>
    <br>
    <span id="tutorial_text"></span>
</div>

<!-- Management Block -->
<div id="management_block" class="center_block">
    <strong>foobar</strong>

    <button type="button" class="exit_center_block btn btn-default btn-sm">
      <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
    </button>
    <hr>

    <!-- Form -->
    <?php echo form_open('user/management_form'); ?>
        <input type="hidden" name="world_key" value="<?php echo $world['id']; ?>">
    </form>

    <hr>
    <button type="submit" class="btn btn-action form-control">Update Nation</button>
</div>

<!-- Account Update -->
<div id="account_update_block" class="center_block">
    <strong>Nation Settings</strong>

    <button type="button" class="exit_center_block btn btn-default btn-sm">
      <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
    </button>
    <hr>

    <!-- Form -->
    <?php echo form_open('user/update_account_info'); ?>
        <input type="hidden" name="world_key" value="<?php echo $world['id']; ?>">
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="input_nation_name">Nation Name</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="nation_name" name="nation_name" value="<?php echo $account['nation_name']; ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="input_nation_flag">National Flag</label>
                </div>
                <div class="col-md-8">
                    <input type="file" class="form-control" id="nation_flag" name="nation_flag" value="<?php echo $account['nation_flag']; ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="input_nation_color">National Color</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="jscolor color_input form-control" id="nation_color" name="nation_color" value="<?php echo $account['color']; ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="input_leader_name">Leader Name</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="leader_name" name="leader_name" value="<?php echo $account['leader_name']; ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="input_leader_portrait">Leader Portrait</label>
                </div>
                <div class="col-md-8">
                    <input type="file" class="form-control" id="leader_portrait" name="leader_portrait" value="<?php echo $account['leader_portrait']; ?>">
                </div>
            </div>
        </div>
        <hr>
        <button type="submit" class="btn btn-success form-control">Update Nation</button>
    </form>
</div>

<!-- How To Play Block -->
<div id="how_to_play_block" class="center_block">
    <strong>How To Play</strong>

    <button type="button" class="exit_center_block btn btn-default btn-sm">
      <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
    </button>
    <hr>
    <p>
        <strong>Landgrab is a game of fighting for control of the world.</strong>
    </p>
    <p>
        You pick a place to start your conquest. You can then spread outward. Build farms, mines, fortifications, cities and more to strengthen your empire and your army. Make allies along the way to ensure your survival. Lost a battle and your army will regen by 100 a minute until its max is reached. Pick an army type to beat your enemies. Gorilla has a double bonus against Mech, Trench has triple bonus against Gorilla, and Mech has a quad bonus against Trench. Convert all your lands to unclaimed to start over.
    </p>
    <blockquote>
        The world is yours.
    </blockquote>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <p>
                This game is in beta, so feel free to point out bugs or give suggestions.
                Contact me at <a href="mailto:goosepostbox@gmail.com" target="_blank">goosepostbox@gmail.com </a>.
            </p>
        </div>
        <div class="col-md-6">
          <?php if ($log_check) { ?>
            <?php echo form_open('user/update_color'); ?>
            <div class="row"><div class="col-md-6">
                <label for="_input_color">Your Land Color</label>
            </div><div class="col-md-6">
                <input type="hidden" name="world_key_input" value="<?php echo $world['id']; ?>">
                <input class="jscolor color_input form-control" id="account_input_color" name="color" 
                value="<?php echo $account['color']; ?>" onchange="this.form.submit()">
            </div></div>
            </form>
          <?php } ?>
        </div>
    </div>
</div>

<!-- Update Block -->
<div id="update_info_block" class="center_block">
    <strong>Recent Updates</strong>

    <button type="button" class="exit_center_block btn btn-default btn-sm">
      <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
    </button>

    <hr>

    <small>Version 3.2.0</small>
    <ul>
        <li>Army types (See How To Play)</li>
    </ul>
    <small>Version 3.1.0</small>
    <ul>
        <li>New Leaderboards.</li>
    </ul>
    <small>Version 3.0.0</small>
    <ul>
        <li>Resource system in place.</li>
        <li>Resources such as Population, Food, Ore, and Gold added.</li>
        <li>The list of land types is now unclaimed, village farm, mine, market, fortification, stronghold, town, and city.</li>
        <li>Army is now treated as a resource.</li>
        <li>Army regens by 20 a minute until max is reached.</li>
        <li>User interface improved for less clicking.</li>
    </ul>
</div>

<!-- About Block -->
<div id="about_block" class="center_block">
    <strong>About LandGrab</strong>

    <button type="button" class="exit_center_block btn btn-default btn-sm">
      <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
    </button>
    <hr>
    <p>LandGrab is a game developed by Goose.</p>
    <strong> <a href="http://gooseweb.io/" target="_blank">gooseweb.io</a></strong>
    <br>
    <br>
    <p>Developed in PHP with CodeIgniter 3 and the Google Maps API. You can view and contribute to this project on GitHub. All Rights Reserved.</p>
    <strong> <a href="http://github.com/goosehub/landgrab/" target="_blank">github.com/goosehub/landgrab</a></strong>
    <br>
    <br>
    <p>Special Thanks goes to Google Maps, EllisLabs, The StackExchange Network, CSS-Tricks,
    <a href="http://ithare.com/" target="_blank">itHare</a>, me on the left, /s4s/, llamaseatsocks, Anonymous, Ricky,
    the rest of the Beta Testers, and all my users. Thank you!</p>
</div>

<!-- About Block -->
<div id="faq_block" class="center_block">
    <strong>Frequently Asked Questions</strong>

    <button type="button" class="exit_center_block btn btn-default btn-sm">
      <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
    </button>
    <hr>
    <p><strong>Why does it say I claimed the land, but it's the wrong color?</strong></p>
    <p>This happens when you get a land and update your map at the exact same time. It is somewhat rare and difficult to fix, but I am working on it.</p>
    <p><strong>Can you make a map with smaller squares?</strong></p>
    <p>The map currently consists of 15,000+ squares. Any more would be pushing most computers and browsers beyond its limits.</p>
    <p><strong>Can water squares be seperate from land squares?</strong></p>
    <p>This game is built on the Google Maps API. It does not tell me if a square of coords have land or not. It would need to be manually entered for each of the squares. There's also the sticky case of what counts as land or water (islands). At the moment, there's no plans to seperate the two.</p>
    <p><strong>Can you make it so new users can't start inside my land?</strong></p>
    <p>New users have to start somewhere. They can take any unfortified land. Also, calculating connected walls for each action requires a large amount of path finding logic that is currently not possible if it was desired.</p>
</div>

<!-- Report Bugs Block -->
<div id="report_bugs_block" class="center_block">
    <strong>Report Bugs</strong>

    <button type="button" class="exit_center_block btn btn-default btn-sm">
      <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
    </button>
    <hr>

    <p>Please report all bugs to 
        <strong>
            <a href="mailto:goosepostbox@gmail.com" target="_blank">goosepostbox@gmail.com </a>
        </strong>
    </p>
</div>

<!-- Error Block -->
<div id="error_block" class="center_block">
    <strong>There was an issue</strong>

    <button type="button" class="exit_center_block btn btn-default btn-sm">
      <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
    </button>
    <!-- Validation Errors -->
    <?php if ($failed_form === 'error_block') { echo $validation_errors; } ?>
</div>

<!-- Login Block -->
<div id="login_block" class="center_block">
    <strong>Login</strong>

    <button type="button" class="exit_center_block btn btn-default btn-sm">
      <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
    </button>
    <!-- Validation Errors -->
    <?php if ($failed_form === 'login') { echo $validation_errors; } ?>
    <!-- Form -->
    <?php echo form_open('user/login'); ?>
      <div class="form-group">
        <input type="hidden" name="world_key" value="<?php echo $world['id']; ?>">
        <label for="input_username">Username</label>
        <input type="username" class="form-control" id="login_input_username" name="username" placeholder="Username">
      </div>
      <div class="form-group">
        <label for="input_password">Password</label>
        <input type="password" class="form-control" id="login_input_password" name="password" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-action form-control">Login</button>
    </form>
    <hr>
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-4">
            <p class="lead">Not registered?</p>
        </div>
        <div class="col-md-2">
            <button class="register_button btn btn-success form-control">Join</button>
        </div>
    </div>
</div>

<!-- Join Block -->
<div id="register_block" class="center_block">
    <strong>Start Playing</strong>

    <button type="button" class="exit_center_block btn btn-default btn-sm">
      <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
    </button>
    <!-- Validation Errors -->
    <?php if ($failed_form === 'register') { echo $validation_errors; } ?>
    <!-- Form -->
    <?php echo form_open('user/register'); ?>
      <div class="form-group">
        <input type="hidden" name="world_key" value="<?php echo $world['id']; ?>">
        <label for="input_username">Username</label>
        <input type="username" class="form-control" id="register_input_username" name="username" placeholder="Username">
      </div>
      <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                <label for="input_password">Password <small>(Optional)</small></label>
                <input type="password" class="form-control" id="register_input_password" name="password" placeholder="Password">
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                <label for="input_confirm">Confirm <small>(Optional)</small></label>
                <input type="password" class="form-control" id="register_input_confirm" name="confirm" placeholder="Confirm">
              </div>
          </div>
      </div>
      <button type="submit" class="btn btn-action form-control">Start Playing</button>
    </form>
    <hr>
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-4">
            <p class="lead">Already a user?</p>
        </div>
        <div class="col-md-2">
            <button class="login_button btn btn-info form-control">Login</button>
        </div>
    </div>
</div>