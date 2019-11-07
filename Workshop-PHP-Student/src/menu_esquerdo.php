            <!-- sidebar menu -->
		<?php
		$url_etherpad = getenv("ETHERPAD_URL");
		if($url_etherpad != "") {
			$url_etherpad = "http://$url_etherpad/p/".getenv("NOME_WORKSHOP");
		} else {
			$url_etherpad = "http://etherpad-workshop-apoio.18.231.181.222.nip.io/p/ansible4ever";
		}
		?>
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Workshop OCP</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Sobre <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="about.php">Sobre o Workshop</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-wrench"></i> Ferramentas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="instancia.php">Acesso a sua instancia</a></li>
                      <li><a href="<?php echo $url_etherpad;?>" target="_blank">Etherpad</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-cube"></i> Workshop Openshift <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="workshop_dev.php">Workshop Openshift</a></li>
                      <!-- <li><a href="workshop_infra.php">Workshop Infra</a></li> -->
                    </ul>
                  </li>
                  <li><a><i class="fa fa-cogs"></i> Workshop Ansible <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="https://github.com/ansible/workshops/blob/devel/exercises/ansible_rhel/README.pt-br.md">Ansible PT-BR</a></li>
                      <li><a href="https://ansible.github.io/workshops/exercises/ansible_rhel/">Ansible EN</a></li>
                    </ul>
                  </li>
	
                  <li><a href="<?php echo getenv("LINK_FORM_FEEDBACK");?>" target="_blank"><i class="fa fa-comments"></i>Feedback Workshop</a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->


