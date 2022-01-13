#!/usr/bin/perl 
use warnings;
use strict;

use Template;
use CGI;
use DBI;
use Data::Dumper;
use lib '/var/www/home_server/forum/';
use Data_base;
use user;
use thread;

my $forum_root =  '/var/www/home_server/forum';
my $cgi = new CGI;
my $header = $cgi->header('text/html');

my $config = 
{
	INCLUDE_PATH => [$forum_root, $forum_root . '/templates/'],
	INTERPOLATE  => 0,               # expand "$var" in plain text
    POST_CHOMP   => 1,               # cleanup whitespace
	#PRE_PROCESS  => 'header',        # prefix each template
    EVAL_PERL    => 0               # evaluate Perl code blocks
};

my $user = crypt $ENV{REMOTE_ADDR}, 1337;

thread::remove_thread();

# create thread
my $dbh = DBI->connect("dbi:mysql:forum", 'daniel', '') or print $DBI::errstr;
my $sql = 'insert into forum.threads (subject, created_by, description) values (?, ?, ?)';
my $sth = $dbh->prepare($sql);
$sth->execute($cgi->param('subject'), $user, $cgi->param('desc'));


# shit implementation. Redo this entire thread creation process
my $threads = Data_base::get_threads();
my $latest_date = 0;
my $id = -1;
for my $t (@$threads)
{
	my $date = $t->[2];
	if($date gt $latest_date)
	{
		$latest_date = $date;
		$id = $t->[0]
	}
}

my $tt = Template->new($config);
my $replies = Data_base::get_replies($id);
my @thread = @{Data_base::get_thread($id)};
$thread[4] =~ s/\n/<br>/g;
my $user_name = user::get_user_name($ENV{REMOTE_ADDR});
$tt->process('thread.tmpl', {thread => \@thread, replies => $replies, user => $user_name}) or die $tt->error();
