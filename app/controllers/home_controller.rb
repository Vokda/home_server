class HomeController < ApplicationController
  def index
    @page_title = '';
  end

  def about_me
    @page_title = 'about_me';
  end

  def grades
    @page_title = 'education'
  end
end
