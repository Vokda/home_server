#!/bin/bash
set -e

git pull
RAILS_ENV=production 
echo install dependencies
bundle install 
#bundle exec rails db:migrate
echo compile assets
echo $RAILS_MASTER_KEY
bundle exec rails assets:precompile


sudo systemctl daemon-reload
sudo systemctl restart home_server.service
