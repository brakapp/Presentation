set  :application,     "Orbe"
set  :deploy_to,        "/var/www/html/deploys"
set  :domain,          "http://www.orbesa.com.co/"
set  :scm,             :git
set  :repository,      "git@github.com:duvg7/Presentation.git"
role :web,             domain
role :app,             domain
role :db,              domain, :primary => true
set  :use_sudo         false
set  :keep_release,    3
set  :shared_files,    ["app/config/parameters.ini"]
set  :shared_children, [app_path + "/logs", web_path + "uploads", "vendor"]
set  :user,             "dest"
set  :use_sudo,        false
ssh_options[:port] =   22
set  :php_bin,         "/usr/bin/php"
set  :branch,          "master"
set  :update_vendors,  true