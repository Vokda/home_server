class SoftwareController < ApplicationController
  $root_name = 'software';
  def index
    @page_title = $root_name;
  end

  def linux
    @page_title = "#$root_name/linux"
  end

  def perl
    @page_title = "#$root_name/perl"
  end

  def sdl
    @page_title = "#$root_name/sdl"
  end
  
  def vim
    @page_title = "#$root_name/vim"
  end
end
