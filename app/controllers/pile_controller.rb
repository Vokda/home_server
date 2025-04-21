class PileController < ApplicationController
  $root_name = 'the-pile';
  def index
    @page_title = $root_name;
  end

end
