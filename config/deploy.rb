set :application, 'moppen'
set :repo_url, 'git@github.com:sboerrigter/moppen.git'

# Branch
set :branch, :master

# Deployment folder
set :deploy_to, -> { "/srv/users/serverpilot/apps/#{fetch(:application)}" }

# Log level
set :log_level, :info

# Linked files and directories for /shared/
set :linked_files, fetch(:linked_files, []).push('.env', 'auth.json')
set :linked_files, fetch(:linked_files, []).push('web/.htaccess')
set :linked_dirs, fetch(:linked_dirs, []).push('web/app/uploads')
