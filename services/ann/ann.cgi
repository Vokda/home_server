#!/usr/bin/perl
use strict;
use warnings;

use Template;
use CGI;

my $cgi = new CGI;
my $header = $cgi->header('text/html');

my $config = 
{
	INCLUDE_PATH => [$ENV{DOCUMENT_ROOT}.'/templates/', $ENV{DOCUMENT_ROOT}.'/services/ann/'],
	INTERPOLATE  => 0,               # expand "$var" in plain text
    POST_CHOMP   => 1,               # cleanup whitespace
	#PRE_PROCESS  => 'header',        # prefix each template
    EVAL_PERL    => 0               # evaluate Perl code blocks
};


my $tt = Template->new($config);
$tt->process('ann.tmpl') or die $tt->error(), "\n";
