set :application, "Orbe"
set :domain,      "pjdorbe.com"
set :deploy_to,   "/var/www/html/deploys"

set :repository,  "git@github.com:duvg7/Presentation.git"
set :scm,         :git
# Or: `accurev`, `bzr`, `cvs`, `darcs`, `subversion`, `mercurial`, `perforce`, or `none`

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain, :primary => true       # This may be the same as your `Web` server

set  :keep_releases,  3