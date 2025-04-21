require 'bundler/setup'
require 'mime/types'

class PileController < ApplicationController
  $root_name = 'the_pile';

  def index
    @page_title = $root_name;
  end

  def peek
      @page_title = $root_name + '/peek';
      @file = read_a_file();
      puts @file
  end

  private def read_a_file
      $path = Rails.root.join('public', 'the_pile');

      $file_set = Dir.entries($path).select { |entry| File.file?(File.join($path, entry)) }.to_set
      $file = $file_set.to_a.sample;
      $path = $path.join($file);
      $mime = MIME::Types.type_for($path.to_s).first
      $type = $mime ? $mime.media_type : 'unknown'

      return {
          name: $file.to_s,
          path: $path.to_s,
          type: $type,
          sub_type: $mime ? $mime.sub_type : 'unknown'
      }
  end

end
