=== Content and Image Teaser ===
Contributors: Divine Developer
Donate Link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=info%40divinedeveloper%2ecom&lc=SE&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHostedGuest
Tags: excerpt,content,word limit
Requires at least: 2.0
Tested up to: 2.8.4
Stable tag: 0.1

Allows users to limit the number or words that are displayed when they want the excerpt or content of a post to appear. 

== Description ==

This plugin limits content on front or archive page after set number of words, add gettexted more link to the end of it , pull out only wordpress allowed html tags, check if any xhtml tag is unclosed and close it, take and resize first image from the post.

In your theme file find

<pre>&lt;?php the_content('Read more...'); ?&gt; </pre>

And replace it with

<pre>&lt;?php content(100, __('(more...)')); ?&gt;</pre>

== Installation ==

1. Unzip the content-and-image-teaser.zip file.
2. Upload the content-and-image-teaser folder to the /wp-content/plugins/ directory.
3. Activate the plugin through the 'Plugins' menu isn WordPress.
4. Place following code in your theme (index.php, archive.php) within the loop:

<pre>&lt;?php content(100, __('(more...)')); ?&gt;</pre>

== Frequently Asked Questions == 

1) How do I change how many words are displayed displayed?

Change 100 to another number. Example:

<pre>&lt;?php content(150, __('(more...)')); ?&gt;</pre>


== Screenshots ==

Content and Image Teaser

== Change Log ==

Initial Public Release