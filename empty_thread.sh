#!/bin/sh

find . -name 'forum.thread' -mmin -10 -exec sh -c "echo 'MODERATOR:THREAD RESET' > {}" \;
