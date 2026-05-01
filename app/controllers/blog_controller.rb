class BlogController < ApplicationController
  BLOG_DIR = Rails.root.join('public', 'blog_posts')
  ALLOWED_EXTS = %w(.erb .html .htm)

  def index
    @page_title = 'blog'
    if Dir.exist?(BLOG_DIR)
      entries = Dir.entries(BLOG_DIR).select do |e|
        path = File.join(BLOG_DIR, e)
        File.file?(path) && ALLOWED_EXTS.include?(File.extname(e).downcase)
      end
      # Map entries to { name:, ts: } where ts is filename timestamp if numeric else mtime
      mapped = entries.map do |entry|
        path = File.join(BLOG_DIR, entry)
        base = File.basename(entry, File.extname(entry))
        ts = if base =~ /^\d+$/
               base.to_i
             else
               File.mtime(path).to_i
             end
        { name: entry, ts: ts }
      end
      # sort by timestamp desc (latest first)
      @posts = mapped.sort_by { |h| -h[:ts] }
      @latest_post = @posts.first
    else
      @posts = []
    end
  end

  # name can contain slashes; Rails passes it as a single string
  def show
    name = params[:name]
    # Debugging/logging: record the incoming request and params so we can see if the extension arrives
    Rails.logger.info "BlogController#show called: PATH_INFO=#{request.env['PATH_INFO'].inspect} REQUEST_URI=#{request.env['REQUEST_URI'].inspect} FULLPATH=#{request.fullpath.inspect} params[:name]=#{params[:name].inspect}"
    # sanitize path to avoid directory traversal
    clean = Pathname.new(name).cleanpath.to_s
    if clean.start_with?('..')
        raise "Invalid blog post path: #{name}"
    end

    file_path = BLOG_DIR.join(clean)

    unless File.exist?(file_path) && File.file?(file_path)
        render plain: "Not found #{file_path}", status: :not_found and
        return
    end
    # If it's an HTML/ERB file, render it inline (processed as a template) within the app layout.
    # Otherwise, redirect to the static file under /blog_posts so the web server serves it.
    path_string = file_path.to_s
    ext = File.extname(path_string).downcase
    base_name = File.basename(path_string, ".*")
    @page_title = "blog/#{base_name}"
    

    # translate numeric timestamp in filename to human-readable date 
    date = Time.at(base_name.to_i).strftime('%Y-%m-%d')
    @blog_title = "Daniel's blog, earth date #{date}..."
    

    if path_string.end_with?('.erb') || ['.html', '.htm'].include?(ext)
      # let the show view render the file inside the app layout so the post shares the site's look
      @blog_file_path = path_string
      render :show
    else
        raise "Unsupported file type for blog post: #{ext}"
    end
  end
end
