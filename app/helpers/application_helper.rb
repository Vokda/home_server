module ApplicationHelper
  def generate_button(name, href, new_tab)
    if(new_tab)
      button = 
        "<a href='#{href}' target='_blank'>
          <button>#{name}</button>
        </a>"
    else
      button = "<button onclick=\"location.href='#{href}'\">#{name}</button>"
    end
    return button.html_safe
  end

  def random_pfp_image
      images = Dir.glob(Rails.root.join('app/assets/images/pfps/*'))
      image_path = images.sample
      image_path.sub("#{Rails.root}/app/assets/images/", '')
  end
end
