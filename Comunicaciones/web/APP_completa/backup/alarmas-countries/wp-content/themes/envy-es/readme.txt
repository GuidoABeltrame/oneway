==========
DESCRIPTION
==========
Released under Creative Commons Attribution-Share Alike 3.0, Envy is a blue, two column, widget-ready, rounded-corners, private WordPress theme modified for public use.

===========
INSTALLATION
===========

1. Obviously, you've already unzipped the downloaded zip file.
2. Upload the "envy" folder to "wp-content/themes/"
3. Log into WordPress Administration Panel.
4. Click on the "Presentation" link.
5. Find the thumbnail or link for the Envy theme.
6. Click on it to install.

(7. Refresh your blog to see the newly installed theme.)

=========
QUICK TIPS
=========

Addling class="alignleft" or class="alignright" to an image tag will make that image float left or right.
Adding class="centered" will center that image.

The horizontal menus with overlapping tabs require the CSS selectors .first and .last, .first for the first list-item and .last for the last list-item. The first and last list-items also have conditional, matching IDs: #firstcurrent and #lastcurrent.

To get both horizontal menus, top and bottom, working correctly, you need to enter your own links and conditional tags.

Here's an example of adding another link to either top or bottom menu:

			<li <?php if (is_page('your-page-url')) { echo " id=\"current\""; } ?>>
<a href="<?php bloginfo('url'); ?>/your-page-url/" title="Your link title">Your link</a>
			</li>

For all conditional tags, visit:
http://codex.wordpress.org/Conditional_Tags

================
ADDITIONAL CREDITS
================

This theme uses icons by Fam Fam Fam at:
http://www.famfamfam.com/lab/icons/silk/

Thanks to NDesign-Studio.com for the search icon.

=======
SUPPORT
=======
For all questions and answers, use the Wpdesigner forums at:
http://www.wpdesigner.com/forums/

