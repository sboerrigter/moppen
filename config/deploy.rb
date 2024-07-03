set :application, 'moppen'
set :repo_url, 'git@github.com:sboerrigter/moppen.git'
set :branch, :master

set :log_level, :info

set :linked_files, ['.env', 'auth.json', 'web/.htaccess']
set :linked_dirs, ['web/app/uploads']

set :wpcli_local_url, 'http://www.moppen.test'

after 'deploy:published', 'opcache:clear'
after 'deploy:published', 'varnish:clear'

namespace :opcache do
  task :clear do
    on roles(:app) do
      execute :'php-fpm-cli', "-r 'opcache_reset();'"
    end
  end
end

namespace :varnish do
  task :clear do
    on roles(:app) do
      execute :'curl', "-sX BAN -H 'X-Ban-Method: exact' -H 'X-Ban-Host: ", fetch(:varnish_url), "' http://localhost/ > /dev/null"
    end
  end
end

