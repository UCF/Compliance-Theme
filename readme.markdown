# UCF University Compliance, Ethics, and Risk Office WordPress Theme
Theme written off of Generic Theme for the University Compliance, Ethics, and Risk Office.


## Required Plugins
* n/a

## Installation Requirements
* n/a


## Deployment

This theme relies on Twitter's Bootstrap framework. UCF's fork of the Bootstrap project (http://github.com/UCF/bootstrap/) is added as submodule in static/bootstrap. When deploying this theme, the submodule must be initialized and the correct branch of the Bootstrap repo should be checked out.

1. If this is a brand new clone, run `git submodule update --init static/bootstrap` from the theme's root directory after cloning.  Alternatively when cloning, you can instead run the command `git clone --recursive` to clone the theme and its submodule(s).
2. `cd static/bootstrap`, then checkout the `base-no1200` branch of the Bootstrap repo; `git checkout base-no1200`.  This branch's bootstrap resources should already be compiled.


## Development

This theme relies on Twitter's Bootstrap framework. UCF's fork of the Bootstrap project (http://github.com/UCF/bootstrap/) is added as submodule in static/bootstrap. To compile bootstrap:

1. If this is a brand new clone, run `git submodule update --init static/bootstrap` from the theme's root directory.
2. If they are not already installed, install the dependencies in the Developers section of the Boostrap README
3. Checkout the latest tag of Bootstrap from the static/bootstrap directory.  If you're developing a theme off of Generic and need to make changes to the default Bootstrap .less files, create a new branch of the Bootstrap fork for your theme and check it out.
4. Run `make bootstrap` from the static/bootstrap directory to compile the files into static/bootstrap/bootstrap.  If you've created a new Bootstrap branch, be sure to push the compiled files back up to that branch (this must be done from the static/bootstrap directory.)


## Notes
* This theme uses a static home page template instead of the content of a page titled 'Home'.  In the WordPress Settings > Reading settings, 'Front Page displays' should be set to 'Your latest posts' and NOT a static page.  Home page elements can be customized from the Theme Options admin area.
* More information on this theme's framework, registered post types, taxonomies, and shortcodes can be viewed in the [Generic Theme's readme](https://github.com/UCF/Wordpress-Generic-Theme/blob/master/readme.markdown).
*This theme requires the Advanced Custom Fields plugin.


## Shortcodes
This theme contains all of the shortcodes from the Generic Theme (except for search_form).  The shortcodes below have been added for this theme:

### [page-link]
* Create a link to page (or other custom post type) specified by its title.  (Enclosing shortcode)

### [page-url]
* Similar to [page-link], but returns just the URL of the page specified.  (Self-enclosing shortcode)

### [contact-info]
* Displays the organization's contact info, defined in the site Theme Options.