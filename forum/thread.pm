#!/usr/bin/perl 
package thread;
use warnings;
use strict;
use Data::Dumper;

use lib '/var/www/home_server/forum/';
use Data_base;

# remove thread if no more room
sub remove_thread
{
	my $kb = Data_base::get_db_size();
	if($kb > 1000) 
	{
		my $threads = Data_base::get_threads();
		my $to_rm = 0;
		my $to_rm_date = 0;
		for my $t (@$threads)
		{
			my $date = $t->[2];
			if($to_rm_date lt $date)
			{
				$to_rm_date = $date;
				$to_rm = $t->[0];
			}
		}
		warn "removing thread $to_rm";
		Data_base::rm_thread($to_rm);
	}
}

1;
