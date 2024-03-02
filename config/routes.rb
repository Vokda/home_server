Rails.application.routes.draw do
  get 'home/index'
  # Define your application routes per the DSL in https://guides.rubyonrails.org/routing.html

  # Reveal health status on /up that returns 200 if the app boots with no exceptions, otherwise 500.
  # Can be used by load balancers and uptime monitors to verify that the app is live.
  get "up" => "rails/health#show", as: :rails_health_check

  # Defines the root path route ("/")
  # root "posts#index"
  get '/' => 'home#index'
  get '/about-me' => 'home#about-me'
  get '/education' => 'home#education'

  # software
  get '/software' => 'software#index'
  get '/software/linux' => 'software#linux'
  get '/software/perl' => 'software#perl'
  get '/software/sdl' => 'software#sdl'
  get '/software/vim' => 'software#vim'
end
