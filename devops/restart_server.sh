#!/bin/bash
sudo systemctl daemon-reload
sudo systemctl stop home_server
pkill -f puma
sudo systemctl start home_server
sudo systemctl status home_server
