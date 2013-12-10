vimeoembed
==========

Vimeo's Embed code doesn't work for IE8 or IE9 for a lot of people. Vimeo's old embed code, which uses `object` tags does work in IE8+, but doesn't work on tablets.

Hence this filter. When enabled, it allows you to insert vimeo content using a wordpress-like shortcode:

[vimeo id=123456 w=504 h=218]

and the filter will inspect the browser and decide whether or not to use the iframe or object tag to embed the file, ensuring it works on all your required platforms.

