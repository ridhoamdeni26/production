
      <?php 

      if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level_user')=="1") :?>
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <h3>General</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo site_url() ?>Datagrafik/index">Dashboard All</a></li>

                      <li>
                        <a><i class=""></i> Molasses <span class="fa fa-chevron-down"></span></a>
                           <ul class="nav child_menu">
                            <li><a href="<?php echo site_url() ?>Entrymol/index">Entry Data Molasses</a></li>
                            <li><a href="#">Data History Molasses</a></li>
                           </ul>
                       </li>

                      <li>
                        <a><i class=""></i> Raw Sugar <span class="fa fa-chevron-down"></span></a>
                           <ul class="nav child_menu">
                            <li><a href="<?php echo site_url() ?>Entryraw/index">Entry Data Raw Sugar</a></li>
                            <li><a href="#">Data History Raw Sugar</a></li>
                           </ul>
                      </li>

                      <li>
                        <a><i class=""></i> Coal <span class="fa fa-chevron-down"></span></a>
                           <ul class="nav child_menu">
                            <li><a href="<?php echo site_url() ?>Entrycoal/index">Entry Data Coal</a></li>
                            <li><a href="#">Data History Coal</a></li>
                           </ul>
                      </li>

                      <li><a href="<?php echo site_url() ?>Management/index">Management User</a></li>
                      <li><a href="<?php echo site_url() ?>Build/index">Build</a></li>
                      <li><a href="<?php echo site_url() ?>Datacapture/index">Build</a></li>
                  </ul>
                </li>
              </ul>
            </div>
        </div>
      <?php endif; ?>

      <?php 

      if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level_user')=="2") :?>
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <h3>General</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo site_url() ?>Datagrafik/index">Dashboard All</a></li>

                      <li>
                        <a><i class=""></i> Molasses <span class="fa fa-chevron-down"></span></a>
                           <ul class="nav child_menu">
                            <li><a href="<?php echo site_url() ?>Entrymol/index">Entry Data Molasses</a></li>
                            <li><a href="#">Data History Molasses</a></li>
                           </ul>
                       </li>
                  </ul>
                </li>
              </ul>
            </div>
        </div>
      <?php endif; ?>

      <?php 

      if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level_user')=="3") :?>
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <h3>General</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo site_url() ?>Datagrafik/index">Dashboard All</a></li>

                      <li>
                        <a><i class=""></i> Raw Sugar <span class="fa fa-chevron-down"></span></a>
                           <ul class="nav child_menu">
                            <li><a href="<?php echo site_url() ?>Entryraw/index">Entry Data Raw Sugar</a></li>
                            <li><a href="#">Data History Raw Sugar</a></li>
                           </ul>
                      </li>

                  </ul>
                </li>
              </ul>
            </div>
        </div>
      <?php endif; ?>

      <?php 

      if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level_user')=="4") :?>
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <h3>General</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo site_url() ?>Datagrafik/index">Dashboard All</a></li>

                      <li>
                        <a><i class=""></i> Coal <span class="fa fa-chevron-down"></span></a>
                           <ul class="nav child_menu">
                            <li><a href="<?php echo site_url() ?>Entrycoal/index">Entry Data Coal</a></li>
                            <li><a href="#">Data History Coal</a></li>
                           </ul>
                      </li>
                      
                  </ul>
                </li>
              </ul>
            </div>
        </div>
      <?php endif; ?>

