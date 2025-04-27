class SoftwareController < ApplicationController
  ROOT_NAME = 'software';
  def index
    $page_title = ROOT_NAME;
  end

  def linux
    $page_title = "#{ROOT_NAME}/linux"
  end

  def perl
    $page_title = "#{ROOT_NAME}/perl"
  end

  def sdl
    $page_title = "#{ROOT_NAME}/sdl"
  end
  
  def vim
    $page_title = "#{ROOT_NAME}/vim"
  end
end
