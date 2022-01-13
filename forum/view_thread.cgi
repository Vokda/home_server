#!/usr/bin/perl 
use warnings;
use strict;

use Template;
use CGI;
use lib '/var/www/home_server/forum/';
use Data_base;
use user;
use Data::Dumper;

my $cgi = new CGI;
$cgi->header(-text => 'html', -status => 200);
my $thread_nr = $cgi->param('thread');
my $forum_root =  '/var/www/home_server/forum';

my $config = 
{
	INCLUDE_PATH => [$forum_root, $forum_root . '/templates/'],
	INTERPOLATE  => 0,               # expand "$var" in plain text
    POST_CHOMP   => 1,               # cleanup whitespace
	#PRE_PROCESS  => 'header',        # prefix each template
    EVAL_PERL    => 0               # evaluate Perl code blocks
};

my $tt = Template->new($config);

my $replies = Data_base::get_replies($thread_nr);
my $thread = Data_base::get_thread($thread_nr);
my $user_name = user::get_user_name($ENV{REMOTE_ADDR});

for my $r (@$replies)
{
	$r->{text} =~ s/\n/<br>/g;
}

$tt->process('thread.tmpl', {thread => $thread, replies => $replies, user => $user_name}) or die $tt->error();
