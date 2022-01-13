#!/usr/bin/perl 
# one day I'll generalize this rather than have this forum specific db handler
package Data_base;
use warnings;
use strict;

use DBI;
use Data::Dumper;

our $dbh;

sub get_threads
{
	$dbh = _get_dbh();
	return $dbh->selectall_arrayref("select id, subject, created, created_by, description from forum.threads");
}

sub get_thread
{
	$dbh = _get_dbh();
	return $dbh->selectrow_arrayref("select * from forum.threads where id = ?", {}, shift);
}

sub rm_thread
{
	my $t_nr = @_;
	$dbh = _get_dbh();
	# remove thread
	my $sth = $dbh->prepare("delete from forum.threads where id = ?");
	$sth->execute($t_nr);
	# remove replies
	$sth = $dbh->prepare("delete from forum.replies where thread = ?");
	$sth->execute($t_nr);
}


sub _get_dbh
{
	$dbh = DBI->connect("dbi:mysql:forum", 'daniel', '') or print $DBI::errstr unless $dbh;
	return $dbh;
}

sub get_replies
{
	my $t_nr = shift;
	$dbh = _get_dbh();
	my @fields = qw(id date created_by thread text);
	my $replies = $dbh->selectall_arrayref("select id, date, created_by, thread, text from forum.replies where thread = ?", {}, $t_nr);
	for my $reply (@$replies)
	{
		my @r_ = @$reply;
		my %t;
		@t{@fields} = @r_;
		$reply = \%t;
	}
	return $replies;
}

sub add_reply
{
	my ($t_nr, $u_name, $text)  = @_;

	$dbh = _get_dbh();
	my $sth = $dbh->prepare("insert into forum.replies (created_by, thread, text) values (?, ?, ?)");
	$sth->execute($u_name, $t_nr, $text);
}

sub get_db_size
{
	$dbh = _get_dbh();
	my $result = $dbh->selectall_arrayref("select table_schema as 'database', round(sum(data_length + index_length) / 1024, 1 ) as 'size (kb)' from information_schema.tables where table_schema = 'forum'");
	my $kb = $result->[0]->[1];
	return $kb // 0;
}

1;
