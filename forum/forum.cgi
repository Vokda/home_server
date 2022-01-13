#!/usr/bin/perl 
use warnings;
use strict;

use Template;
use CGI;
use Data::GUID;
use Data::Dumper;
use lib '/var/www/home_server/forum/';
use Data_base qw(get_threads);


my $cgi = new CGI;
my $header = $cgi->header('text/html');
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

my $threads = Data_base::get_threads();
$tt->process('forum.tmpl', {threads => $threads}) or die $tt->error(), "\n";

#print $cgi->remote_addr();
