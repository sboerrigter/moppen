# WP-CLI
set :wpcli_local_url, 'http://moppen.local'
set :wpcli_remote_url, 'http://moppen.site'

# Server settings
server '128.199.43.35', user: 'serverpilot', roles: %w{web app db}
