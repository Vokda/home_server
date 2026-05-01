class HomeController < ApplicationController
  def index
    @page_title = ''
  end

  def about_me
    @page_title = 'about_me'
  end

  def education
    @page_title = 'education'
  end

  def software
    @page_title = 'software'
  end

  def the_pile
    @page_title = 'the_pile'
  end

  def contact
    @page_title = 'contact'
  end
end
