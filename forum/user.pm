package user;
use warnings;
use strict;

sub get_user_name
{
	my $remote_addr = shift;
	return crypt $remote_addr, 1337;
}
1;
