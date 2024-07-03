# ssh moppen.site@tw-server-05.twservices.eu -p2223
server 'tw-server-05.twservices.eu', user: 'moppen.site', roles: %w{web app db}, port: 2223

set :deploy_to, -> { '/var/www/vhosts/TB01-004/moppen.site/site' }
set :varnish_url, 'moppen.site'
set :wpcli_remote_url, 'https://moppen.site'
