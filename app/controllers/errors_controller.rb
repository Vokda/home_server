class ErrorsController < ApplicationController
  def not_found
    @page_title = '404'
    @home = root_path
    render status: :not_found
  end

  def internal_server_error
    @page_title = '500'
    @home = root_path
    render status: :internal_server_error
  end
end
