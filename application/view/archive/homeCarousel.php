<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<title>
	Flexeye
	</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<!-- bootstrap 3.0.2 -->
	
	<!-- Stylesheets -->
<!-- Bootstrap is included in its original form, unaltered -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<!-- Related styles of various icon packs and plugins -->
<link rel="stylesheet" href="assets/css/plugins.css">

<!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
<link rel="stylesheet" href="assets/css/main.css">

<!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

<!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
<link rel="stylesheet" href="assets/css/themes.css">
<!-- END Stylesheets -->
<script src="assets/js/vendor/modernizr-2.7.1-respond-1.4.2.min.js"></script>
</head>
<body class="page-loading" >
<script>setTimeout(function() {$('body').removeClass('page-loading');}, 2000);</script>
<div class="preloader themed-background">
            <h1 class="push-top-bottom text-light text-center"><strong>Please Wait </strong>a moment</h1>
            <div class="inner">
                <h3 class="text-light visible-lt-ie9 visible-lt-ie10"><strong>Loading..</strong></h3>
				<br/>
				</br>
                <div class="preloader-spinner hidden-lt-ie9 hidden-lt-ie10"></div>
            </div>
</div>
<div class="header-fixed-top sidebar-partial sidebar-visible-lg sidebar-no-animations footer-fixed" id="page-container">
            <!-- Alternative Sidebar -->
            <div id="sidebar-alt">
                <!-- Wrapper for scrolling functionality -->
                <div class="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <div class="sidebar-content">
                        <!-- Chat -->
                        <!-- Chat demo functionality initialized in js/app.js -> chatUi() -->
                        <a href="page_ready_chat.html" class="sidebar-title">
                            <i class="gi gi-comments pull-right"></i> <strong>Chat</strong>UI
                        </a>
                        <!-- Chat Users -->
                        <ul class="chat-users clearfix">
                            <li>
                                <a href="javascript:void(0)" class="chat-user-online">
                                    <span></span>
                                    <img src="img/placeholders/avatars/avatar12.jpg" alt="avatar" class="img-circle">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="chat-user-online">
                                    <span></span>
                                    <img src="img/placeholders/avatars/avatar15.jpg" alt="avatar" class="img-circle">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="chat-user-online">
                                    <span></span>
                                    <img src="img/placeholders/avatars/avatar10.jpg" alt="avatar" class="img-circle">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="chat-user-online">
                                    <span></span>
                                    <img src="img/placeholders/avatars/avatar4.jpg" alt="avatar" class="img-circle">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="chat-user-away">
                                    <span></span>
                                    <img src="img/placeholders/avatars/avatar7.jpg" alt="avatar" class="img-circle">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="chat-user-away">
                                    <span></span>
                                    <img src="img/placeholders/avatars/avatar9.jpg" alt="avatar" class="img-circle">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="chat-user-busy">
                                    <span></span>
                                    <img src="img/placeholders/avatars/avatar16.jpg" alt="avatar" class="img-circle">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <span></span>
                                    <img src="img/placeholders/avatars/avatar1.jpg" alt="avatar" class="img-circle">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <span></span>
                                    <img src="img/placeholders/avatars/avatar4.jpg" alt="avatar" class="img-circle">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <span></span>
                                    <img src="img/placeholders/avatars/avatar3.jpg" alt="avatar" class="img-circle">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <span></span>
                                    <img src="img/placeholders/avatars/avatar13.jpg" alt="avatar" class="img-circle">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <span></span>
                                    <img src="img/placeholders/avatars/avatar5.jpg" alt="avatar" class="img-circle">
                                </a>
                            </li>
                        </ul>
                        <!-- END Chat Users -->

                        <!-- Chat Talk -->
                        <div class="chat-talk display-none">
                            <!-- Chat Info -->
                            <div class="chat-talk-info sidebar-section">
                                <img src="img/placeholders/avatars/avatar5.jpg" alt="avatar" class="img-circle pull-left">
                                <strong>John</strong> Doe
                                <button id="chat-talk-close-btn" class="btn btn-xs btn-default pull-right">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                            <!-- END Chat Info -->

                            <!-- Chat Messages -->
                            <ul class="chat-talk-messages">
                                <li class="text-center"><small>Yesterday, 18:35</small></li>
                                <li class="chat-talk-msg animation-slideRight">Hey admin?</li>
                                <li class="chat-talk-msg animation-slideRight">How are you?</li>
                                <li class="text-center"><small>Today, 7:10</small></li>
                                <li class="chat-talk-msg chat-talk-msg-highlight themed-border animation-slideLeft">I'm fine, thanks!</li>
                            </ul>
                            <!-- END Chat Messages -->

                            <!-- Chat Input -->
                            <form action="index.html" method="post" id="sidebar-chat-form" class="chat-form">
                                <input type="text" id="sidebar-chat-message" name="sidebar-chat-message" class="form-control form-control-borderless" placeholder="Type a message..">
                            </form>
                            <!-- END Chat Input -->
                        </div>
                        <!--  END Chat Talk -->
                        <!-- END Chat -->

                        <!-- Activity -->
                        <a href="javascript:void(0)" class="sidebar-title">
                            <i class="fa fa-globe pull-right"></i> <strong>Activity</strong>UI
                        </a>
                        <div class="sidebar-section">
                            <div class="alert alert-danger alert-alt">
                                <small>just now</small><br>
                                <i class="fa fa-thumbs-up fa-fw"></i> Upgraded to Pro plan
                            </div>
                            <div class="alert alert-info alert-alt">
                                <small>2 hours ago</small><br>
                                <i class="gi gi-coins fa-fw"></i> You had a new sale!
                            </div>
                            <div class="alert alert-success alert-alt">
                                <small>3 hours ago</small><br>
                                <i class="fa fa-plus fa-fw"></i> <a href="page_ready_user_profile.html"><strong>John Doe</strong></a> would like to become friends!<br>
                                <a href="javascript:void(0)" class="btn btn-xs btn-primary"><i class="fa fa-check"></i> Accept</a>
                                <a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Ignore</a>
                            </div>
                            <div class="alert alert-warning alert-alt">
                                <small>2 days ago</small><br>
                                Running low on space<br><strong>18GB in use</strong> 2GB left<br>
                                <a href="page_ready_pricing_tables.html" class="btn btn-xs btn-primary"><i class="fa fa-arrow-up"></i> Upgrade Plan</a>
                            </div>
                        </div>
                        <!-- END Activity -->

                        <!-- Messages -->
                        <a href="page_ready_inbox.html" class="sidebar-title">
                            <i class="fa fa-envelope pull-right"></i> <strong>Messages</strong>UI (5)
                        </a>
                        <div class="sidebar-section">
                            <div class="alert alert-alt">
                                Debra Stanley<small class="pull-right">just now</small><br>
                                <a href="page_ready_inbox_message.html"><strong>New Follower</strong></a>
                            </div>
                            <div class="alert alert-alt">
                                Sarah Cole<small class="pull-right">2 min ago</small><br>
                                <a href="page_ready_inbox_message.html"><strong>Your subscription was updated</strong></a>
                            </div>
                            <div class="alert alert-alt">
                                Bryan Porter<small class="pull-right">10 min ago</small><br>
                                <a href="page_ready_inbox_message.html"><strong>A great opportunity</strong></a>
                            </div>
                            <div class="alert alert-alt">
                                Jose Duncan<small class="pull-right">30 min ago</small><br>
                                <a href="page_ready_inbox_message.html"><strong>Account Activation</strong></a>
                            </div>
                            <div class="alert alert-alt">
                                Henry Ellis<small class="pull-right">40 min ago</small><br>
                                <a href="page_ready_inbox_message.html"><strong>You reached 10.000 Followers!</strong></a>
                            </div>
                        </div>
                        <!-- END Messages -->
                    </div>
                    <!-- END Sidebar Content -->
                </div>
                <!-- END Wrapper for scrolling functionality -->
            </div>
            <!-- END Alternative Sidebar -->

            <!-- Main Sidebar -->
            <div id="sidebar">
                <!-- Wrapper for scrolling functionality -->
                <div class="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <div class="sidebar-content">
                        <!-- Brand -->
                        <a href="index.html" class="sidebar-brand">
                            <i class="gi gi-flash"></i><strong>Pro</strong>UI
                        </a>
                        <!-- END Brand -->

                        <!-- User Info -->
                        <div class="sidebar-section sidebar-user clearfix">
                            <div class="sidebar-user-avatar">
                                <a href="page_ready_user_profile.html">
                                    <img src="img/placeholders/avatars/avatar2.jpg" alt="avatar">
                                </a>
                            </div>
                            <div class="sidebar-user-name">John Doe</div>
                            <div class="sidebar-user-links">
                                <a href="page_ready_user_profile.html" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
                                <a href="page_ready_inbox.html" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a>
                                <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                                <a href="#modal-user-settings" data-toggle="modal" class="enable-tooltip" data-placement="bottom" title="Settings"><i class="gi gi-cogwheel"></i></a>
                                <a href="login.html" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
                            </div>
                        </div>
                        <!-- END User Info -->

                        <!-- Theme Colors -->
                        <!-- Change Color Theme functionality can be found in js/app.js - templateOptions() -->
                        <ul class="sidebar-section sidebar-themes clearfix">
                            <li class="active">
                                <a href="javascript:void(0)" class="themed-background-dark-default themed-border-default" data-theme="default" data-toggle="tooltip" title="Default Blue"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-dark-night themed-border-night" data-theme="css/themes/night.css" data-toggle="tooltip" title="Night"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-dark-amethyst themed-border-amethyst" data-theme="css/themes/amethyst.css" data-toggle="tooltip" title="Amethyst"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-dark-modern themed-border-modern" data-theme="css/themes/modern.css" data-toggle="tooltip" title="Modern"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-dark-autumn themed-border-autumn" data-theme="css/themes/autumn.css" data-toggle="tooltip" title="Autumn"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-dark-flatie themed-border-flatie" data-theme="css/themes/flatie.css" data-toggle="tooltip" title="Flatie"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-dark-spring themed-border-spring" data-theme="css/themes/spring.css" data-toggle="tooltip" title="Spring"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-dark-fancy themed-border-fancy" data-theme="css/themes/fancy.css" data-toggle="tooltip" title="Fancy"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-dark-fire themed-border-fire" data-theme="css/themes/fire.css" data-toggle="tooltip" title="Fire"></a>
                            </li>
                        </ul>
                        <!-- END Theme Colors -->

                        <!-- Sidebar Navigation -->
                        <ul class="sidebar-nav">
                            <li>
                                <a href="index.html"><i class="gi gi-stopwatch sidebar-nav-icon"></i>Dashboard</a>
                            </li>
                            <li class="sidebar-header">
                                <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a><a href="javascript:void(0)" data-toggle="tooltip" title="Create the most amazing pages with the widget kit!"><i class="gi gi-lightbulb"></i></a></span>
                                <span class="sidebar-header-title">Widget Kit</span>
                            </li>
                            <li>
                                <a href="page_widgets_stats.html"><i class="gi gi-charts sidebar-nav-icon"></i>Statistics</a>
                            </li>
                            <li>
                                <a href="page_widgets_social.html"><i class="gi gi-share_alt sidebar-nav-icon"></i>Social</a>
                            </li>
                            <li>
                                <a href="page_widgets_media.html"><i class="gi gi-film sidebar-nav-icon"></i>Media</a>
                            </li>
                            <li>
                                <a href="page_widgets_links.html"><i class="gi gi-link sidebar-nav-icon"></i>Links</a>
                            </li>
                            <li class="sidebar-header">
                                <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
                                <span class="sidebar-header-title">Design Kit</span>
                            </li>
                            <li class="active">
                                <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-certificate sidebar-nav-icon"></i>User Interface</a>
                                <ul>
                                    <li>
                                        <a href="page_ui_grid_blocks.html">Grid &amp; Blocks</a>
                                    </li>
                                    <li>
                                        <a href="page_ui_draggable_blocks.html">Draggable Blocks</a>
                                    </li>
                                    <li>
                                        <a href="page_ui_typography.html">Typography</a>
                                    </li>
                                    <li>
                                        <a href="page_ui_buttons_dropdowns.html">Buttons &amp; Dropdowns</a>
                                    </li>
                                    <li>
                                        <a href="page_ui_navigation_more.html">Navigation &amp; More</a>
                                    </li>
                                    <li>
                                        <a href="page_ui_horizontal_menu.html" class=" active">Horizontal Menu</a>
                                    </li>
                                    <li>
                                        <a href="page_ui_progress_loading.html">Progress &amp; Loading</a>
                                    </li>
                                    <li>
                                        <a href="page_ui_preloader.html">Page Preloader</a>
                                    </li>
                                    <li>
                                        <a href="page_ui_color_themes.html">Color Themes</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-notes_2 sidebar-nav-icon"></i>Forms</a>
                                <ul>
                                    <li>
                                        <a href="page_forms_general.html">General</a>
                                    </li>
                                    <li>
                                        <a href="page_forms_components.html">Components</a>
                                    </li>
                                    <li>
                                        <a href="page_forms_validation.html">Validation</a>
                                    </li>
                                    <li>
                                        <a href="page_forms_wizard.html">Wizard</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-table sidebar-nav-icon"></i>Tables</a>
                                <ul>
                                    <li>
                                        <a href="page_tables_general.html">General</a>
                                    </li>
                                    <li>
                                        <a href="page_tables_responsive.html">Responsive</a>
                                    </li>
                                    <li>
                                        <a href="page_tables_datatables.html">Datatables</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-cup sidebar-nav-icon"></i>Icon Sets</a>
                                <ul>
                                    <li>
                                        <a href="page_icons_fontawesome.html">Font Awesome</a>
                                    </li>
                                    <li>
                                        <a href="page_icons_glyphicons_pro.html">Glyphicons Pro</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i>Page Layouts</a>
                                <ul>
                                    <li>
                                        <a href="page_layout_static.html">Static</a>
                                    </li>
                                    <li>
                                        <a href="page_layout_static_fixed_footer.html">Static + Fixed Footer</a>
                                    </li>
                                    <li>
                                        <a href="page_layout_fixed_top.html">Fixed Top Header</a>
                                    </li>
                                    <li>
                                        <a href="page_layout_fixed_top_footer.html">Fixed Top Header + Footer</a>
                                    </li>
                                    <li>
                                        <a href="page_layout_fixed_bottom.html">Fixed Bottom Header</a>
                                    </li>
                                    <li>
                                        <a href="page_layout_fixed_bottom_footer.html">Fixed Bottom Header + Footer</a>
                                    </li>
                                    <li>
                                        <a href="page_layout_static_main_sidebar_partial.html">Partial Main Sidebar</a>
                                    </li>
                                    <li>
                                        <a href="page_layout_static_main_sidebar_visible.html">Visible Main Sidebar</a>
                                    </li>
                                    <li>
                                        <a href="page_layout_static_alternative_sidebar_partial.html">Partial Alternative Sidebar</a>
                                    </li>
                                    <li>
                                        <a href="page_layout_static_alternative_sidebar_visible.html">Visible Alternative Sidebar</a>
                                    </li>
                                    <li>
                                        <a href="page_layout_static_no_sidebars.html">No Sidebars</a>
                                    </li>
                                    <li>
                                        <a href="page_layout_static_both_partial.html">Both Sidebars Partial</a>
                                    </li>
                                    <li>
                                        <a href="page_layout_static_animated.html">Animated Sidebar Transitions</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-header">
                                <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
                                <span class="sidebar-header-title">Develop Kit</span>
                            </li>
                            <li>
                                <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="fa fa-wrench sidebar-nav-icon"></i>Components</a>
                                <ul>
                                    <li>
                                        <a href="#" class="sidebar-nav-submenu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>3 Level Menu</a>
                                        <ul>
                                            <li>
                                                <a href="#">Link 1</a>
                                            </li>
                                            <li>
                                                <a href="#">Link 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="page_comp_maps.html">Maps</a>
                                    </li>
                                    <li>
                                        <a href="page_comp_charts.html">Charts</a>
                                    </li>
                                    <li>
                                        <a href="page_comp_gallery.html">Gallery</a>
                                    </li>
                                    <li>
                                        <a href="page_comp_carousel.html">Carousel</a>
                                    </li>
                                    <li>
                                        <a href="page_comp_calendar.html">Calendar</a>
                                    </li>
                                    <li>
                                        <a href="page_comp_animations.html">CSS3 Animations</a>
                                    </li>
                                    <li>
                                        <a href="page_comp_syntax_highlighting.html">Syntax Highlighting</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-brush sidebar-nav-icon"></i>Ready Pages</a>
                                <ul>
                                    <li>
                                        <a href="#" class="sidebar-nav-submenu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>Errors</a>
                                        <ul>
                                            <li>
                                                <a href="page_ready_400.html">400</a>
                                            </li>
                                            <li>
                                                <a href="page_ready_401.html">401</a>
                                            </li>
                                            <li>
                                                <a href="page_ready_403.html">403</a>
                                            </li>
                                            <li>
                                                <a href="page_ready_404.html">404</a>
                                            </li>
                                            <li>
                                                <a href="page_ready_500.html">500</a>
                                            </li>
                                            <li>
                                                <a href="page_ready_503.html">503</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="sidebar-nav-submenu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>Get Started</a>
                                        <ul>
                                            <li>
                                                <a href="page_ready_blank.html">Blank</a>
                                            </li>
                                            <li>
                                                <a href="page_ready_blank_alt.html">Blank Alternative</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="page_ready_search_results.html">Search Results (4)</a>
                                    </li>
                                    <li>
                                        <a href="page_ready_article.html">Article</a>
                                    </li>
                                    <li>
                                        <a href="page_ready_user_profile.html">User Profile</a>
                                    </li>
                                    <li>
                                        <a href="page_ready_contacts.html">Contacts</a>
                                    </li>
                                    <li>
                                        <a href="#" class="sidebar-nav-submenu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>e-Learning</a>
                                        <ul>
                                            <li>
                                                <a href="page_ready_elearning_courses.html">Courses</a>
                                            </li>
                                            <li>
                                                <a href="page_ready_elearning_course_lessons.html">Course - Lessons</a>
                                            </li>
                                            <li>
                                                <a href="page_ready_elearning_course_lesson.html">Course - Lesson Page</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="sidebar-nav-submenu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>Message Center</a>
                                        <ul>
                                            <li>
                                                <a href="page_ready_inbox.html">Inbox</a>
                                            </li>
                                            <li>
                                                <a href="page_ready_inbox_compose.html">Compose Message</a>
                                            </li>
                                            <li>
                                                <a href="page_ready_inbox_message.html">View Message</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="page_ready_chat.html">Chat</a>
                                    </li>
                                    <li>
                                        <a href="page_ready_timeline.html">Timeline</a>
                                    </li>
                                    <li>
                                        <a href="page_ready_tickets.html">Tickets</a>
                                    </li>
                                    <li>
                                        <a href="page_ready_tasks.html">Tasks</a>
                                    </li>
                                    <li>
                                        <a href="page_ready_faq.html">FAQ</a>
                                    </li>
                                    <li>
                                        <a href="page_ready_pricing_tables.html">Pricing Tables</a>
                                    </li>
                                    <li>
                                        <a href="page_ready_invoice.html">Invoice</a>
                                    </li>
                                    <li>
                                        <a href="page_ready_forum.html">Forum (3)</a>
                                    </li>
                                    <li>
                                        <a href="#" class="sidebar-nav-submenu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>Login, Register &amp; Lock</a>
                                        <ul>
                                            <li>
                                                <a href="login.html">Login</a>
                                            </li>
                                            <li>
                                                <a href="login_full.html">Login (Full Background)</a>
                                            </li>
                                            <li>
                                                <a href="login_alt.html">Login 2</a>
                                            </li>
                                            <li>
                                                <a href="login.html#reminder">Password Reminder</a>
                                            </li>
                                            <li>
                                                <a href="login_alt.html#reminder">Password Reminder 2</a>
                                            </li>
                                            <li>
                                                <a href="login.html#register">Register</a>
                                            </li>
                                            <li>
                                                <a href="login_alt.html#register">Register 2</a>
                                            </li>
                                            <li>
                                                <a href="page_ready_lock_screen.html">Lock Screen</a>
                                            </li>
                                            <li>
                                                <a href="page_ready_lock_screen_alt.html">Lock Screen 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!-- END Sidebar Navigation -->

                        <!-- Sidebar Notifications -->
                        <div class="sidebar-header">
                            <span class="sidebar-header-options clearfix">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Refresh"><i class="gi gi-refresh"></i></a>
                            </span>
                            <span class="sidebar-header-title">Activity</span>
                        </div>
                        <div class="sidebar-section">
                            <div class="alert alert-success alert-alt">
                                <small>5 min ago</small><br>
                                <i class="fa fa-thumbs-up fa-fw"></i> You had a new sale ($10)
                            </div>
                            <div class="alert alert-info alert-alt">
                                <small>10 min ago</small><br>
                                <i class="fa fa-arrow-up fa-fw"></i> Upgraded to Pro plan
                            </div>
                            <div class="alert alert-warning alert-alt">
                                <small>3 hours ago</small><br>
                                <i class="fa fa-exclamation fa-fw"></i> Running low on space<br><strong>18GB in use</strong> 2GB left
                            </div>
                            <div class="alert alert-danger alert-alt">
                                <small>Yesterday</small><br>
                                <i class="fa fa-bug fa-fw"></i> <a href="javascript:void(0)"><strong>New bug submitted</strong></a>
                            </div>
                        </div>
                        <!-- END Sidebar Notifications -->
                    </div>
                    <!-- END Sidebar Content -->
                </div>
                <!-- END Wrapper for scrolling functionality -->
            </div>
            <!-- END Main Sidebar -->


            <!-- Main Container -->
            <div id="main-container">
                <!-- Header -->
                <!-- In the PHP version you can set the following options from inc/config file -->
                <!--
                    Available header.navbar classes:

                    'navbar-default'            for the default light header
                    'navbar-inverse'            for an alternative dark header

                    'navbar-fixed-top'          for a top fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
                        'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

                    'navbar-fixed-bottom'       for a bottom fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
                        'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
                -->
                <header class="navbar navbar-default navbar-fixed-top">
                
                    <!-- Navbar Header -->
                    <div class="navbar-header">
                        <!-- Horizontal Menu Toggle + Alternative Sidebar Toggle Button, Visible only in small screens (< 768px) -->
                        <ul class="nav navbar-nav-custom pull-right visible-xs">
                            <li>
                                <a data-target="#horizontal-menu-collapse" data-toggle="collapse" href="javascript:void(0)">Menu</a>
                            </li>
                            <li>
                                <a onclick="App.sidebar('toggle-sidebar-alt');" href="javascript:void(0)">
                                    <i class="gi gi-share_alt"></i>
                                    <span class="label label-primary label-indicator animation-floating">4</span>
                                </a>
                            </li>
                        </ul>
                        <!-- END Horizontal Menu Toggle + Alternative Sidebar Toggle Button -->

                        <!-- Main Sidebar Toggle Button -->
                        <ul class="nav navbar-nav-custom">
                            <li>
                                <a onclick="App.sidebar('toggle-sidebar');" href="javascript:void(0)">
                                    <i class="fa fa-bars fa-fw"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- END Main Sidebar Toggle Button -->
                    </div>
                    <!-- END Navbar Header -->

                    <!-- Alternative Sidebar Toggle Button, Visible only in large screens (> 767px) -->
                    <ul class="nav navbar-nav-custom pull-right hidden-xs">
                        <li>
                            <!-- If you do not want the main sidebar to open when the alternative sidebar is closed, just remove the second parameter: App.sidebar('toggle-sidebar-alt'); -->
                            <a onclick="App.sidebar('toggle-sidebar-alt', 'toggle-other');" href="javascript:void(0)">
                                <i class="gi gi-share_alt"></i>
                                <span class="label label-primary label-indicator animation-floating">4</span>
                            </a>
                        </li>
                    </ul>
                    <!-- END Alternative Sidebar Toggle Button -->

                    <!-- Horizontal Menu + Search -->
                    <div class="collapse navbar-collapse" id="horizontal-menu-collapse">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="javascript:void(0)">Home</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Profile</a>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)">Settings <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="fa fa-asterisk fa-fw pull-right"></i> General</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-lock fa-fw pull-right"></i> Security</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-user fa-fw pull-right"></i> Account</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-magnet fa-fw pull-right"></i> Subscription</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="javascript:void(0)"><i class="fa fa-chevron-right fa-fw pull-right"></i> More Settings</a>
                                        <ul class="dropdown-menu">
                                            <li><a tabindex="-1" href="javascript:void(0)">Second level</a></li>
                                            <li><a href="javascript:void(0)">Second level</a></li>
                                            <li><a href="javascript:void(0)">Second level</a></li>
                                            <li class="divider"></li>
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="javascript:void(0)"><i class="fa fa-chevron-right fa-fw pull-right"></i> More Settings</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="javascript:void(0)">Third level</a></li>
                                                    <li><a href="javascript:void(0)">Third level</a></li>
                                                    <li><a href="javascript:void(0)">Third level</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)">Contact <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="fa fa-envelope-o fa-fw pull-right"></i> By Email</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-phone fa-fw pull-right"></i> By Phone</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form action="page_ready_search_results.html" method="post" class="navbar-form-custom" role="search">
                        <div class="form-group">
                            <input type="text" id="top-search" name="top-search" class="form-control" placeholder="Search..">
                        </div>
                    </form>
                    </div>
                    <!-- END Horizontal Menu + Search -->
                </header>
                <!-- END Header -->

                <!-- Page content -->
                <div id="page-content" style="min-height: 378px;">
                    <!-- Fixed Top Header + Footer Header -->
                    <div class="content-header content-header-media">
                        <div class="header-section">
                            <div class="row">
                                <!-- Main Title (hidden on small devices for the statistics to fit) -->
                                <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                                    <h1>Welcome <strong>Admin</strong><br><small>You Look Awesome!</small></h1>
                                </div>
                                <!-- END Main Title -->

                                <!-- Top Stats -->
                                <div class="col-md-8 col-lg-6">
                                    <div class="row text-center">
                                        <div class="col-xs-4 col-sm-3">
                                            <h2 class="animation-hatch">
                                                $<strong>93.7k</strong><br>
                                                <small><i class="fa fa-thumbs-o-up"></i> Great</small>
                                            </h2>
                                        </div>
                                        <div class="col-xs-4 col-sm-3">
                                            <h2 class="animation-hatch">
                                                <strong>167k</strong><br>
                                                <small><i class="fa fa-heart-o"></i> Likes</small>
                                            </h2>
                                        </div>
                                        <div class="col-xs-4 col-sm-3">
                                            <h2 class="animation-hatch">
                                                <strong>101</strong><br>
                                                <small><i class="fa fa-calendar-o"></i> Events</small>
                                            </h2>
                                        </div>
                                        <!-- We hide the last stat to fit the other 3 on small devices -->
                                        <div class="col-sm-3 hidden-xs">
                                            <h2 class="animation-hatch">
                                                <strong>27° C</strong><br>
                                                <small><i class="fa fa-map-marker"></i> Sydney</small>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Top Stats -->
                            </div>
                        </div>
                        <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
                        <!--img class="animation-pulseSlow" alt="header image" src="assets/img/home-carousel3.jpg"-->
						<div class="carousel slide" id="example-carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li class="" data-slide-to="0" data-target="#example-carousel"></li>
                                        <li data-slide-to="1" data-target="#example-carousel" class=""></li>
                                        <li data-slide-to="2" data-target="#example-carousel" class="active"></li>
                                        <li data-slide-to="3" data-target="#example-carousel" class=""></li>
                                    </ol>
                                    <!-- END Indicators -->

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <img class="animation-pulseSlow" alt="image" src="assets/img/home-carousel3.jpg" style="margin-top:-100px">
                                            
                                        </div>
                                        <div class="item">
                                            <img alt="image" src="assets/img/home-carousel4.jpg" style="margin-top:-100px">
                                            
                                        </div>
                                        <div class="item">
                                            <img alt="image" src="assets/img/home-carousel3.jpg" style="margin-top:-100px">
                                            
                                        </div>
                                        <div class="item">
                                            <img alt="image" src="assets/img/home-carousel4.jpg" style="margin-top:-100px">
                                            
                                        </div>
                                    </div>
                                    <!-- END Wrapper for slides -->

                                    <!-- Controls -->
                                    <a data-slide="prev" href="#example-carousel" class="left carousel-control">
                                        <span><i class="fa fa-chevron-left"></i></span>
                                    </a>
                                    <a data-slide="next" href="#example-carousel" class="right carousel-control">
                                        <span><i class="fa fa-chevron-right"></i></span>
                                    </a>
                                    <!-- END Controls -->
                                </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li>Page Layouts</li>
                        <li><a href="">Fixed Top Header+ Footer</a></li>
                    </ul>
                    <!-- END Fixed Top Header + Footer Header -->

                    <!-- Dummy Content -->
                    <div class="block full block-alt-noborder">
                        <h3 class="sub-header text-center"><strong>Dummy Content</strong> for layout demostration</h3>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                                <article>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque?</p>
                                    <p>Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit. Ut egestas tempor est, in cursus enim venenatis eget! Nulla quis ligula ipsum. Donec vitae ultrices dolor? Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque?</p>
                                    <p>Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit. Ut egestas tempor est, in cursus enim venenatis eget! Nulla quis ligula ipsum. Donec vitae ultrices dolor? Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus.</p>
                                </article>
                            </div>
                        </div>
                    </div>
                    <!-- END Dummy Content -->
                </div>
                <!-- END Page Content -->

                <!-- Footer -->
                <footer class="clearfix">
                    <div class="pull-right">
                        Crafted with <i class="fa fa-heart text-danger"></i> by <a target="_blank" href="http://goo.gl/vNS3I">pixelcave</a>
                    </div>
                    <div class="pull-left">
                        <span id="year-copy">2014</span> &copy; <a target="_blank" href="http://goo.gl/TDOSuC">ProUI 2.1</a>
                    </div>
                </footer>
                <!-- END Footer -->
            </div>
            <!-- END Main Container -->
        </div>		
        
<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/vendor/bootstrap.min.js"></script>
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/app.js"></script>
	</body>
</html>