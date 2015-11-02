# Set branche to staging
set :branch, :staging

# Include development dependencies
set :composer_install_flags, '--no-interaction --quiet --optimize-autoloader'

# Server settings
set :deploy_to, -> { "/var/apps/#{fetch(:application)}" }
server 'example.com', user: 'deploy', roles: %w{web app db}
