<!-- BEGIN HEADER -->
	<header class="page-header">
		<nav class="navbar mega-menu" role="navigation">
			<div class="container-fluid">
				<div class="clearfix navbar-fixed-top">
					<!-- Brand and toggle get grouped for better mobile display -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="toggle-icon">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
							</span>
					</button>
					<!-- End Toggle Button -->
					<!-- BEGIN LOGO -->
					<a id="index" class="page-logo" href="index.html">
							<img src="dashboard_themes/assets/layouts/layout5/img/logo.png" alt="Logo"> </a>
					<!-- END LOGO -->
					<!-- BEGIN SEARCH -->
					<form class="search" action="extra_search.html" method="GET">
							<input type="name" class="form-control" name="query" placeholder="Search...">
							<a href="javascript:;" class="btn submit md-skip">
									<i class="fa fa-search"></i>
							</a>
					</form>
					<!-- END SEARCH -->
					<!--BEGIN TOPBAR ACTIONS-->
					<div class="topbar-actions">
						<!-- BEGIN GROUP NOTIFICATION-->
						<div class="btn-group-notification btn-group" id="header_notification_bar">
								<button type="button" class="btn btn-sm md-skip dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
										<i class="icon-bell"></i>
										<span class="badge">7</span>
								</button>
						</div>
						<!-- END GROUP NOTIFICATION-->
						<!-- BEGIN GROUP INFORMATION-->
						<div class="btn-group-red btn-group">
								<button type="button" class="btn btn-sm md-skip dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
										<i class="fa fa-plus"></i>
								</button>
						</div>
						<!-- END GROUP INFORMATION-->
						<!-- BEGIN USER PROFILE -->
						<div class="btn-group-img btn-group">
								<button type="button" class="btn btn-sm md-skip dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
										<span>Hi, Marcus</span>
										<img src="dashboard_themes/assets/layouts/layout5/img/avatar1.jpg" alt="">
								</button>
						</div>
						<!-- END USER PROFILE-->
					</div>
					<!--END TOPBAR ACTION-->
				</div>
				<!-- BEGIN HEADER MENU -->
				<div class="nav-collapse collapse navbar-collapse navbar-responsive-collapse">
						<ul class="nav navbar-nav">
								<li class="dropdown dropdown-fw dropdown-fw-disabled">
										<router-link to="/" class="text-uppercase">
												<i class="icon-home"></i> Dashboard
										</router-link>
										<ul class="dropdown-menu dropdown-menu-fw">
												<li class="active">
													<router-link to="/home"><i class="icon-bar-chart"></i> Home</router-link>
												</li>
												<li>
													<router-link to="/home"><i class="icon-bulb"></i> Home 2</router-link>
												</li>
												<li>
													<router-link to="/home"><i class="icon-graph"></i> Home 3</router-link>
												</li>
										</ul>
								</li>
								<li class="dropdown dropdown-fw dropdown-fw-disabled active open selected">
										<router-link to="/asset">
											<i class="icon-briefcase"></i> TABLES
										</router-link>
										<ul class="dropdown-menu dropdown-menu-fw">
												<li class="dropdown more-dropdown-sub">
														<router-link to="/asset"><i class="fa fa-archive"></i> Asset</router-link>
													<ul class="dropdown-menu">
														<li>
															<router-link to="/add-asset">
																<i class="icon-home"></i> Add Asset
															</router-link>
														</li>
													</ul>
												</li>
												<li class="dropdown more-dropdown-sub">
														<router-link to="/location"><i class="icon-pointer"></i> Location</router-link>
														<ul class="dropdown-menu">
															<li>
																<router-link to="/add-location">
																	<i class="icon-home"></i> Add Location
																</router-link>
															</li>
														</ul>
												</li>
												<li>
														<router-link to="/type"><i class="fa fa-bookmark"></i> Type</router-link>
												</li>
										</ul>
								</li>
								<li class="dropdown dropdown-fw dropdown-fw-disabled  ">
										<a href="javascript:;" class="text-uppercase">
												<i class="icon-layers"></i> Pages </a>
										<ul class="dropdown-menu dropdown-menu-fw">
												<li class="dropdown more-dropdown-sub">
														<a href="javascript:;">
																<i class="icon-basket"></i> eCommerce </a>
														<ul class="dropdown-menu">
																<li>
																		<a href="ecommerce_index.html">
																				<i class="icon-home"></i> Dashboard </a>
																</li>
																<li>
																		<a href="ecommerce_orders.html">
																				<i class="icon-basket"></i> Orders </a>
																</li>
																<li>
																		<a href="ecommerce_orders_view.html">
																				<i class="icon-tag"></i> Order View </a>
																</li>
																<li>
																		<a href="ecommerce_products.html">
																				<i class="icon-graph"></i> Products </a>
																</li>
																<li>
																		<a href="ecommerce_products_edit.html">
																				<i class="icon-graph"></i> Product Edit </a>
																</li>
														</ul>
												</li>
												<li class="dropdown more-dropdown-sub">
														<a href="javascript:;">
																<i class="icon-docs"></i> Apps </a>
														<ul class="dropdown-menu">
																<li>
																		<a href="app_todo.html">
																				<i class="icon-clock"></i> Todo 1 </a>
																</li>
																<li>
																		<a href="app_todo_2.html">
																				<i class="icon-check"></i> Todo 2 </a>
																</li>
																<li>
																		<a href="app_inbox.html">
																				<i class="icon-envelope"></i> Inbox </a>
																</li>
																<li>
																		<a href="app_calendar.html">
																				<i class="icon-calendar"></i> Calendar </a>
																</li>
																<li>
																		<a href="app_ticket.html">
																				<i class="icon-notebook"></i> Support </a>
																</li>
														</ul>
												</li>
												<li class="dropdown more-dropdown-sub">
														<a href="javascript:;">
																<i class="icon-user"></i> User </a>
														<ul class="dropdown-menu">
																<li>
																		<a href="page_user_profile_1.html"> Profile 1 </a>
																</li>
																<li>
																		<a href="page_user_profile_1_account.html"> Profile 1 Account </a>
																</li>
																<li>
																		<a href="page_user_profile_1_help.html"> Profile 1 Help </a>
																</li>
																<li>
																		<a href="page_user_profile_2.html"> Profile 2 </a>
																</li>
																<li>
																		<a href="page_user_login_1.html"> Login Page 1 </a>
																</li>
																<li>
																		<a href="page_user_login_2.html"> Login Page 2 </a>
																</li>
																<li>
																		<a href="page_user_login_3.html"> Login Page 3 </a>
																</li>
																<li>
																		<a href="page_user_login_4.html"> Login Page 4 </a>
																</li>
																<li>
																		<a href="page_user_login_5.html"> Login Page 5 </a>
																</li>
																<li>
																		<a href="page_user_login_6.html"> Login Page 6 </a>
																</li>
																<li>
																		<a href="page_user_lock_1.html"> Lock Screen 1 </a>
																</li>
																<li>
																		<a href="page_user_lock_2.html"> Lock Screen 2 </a>
																</li>
														</ul>
												</li>
												<li class="dropdown more-dropdown-sub">
														<a href="javascript:;">
																<i class="icon-social-dribbble"></i> General </a>
														<ul class="dropdown-menu">
																<li>
																		<a href="page_general_about.html"> About </a>
																</li>
																<li>
																		<a href="page_general_contact.html"> Contact </a>
																</li>
																<li>
																		<a href="page_general_portfolio_1.html"> Portfolio 1 </a>
																</li>
																<li>
																		<a href="page_general_portfolio_2.html"> Portfolio 2 </a>
																</li>
																<li>
																		<a href="page_general_portfolio_3.html"> Portfolio 3 </a>
																</li>
																<li>
																		<a href="page_general_portfolio_4.html"> Portfolio 4 </a>
																</li>
																<li>
																		<a href="page_general_search.html"> Search 1 </a>
																</li>
																<li>
																		<a href="page_general_search_2.html"> Search 2 </a>
																</li>
																<li>
																		<a href="page_general_search_3.html"> Search 3 </a>
																</li>
																<li>
																		<a href="page_general_search_4.html"> Search 4 </a>
																</li>
																<li>
																		<a href="page_general_search_5.html"> Search 5 </a>
																</li>
																<li>
																		<a href="page_general_pricing.html"> Pricing </a>
																</li>
																<li>
																		<a href="page_general_pricing_2.html">
																				<i class="icon-tag"></i> Pricing 2 </a>
																</li>
																<li>
																		<a href="page_general_faq.html"> FAQ </a>
																</li>
																<li>
																		<a href="page_general_blog.html"> Blog </a>
																</li>
																<li>
																		<a href="page_general_blog_post.html"> Blog Post </a>
																</li>
																<li>
																		<a href="page_general_invoice.html"> Invoice </a>
																</li>
																<li>
																		<a href="page_general_invoice_2.html"> Invoice 2 </a>
																</li>
														</ul>
												</li>
												<li class="dropdown more-dropdown-sub">
														<a href="javascript:;">
																<i class="icon-settings"></i> System </a>
														<ul class="dropdown-menu">
																<li>
																		<a href="layout_blank_page.html"> Blank Page </a>
																</li>
																<li>
																		<a href="page_system_coming_soon.html"> Coming Soon </a>
																</li>
																<li>
																		<a href="page_system_404_1.html"> 404 Page 1 </a>
																</li>
																<li>
																		<a href="page_system_404_2.html"> 404 Page 2 </a>
																</li>
																<li>
																		<a href="page_system_404_3.html"> 404 Page 3 </a>
																</li>
																<li>
																		<a href="page_system_500_1.html"> 500 Page 1 </a>
																</li>
																<li>
																		<a href="page_system_500_2.html"> 500 Page 2 </a>
																</li>
														</ul>
												</li>
										</ul>
								</li>
								<li class="dropdown more-dropdown">
										<a href="javascript:;" class="text-uppercase"> More </a>
										<ul class="dropdown-menu">
												<li>
														<a href="#">Link 1</a>
												</li>
												<li>
														<a href="#">Link 2</a>
												</li>
												<li>
														<a href="#">Link 3</a>
												</li>
												<li>
														<a href="#">Link 4</a>
												</li>
												<li>
														<a href="#">Link 5</a>
												</li>
										</ul>
								</li>
						</ul>
				</div>
				<!-- END HEADER MENU -->
			</div>
		</nav>
	</header>
