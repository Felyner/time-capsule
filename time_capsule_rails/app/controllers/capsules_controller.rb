class CapsulesController < ApplicationController

	before_filter :authenticate_user!

	def index
		@capsules = Capsule.all
	end

	def new
		@capsule = Capsule.new
		@items = Item.new
	end

	def create
		@capsule = Capsule.new(params[:f])
		@items = Item.new(params[:i])
		if @capsule.save
			redirect_to capsules_path, :notice => "Your time capsule has been locked away"
		else
			render "new"
		end
	end

end
