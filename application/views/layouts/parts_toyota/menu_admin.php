<div id="menu">
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container" style="width: auto;">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<div class="nav-collapse">
					<ul class="nav">
						<li class=" active dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Part <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><?php echo anchor('parts/edit', 'Edit Data Part'); ?></li>
								<!-- <li class="divider"></li> -->
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Transaksi <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><?php echo anchor('parts/tambah', 'Tambah Item Baru'); ?></li>
								<li><a href="#">Ambil Spare Part</a></li>
								<li><a href="#">Order Spare Part</a></li>
								<li><a href="#">Tambah Stock</a></li>
								<!-- <li class="divider"></li> -->
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Record <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><?php echo anchor('record/perbulan', 'Bulan'); ?></li>
								<li><?php echo anchor('record/peritem', 'Per Item'); ?></li>
								<!-- <li class="divider"></li> -->
							</ul>
						</li>
						<li><?php echo anchor('parts/search', 'Search'); ?></li>
						<li><a href="#">Report</a></li>
					</ul>
					<ul class="nav pull-right">
						<li class="divider-vertical"></li>
						
						<li>
							<div>
								<a class="btn dropdown-toggle" href="#" data-toggle="dropdown">
									<i class="icon-user"></i>
									<?php if (is_logged_in()): ?>
										<?php echo is_logged_in() ?>
									<?php endif ?>
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="#">Profile</a>
									</li>
									<li class="divider"></li>
									<li>
										<?php echo anchor('login/logout', 'Logout'); ?>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div>
</div>