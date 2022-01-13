#!/usr/bin/perl
use warnings;
use strict;

use Template;
use CGI;
use lib '/var/www/home_server/forum/';
use Data_base;
use user;
use thread;

my $cgi = new CGI;
$cgi->header(-text => 'html');
my $thread_nr = $cgi->param('thread');
my $text = $cgi->param('reply');
my $forum_root =  '/var/www/home_server/forum';
my $user = user::get_user_name($ENV{REMOTE_ADDR});

# remove thread if no more space
thread::remove_thread();

unless($thread_nr and $user and $text)
{
	die;
}

Data_base::add_reply($thread_nr, $user, $text);

print "<meta http-equiv=Refresh content='0; url=/forum/view_thread.cgi?thread=$thread_nr' />";
