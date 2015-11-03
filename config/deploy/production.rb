# WP-CLI
set :wpcli_local_url, 'http://moppen.dev'
set :wpcli_remote_url, 'http://moppen.site'

# Server settings
server 'moppen.site', user: 'serverpilot', roles: %w{web app db}
