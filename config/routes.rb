Rails.application.routes.draw do
  get 'home/index'
  # Define your application routes per the DSL in https://guides.rubyonrails.org/routing.html

  # Reveal health status on /up that returns 200 if the app boots with no exceptions, otherwise 500.
  # Can be used by load balancers and uptime monitors to verify that the app is live.
  get "up" => "rails/health#show", as: :rails_health_check

  # Defines the root path route ("/")
  # root "posts#index"
  get '/' => 'home#index'
  get '/about_me' => 'home#about_me'
  get '/education' => 'home#education'
  # contact page
  get '/contact' => 'home#contact'

  # software
  get '/software' => 'software#index'
  get '/software/linux' => 'software#linux'
  get '/software/perl' => 'software#perl'
  get '/software/sdl' => 'software#sdl'
  get '/software/vim' => 'software#vim'

  # blog
  get '/the_pile' => 'pile#index'
  get '/the_pile/peek' => 'pile#peek'
  # blog posts listing and view
  get '/blog' => 'blog#index', as: :blog
  # disable automatic :format parsing so dots (file extensions) are kept in the wildcard
  get '/blog/*name' => 'blog#show', as: :blog_post, format: false
  # styled 404
  match '/404', to: 'errors#not_found', via: :all
  match '/500', to: 'errors#internal_server_error', via: :all
end
